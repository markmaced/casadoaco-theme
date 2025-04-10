<?php

function cpt_tabelas()
{
    register_post_type('tabelas', [
        'labels' => [
            'name' => 'Tabelas',
            'singular_name' => 'Tabela'
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-table-col-before',
        'supports' => ['title', 'editor']
    ]);
}
add_action('init', 'cpt_tabelas');


function shortcode_tabela_produto($atts)
{
    $atts = shortcode_atts(['id' => ''], $atts);
    $post = get_post($atts['id']);
    if ($post && $post->post_type === 'tabelas') {
        return apply_filters('the_content', $post->post_content);
    }
    return 'Tabela não encontrada.';
}
add_shortcode('tabela_produto', 'shortcode_tabela_produto');


function tabela_admin_menu()
{
    add_submenu_page(
        'edit.php?post_type=tabelas',
        'Importador de Tabelas',
        'Importador de Tabelas',
        'manage_options',
        'importador-tabelas',
        'render_importador_tabelas'
    );
}
add_action('admin_menu', 'tabela_admin_menu');

function render_importador_tabelas()
{
?>
    <div class="wrap">
        <h1>Importador de Tabelas</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="csv_tabela" accept=".csv" required>
            <input type="submit" class="button button-primary" name="importar_tabela" value="Importar Tabela">
        </form>
    </div>
<?php

    if (isset($_POST['importar_tabela']) && !empty($_FILES['csv_tabela']['tmp_name'])) {
        $file = $_FILES['csv_tabela']['tmp_name'];
        if (($handle = fopen($file, 'r')) !== false) {
            $table = '<table><thead>';
            $first = true;
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $table .= '<tr>';
                foreach ($data as $cell) {
                    $tag = $first ? 'th' : 'td';
                    $table .= "<$tag>" . esc_html($cell) . "</$tag>";
                }
                $table .= '</tr>';
                if ($first) {
                    $table .= '</thead><tbody>';
                    $first = false;
                }
            }
            $table .= '</tbody></table>';
            fclose($handle);

            // Cria o post com título temporário
            $post_id = wp_insert_post([
                'post_title'   => 'Tabela Importada Temporária',
                'post_type'    => 'tabelas',
                'post_status'  => 'publish',
                'post_content' => $table
            ]);

            // Atualiza o título com o shortcode real
            if ($post_id) {
                $shortcode = '[tabela_produto id="' . $post_id . '"]';
                wp_update_post([
                    'ID'         => $post_id,
                    'post_title' => 'Tabela ' . $shortcode . ' ' . current_time('Y-m-d H:i:s')
                ]);
                echo '<div class="notice notice-success"><p>Tabela importada com sucesso! Use o shortcode: <code>' . $shortcode . '</code></p></div>';
            }
        }
    }
}
