<?php

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts() {
    $offset = intval($_POST['offset']);

    $query = new WP_Query([
        'post_type' => 'post',
        'offset' => $offset,
        'posts_per_page' => 6,
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>
            <div class="flex flex-col gap-6">
                <div class="bg-white overflow-hidden flex">
                    <a href="<?php the_permalink(); ?>" class="w-1/3 h-full block">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-[205px] object-cover rounded-md']); ?>
                    </a>
                    <div class="w-2/3 pl-6 flex flex-col justify-between">
                        <div>
                            <p class="font-noto font-normal text-xs text-[#8F8F8F] mb-1">
                                <?php echo get_the_date('d/m/Y'); ?></p>
                            <h3 class="text-xl font-bold leading-tight font-rockstar mb-2 text-black">
                                <?php the_title(); ?>
                            </h3>
                            <div class="text-sm text-gray-500 mb-4 font-noto line-clamp-5">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>"
                            class="bg-casadoaco-orange text-white text-sm px-4 py-2 rounded hover:bg-black transition-all duration-500 w-max">Ler
                            mais</a>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo 'no_more';
    }

    wp_reset_postdata();
    wp_die();
}