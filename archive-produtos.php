<?php get_header(); ?>

<section class="w-full pt-10">
    <div class="max-w-6xl mx-auto">
        <img src="<?php echo get_theme_image('hero-products.jpg') ?>" class="w-full">
    </div>
</section>

<section class="w-full py-16">
    <div class="max-w-6xl mx-auto flex md:flex-row flex-col md:gap-10 px-5 md:px-0">
        <div class="md:w-1/5 w-full border-r border-r-[#f1f1f1] md:mb-0 mb-10">
            <form id="filtro-produtos" class="space-y-6">
                <?php
                $categorias = get_terms(['taxonomy' => 'categoria_produto', 'hide_empty' => false]);
                if (!empty($categorias)): ?>
                    <div class="mb-5">
                        <h3 class="text-lg font-semibold mb-2 font-rockstar text-casadoaco-orange">Categorias</h3>
                        <?php foreach ($categorias as $cat): ?>
                            <label class="block">
                                <input type="checkbox" name="categoria_produto[]" value="<?php echo esc_attr($cat->slug); ?>">
                                <?php echo esc_html($cat->name); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php
                $lojas = get_terms(['taxonomy' => 'lojas', 'hide_empty' => false]);
                if (!empty($lojas)): ?>
                    <div>
                        <h3 class="text-lg font-semibold mb-2 font-rockstar text-casadoaco-orange">Lojas</h3>
                        <?php foreach ($lojas as $loja): ?>
                            <label class="block">
                                <input type="checkbox" name="lojas[]" value="<?php echo esc_attr($loja->slug); ?>">
                                <?php echo esc_html($loja->name); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </form>
        </div>
        <div class="md:w-4/5 w-full">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'post_type' => 'produtos',
                'posts_per_page' => 12,
                'paged' => $paged,
            );

            $query = new WP_Query($args);
            ?>
            <div class="max-w-6xl mx-auto">
                <div class="w-full flex justify-between mb-8 md:gap-0 gap-5">
                    <div class="w-1/2">
                        <div class="flex w-full items-center">
                            <div class="w-[10%]">
                                <img src="<?php echo get_theme_image(image_name: 'rocket.png') ?>">
                            </div>
                            <div class="w-[90%]">
                                <h2 class="md:text-xl text-base font-rockstar text-custom-gray">Nossos <span
                                        class="text-casadoaco-orange">Produtos</span></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($query->have_posts()): ?>
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8" id="resultProducts">
                        <?php while ($query->have_posts()):
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
                        <?php endwhile; ?>
                    </div>

                    <!-- Paginação -->
                    <div class="mt-10 text-center">
                        <?php
                        $big = 999999999; // número fictício para substituir na base
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $query->max_num_pages,
                            'prev_text' => __('« Anterior'),
                            'next_text' => __('Próximo »'),
                            'type' => 'list',
                        ));
                        ?>
                    </div>

                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">Nenhum produto encontrado.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php echo do_shortcode('[calculator_cta]') ?>

<?php get_footer(); ?>