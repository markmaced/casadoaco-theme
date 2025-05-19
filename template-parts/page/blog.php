<section class="w-full pt-5">
    <div class="max-w-6xl mx-auto md:px-0 px-5">
        <!-- Últimos artigos -->
        <h2 class="text-5xl font-bold mb-10 font-rockstar">BLOG - HOME</h2>
        <p class="text-[#555555] text-xl font-noto mb-5 font-normal">Últimos posts</p>

        <?php
        $recent_posts = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 4
        ]);

        if ($recent_posts->have_posts()):
            $first = true;
            echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-b border-b-[#cecece] pb-5">';
            while ($recent_posts->have_posts()):
                $recent_posts->the_post();
                if ($first): ?>
                    <!-- Post em destaque horizontal à esquerda -->
                    <div class="md:col-span-2 flex flex-col bg-white overflow-hidden h-full">
                        <a href="<?php the_permalink(); ?>" class="w-full block">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-[455px] object-cover rounded-md']); ?>
                        </a>
                        <div class="w-full py-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold leading-tight font-rockstar mb-2 text-black"><?php the_title(); ?></h3>
                                <div class="text-sm text-gray-500 mb-8 font-noto line-clamp-3 w-5/6"><?php echo the_content(); ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>"
                                class="bg-casadoaco-orange text-white font-noto text-sm px-4 transition-all duration-500 py-2 rounded hover:bg-black w-max">Ler
                                mais</a>
                        </div>
                    </div>
                    <!-- Início da coluna direita com as miniaturas -->
                    <div class="flex flex-col gap-6">
                        <?php
                        $first = false;
                else: ?>
                        <!-- Posts ao lado (cards menores) -->
                        <div class="bg-white overflow-hidden flex">
                            <a href="<?php the_permalink(); ?>" class="w-1/2 h-full block">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-[205px] object-cover rounded-md']); ?>
                            </a>
                            <div class="w-1/2 pl-4 flex flex-col justify-between">
                                <div>
                                    <p class="font-noto font-normal text-xs text-[#8F8F8F] mb-1">
                                        <?php echo get_the_date('d/m/Y'); ?>
                                    </p>
                                    <h3 class="text-xl font-bold leading-tight font-rockstar mb-2 text-black"><?php the_title(); ?>
                                    </h3>
                                    <div class="text-sm text-gray-500 mb-4 font-noto line-clamp-5">
                                        <?php echo the_content(); ?>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                    class="bg-casadoaco-orange text-white text-sm px-4 py-2 rounded hover:bg-black transition-all duration-500 w-max">Ler
                                    mais</a>
                            </div>
                        </div>
                    <?php endif;
            endwhile;
            echo '</div>'; // fecha a coluna das miniaturas
            echo '</div>'; // fecha o grid principal
            wp_reset_postdata();
        endif;
        ?>
        </div>
    </div>
</section>
<section class="w-full py-12 md:px-0 px-5">
    <div class="max-w-6xl mx-auto">
        <!-- Artigos mais antigos -->
        <h3 class="text-2xl font-bold mb-16 font-rockstar">ARTIGOS MAIS ANTIGOS</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="old-posts">
            <?php
            $older_posts = new WP_Query([
                'post_type' => 'post',
                'offset' => 4,
                'posts_per_page' => 16
            ]);
            if ($older_posts->have_posts()):
                while ($older_posts->have_posts()):
                    $older_posts->the_post(); ?>
                    <div class="flex flex-col gap-6">
                        <div class="bg-white overflow-hidden flex">
                            <a href="<?php the_permalink(); ?>" class="w-1/3 h-full block">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-[205px] object-cover rounded-md']); ?>
                            </a>
                            <div class="w-2/3 pl-6 flex flex-col justify-between">
                                <div>
                                    <p class="font-noto font-normal text-xs text-[#8F8F8F] mb-1">
                                        <?php echo get_the_date('d/m/Y'); ?>
                                    </p>
                                    <h3 class="text-xl font-bold leading-tight font-rockstar mb-2 text-black">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="text-sm text-gray-500 mb-4 font-noto line-clamp-5">
                                        <?php echo the_content(); ?>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                    class="bg-casadoaco-orange text-white text-sm px-4 py-2 rounded hover:bg-black transition-all duration-500 w-max">Ler
                                    mais</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Botão carregar mais -->
        <!-- <div class="text-center mt-10">
            <button id="load-more" data-offset="10"
                class="bg-casadoaco-orange text-white py-2 px-6 rounded hover:bg-black transition-all duration-500 cursor-pointer">
                Carregar mais
            </button>
        </div>
    </div> -->
</section>
<?php echo do_shortcode('[calculator_cta]') ?>
<?php echo do_shortcode('[products_grid]') ?>