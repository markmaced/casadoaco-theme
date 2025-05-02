<?php
add_action('wp_ajax_filtrar_produtos_ajax', 'filtrar_produtos_ajax');
add_action('wp_ajax_nopriv_filtrar_produtos_ajax', 'filtrar_produtos_ajax');

function filtrar_produtos_ajax()
{
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args = [
        'post_type' => 'produtos',
        'posts_per_page' => 12,
        'paged' => $paged,
        'tax_query' => ['relation' => 'AND']
    ];

    if (!empty($_POST['categoria_produto'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'categoria_produto',
            'field' => 'slug',
            'terms' => array_map('sanitize_text_field', $_POST['categoria_produto']),
        ];
    }

    if (!empty($_POST['lojas'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'lojas',
            'field' => 'slug',
            'terms' => array_map('sanitize_text_field', $_POST['lojas']),
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post(); ?>
            <div class="w-full">
                <?php if (has_post_thumbnail()): ?>
                    <div class="w-full mb-4">
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
                            class="rounded-xl w-full h-48 object-cover">
                    </div>
                <?php endif; ?>
                <h3 class="font-bold text-lg mb-2"><?php the_title(); ?></h3>
                <div class="text-sm text-gray-600 line-clamp-2 mb-4">
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>"
                    class="inline-block bg-casadoaco-orange text-white text-sm font-semibold px-4 py-2 rounded hover:bg-black transition">Saiba
                    mais</a>
            </div>
        <?php endwhile;

        // Paginação
        $total_pages = $query->max_num_pages;
        if ($total_pages > 1) {
            echo '<div class="mt-8 flex justify-center space-x-2" id="paginacao-produtos">';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<button class="px-3 py-1 border rounded ' . ($i == $paged ? 'bg-black text-white' : 'bg-white') . '" data-paged="' . $i . '">' . $i . '</button>';
            }
            echo '</div>';
        }

        wp_reset_postdata();
    else:
        echo '<p>Nenhum produto encontrado.</p>';
    endif;

    wp_die();
}