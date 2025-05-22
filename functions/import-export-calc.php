<?php

// Função de exportação CSV
function export_calculadora_csv() {
    if (!current_user_can('manage_options')) {
        wp_die('Sem permissão.');
    }

    $args = array(
        'post_type' => 'calculadora',
        'posts_per_page' => -1,
    );

    $posts = get_posts($args);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="calculadora_export.csv"');

    $output = fopen('php://output', 'w');

    fputcsv($output, ['nome', 'imagem', 'categoria_calculadora', 'campos']);

    foreach ($posts as $post) {
        $imagem = get_field('imagem_3d', $post->ID);
        $categoria = wp_get_post_terms($post->ID, 'categoria_calculadora', ['fields' => 'names']);
        $campos = get_field('campos', $post->ID);

        fputcsv($output, [
            $post->post_title,
            $imagem,
            implode(',', $categoria),
            json_encode($campos)
        ]);
    }

    fclose($output);
    exit;
}

// Função de importação CSV
function import_calculadora_csv($file) {
    $handle = fopen($file, 'r');
    $header = fgetcsv($handle);

    while (($data = fgetcsv($handle)) !== FALSE) {
        $post_id = wp_insert_post([
            'post_title' => $data[0],
            'post_type' => 'calculadora',
            'post_status' => 'publish'
        ]);

        if ($post_id) {
            update_field('imagem_3d', $data[1], $post_id);
            wp_set_post_terms($post_id, explode(',', $data[2]), 'categoria_calculadora');
            update_field('campos', json_decode($data[3], true), $post_id);
        }
    }
    fclose($handle);
}

// Submenu na Calculadora
add_action('admin_menu', function() {
    add_submenu_page(
        'edit.php?post_type=calculadora',
        'Importar/Exportar CSV',
        'Importar/Exportar',
        'manage_options',
        'importar_exportar_calculadora',
        'render_import_export_calculadora'
    );
});

// Tela de Importação e Exportação
function render_import_export_calculadora() {
    ?>
    <div class="wrap">
        <h1>Importar / Exportar Calculadora</h1>

        <h2>Exportar</h2>
        <a href="<?php echo admin_url('admin-post.php?action=export_calculadora_csv'); ?>" class="button button-primary">Exportar CSV</a>

        <hr>

        <h2>Importar</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="import_file" required>
            <input type="hidden" name="import_calculadora_csv" value="1">
            <button type="submit" class="button button-primary">Importar CSV</button>
        </form>
    </div>
    <?php
}

// Processa a importação
add_action('admin_init', function() {
    if (isset($_POST['import_calculadora_csv']) && !empty($_FILES['import_file']['tmp_name'])) {
        import_calculadora_csv($_FILES['import_file']['tmp_name']);
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p>Importação realizada com sucesso.</p></div>';
        });
    }
});

// Hook para exportar CSV
add_action('admin_post_export_calculadora_csv', 'export_calculadora_csv');