<?php

add_action('wp_ajax_filtrar_calculadoras', 'filtrar_calculadoras_callback');
add_action('wp_ajax_nopriv_filtrar_calculadoras', 'filtrar_calculadoras_callback');

function filtrar_calculadoras_callback()
{
    $categoria_id = intval($_POST['categoria_id']);

    $args = array(
        'post_type' => 'calculadora',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'categoria_calculadora',
                'field' => 'term_id',
                'terms' => $categoria_id,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div id="<?php echo get_post_field('post_name', get_the_ID()); ?>" class="bg-white rounded shadow flex flex-col items-center p-5 cursor-pointer" data-option-id="<?php echo get_the_ID()?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
                    class="w-[50px] mb-3 h-auto object-cover">
                <h3 class="text-sm font-noto font-bold"><?php  esc_html(the_title()); ?></h3>
            </div>
            <?php
        }
    } else {
        echo '<p>Nenhuma calculadora encontrada para essa categoria.</p>';
    }

    wp_die(); // Finaliza corretamente o AJAX
}
