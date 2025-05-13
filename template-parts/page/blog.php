<section class="w-full py-16">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Últimos artigos -->
        <h2 class="text-4xl font-bold mb-10 font-rockstar">BLOG - HOME</h2>

        <?php
        $recent_posts = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 4
        ]);

        if ($recent_posts->have_posts()):
            $first = true;
            echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">';
            while ($recent_posts->have_posts()):
                $recent_posts->the_post();
                if ($first): ?>
                    <!-- Post em destaque horizontal à esquerda -->
                    <div class="md:col-span-2 flex flex-col bg-white overflow-hidden h-full">
                        <a href="<?php the_permalink(); ?>" class="w-full h-full block">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-[455px] object-cover']); ?>
                        </a>
                        <div class="w-full p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold leading-tight mb-2"><?php the_title(); ?></h3>
                                <p class="text-sm text-gray-500 mb-4"><?php echo get_the_date(); ?></p>
                            </div>
                            <a href="<?php the_permalink(); ?>"
                                class="bg-casadoaco-orange text-white text-sm px-4 transition-all duration-500 py-2 rounded hover:bg-black w-max">Ler mais</a>
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
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-[209px] object-cover']); ?>
                            </a>
                            <div class="w-1/2 p-6 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-bold leading-tight mb-2"><?php the_title(); ?></h3>
                                    <p class="text-sm text-gray-500 mb-4"><?php echo get_the_date(); ?></p>
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

            <!-- Artigos mais antigos -->
            <h3 class="text-2xl font-bold mb-6">ARTIGOS MAIS ANTIGOS</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php
                $older_posts = new WP_Query([
                    'post_type' => 'post',
                    'offset' => 4,
                    'posts_per_page' => 6
                ]);
                if ($older_posts->have_posts()):
                    while ($older_posts->have_posts()):
                        $older_posts->the_post(); ?>
                        <div class="bg-white border rounded-lg overflow-hidden shadow-md">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-40 object-cover']); ?>
                                <div class="p-4">
                                    <h5 class="font-semibold text-base leading-tight mb-1"><?php the_title(); ?></h5>
                                    <p class="text-sm text-gray-500"><?php echo get_the_date(); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- Botão carregar mais -->
            <div class="text-center mt-10">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                    class="bg-casadoaco-orange text-white py-2 px-6 rounded hover:bg-orange-600 transition">Carregar mais</a>
            </div>
        </div>
</section>