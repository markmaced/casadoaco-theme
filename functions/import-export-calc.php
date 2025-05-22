<?php

// Exportar CSV
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

    // Cabeçalho
    fputcsv($output, ['nome', 'imagem_url', 'categorias', 'campos']);

    foreach ($posts as $post) {
        // Pega URL da imagem
        $imagem = get_field('imagem_3d', $post->ID);
        $imagem_url = '';

        if (is_array($imagem) && isset($imagem['url'])) {
            $imagem_url = $imagem['url'];
        } elseif (is_numeric($imagem)) {
            $imagem_url = wp_get_attachment_url($imagem);
        } elseif (is_string($imagem)) {
            $imagem_url = $imagem;
        }

        $categorias = wp_get_post_terms($post->ID, 'categoria_calculadora', ['fields' => 'names']);
        $campos = get_field('campos', $post->ID);

        fputcsv($output, [
            $post->post_title,
            $imagem_url,
            implode('|', $categorias),
            json_encode($campos)
        ]);
    }

    fclose($output);
    exit;
}

// Função para baixar e anexar a imagem
function anexar_imagem_por_url($image_url, $post_id) {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $tmp = download_url($image_url);

    if (is_wp_error($tmp)) {
        return false;
    }

    $file_array = array(
        'name'     => basename($image_url),
        'tmp_name' => $tmp
    );

    $id = media_handle_sideload($file_array, $post_id);

    if (is_wp_error($id)) {
        @unlink($tmp);
        return false;
    }

    return $id;
}

// Importar CSV
function import_calculadora_csv($file) {
    $handle = fopen($file, 'r');
    $header = fgetcsv($handle);

    while (($data = fgetcsv($handle)) !== FALSE) {
        $post_title = sanitize_text_field($data[0]);
        $imagem_url = esc_url_raw($data[1]);
        $categorias = array_map('sanitize_text_field', explode('|', $data[2]));
        $campos = json_decode($data[3], true);

        // Cria o post
        $post_id = wp_insert_post([
            'post_title' => $post_title,
            'post_type' => 'calculadora',
            'post_status' => 'publish'
        ]);

        if ($post_id) {
            // Baixa e anexa a imagem
            $imagem_id = anexar_imagem_por_url($imagem_url, $post_id);
            if ($imagem_id) {
                update_field('imagem_3d', $imagem_id, $post_id);
            } else {
                update_field('imagem_3d', $imagem_url, $post_id); // fallback
            }

            // Cria categorias se não existirem
            $categoria_ids = array();
            foreach ($categorias as $categoria) {
                if (empty($categoria)) continue;
                $term = term_exists($categoria, 'categoria_calculadora');
                if (!$term) {
                    $term = wp_insert_term($categoria, 'categoria_calculadora');
                }
                if (!is_wp_error($term)) {
                    $categoria_ids[] = (int)$term['term_id'];
                }
            }

            // Atribui as categorias
            if (!empty($categoria_ids)) {
                wp_set_post_terms($post_id, $categoria_ids, 'categoria_calculadora');
            }

            // Atualiza os campos
            update_field('campos', $campos, $post_id);
        }
    }

    fclose($handle);
}

// Submenu
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

// Renderiza a tela
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

// Processamento de importação
add_action('admin_init', function() {
    if (isset($_POST['import_calculadora_csv']) && !empty($_FILES['import_file']['tmp_name'])) {
        import_calculadora_csv($_FILES['import_file']['tmp_name']);
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p>Importação realizada com sucesso.</p></div>';
        });
    }
});

// Hook para exportar
add_action('admin_post_export_calculadora_csv', 'export_calculadora_csv');