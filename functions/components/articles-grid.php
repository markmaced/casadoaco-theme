<?php

function articles_grid()
{
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
    );

    $query = new WP_Query($args);
?>
    <section class="w-full py-16">
        <div class="max-w-6xl mx-auto">
            <div class="w-full flex justify-between mb-8">
                <div class="w-1/2">
                    <div class="flex w-full items-center">
                        <div class="w-[10%]">
                            <img src="<?php echo get_theme_image('rocket.png') ?>">
                        </div>
                        <div class="w-[90%]">
                            <h2 class="text-xl font-rockstar text-custom-gray">Nossos <span class="text-casadoaco-orange">Artigos</span></h2>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 flex justify-end items-center">
                    <a href="#" class="font-noto text-sm" style="text-decoration: underline !important;">Ver todos os artigos</a>
                </div>
            </div>

            <?php if ($query->have_posts()) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="w-full">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="w-full mb-4">
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="rounded-xl w-full h-48 object-cover">
                                </div>
                            <?php endif; ?>
                            <h3 class="font-bold text-lg mb-2"><?php the_title(); ?></h3>
                            <div class="text-sm text-gray-600 line-clamp-2 mb-4">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="inline-block bg-casadoaco-orange text-white text-sm font-semibold px-4 py-2 rounded hover:bg-black transition">Saiba mais</a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center text-gray-500">Nenhum artigo encontrado.</p>
            <?php endif; ?>
        </div>
    </section>
<?php
}

add_shortcode("articles_grid", "articles_grid");