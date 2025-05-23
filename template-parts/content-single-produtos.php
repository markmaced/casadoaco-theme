<section class="w-full pt-10">
    <div class="max-w-6xl mx-auto">
        <img src="<?php echo get_theme_image('hero-products.jpg') ?>" class="w-full">
    </div>
</section>
<section class="w-full py-16">
    <div class="max-w-6xl mx-auto flex md:flex-row flex-col-reverse md:gap-10 px-5 md:px-0">
        <div class="md:w-1/2 w-full flex flex-col md:pt-16 pt-10">
            <?php
            $terms = get_the_terms(get_the_ID(), 'categoria_produto');
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    echo '<h3 class="text-xs text-custom-gray font-noto">' . esc_html($term->name) . '</h3>';
                }
            }
            $terms_shop = get_the_terms(get_the_ID(), 'lojas');
            $classe = 'text-casadoaco-orange';
            if (!empty($terms_shop) && !is_wp_error($terms_shop)) {
                foreach ($terms_shop as $term_shop) {
                    if ($term_shop->slug === 'casa-do-aco') {
                        $classe = 'text-casadoaco-orange';
                    } elseif ($term_shop->slug === 'cda') {
                        $classe = 'text-custom-gray';
                    } else {
                        $classe = 'text-casadoaco-orange';
                    }
                }
            }
            ?>
            <h2 class="md:text-4xl text-3xl font-rockstar <?php echo $classe ?> mb-1"><?php echo the_title() ?></h2>
            <?php
            if (!empty($terms_shop) && !is_wp_error($terms_shop)) {
                foreach ($terms_shop as $term_shop) {
                    echo '<p class="text-sm text-black font-noto font-bold mb-5">Faturado e entregue por: <span
                    class="' . $classe . ' font-rockstar">' . $term_shop->name . '</span></p>';
                }
            }
            ?>
            <div class="text-custom-gray font-noto mb-5"><?php echo the_content() ?></div>
            <?php if (get_field('formato')): ?>
                <p class="text-black text text-sm mb-5">Formato: <span
                        class="font-bold"><?php echo get_field('formato') ?></span></p>
            <?php endif ?>
            <?php if (have_rows('acabamentos')): ?>
                <div class="w-full flex gap-1 mb-8">
                    <div class="w-auto">
                        <p class="text-sm text-black font-noto mb-5">Acabamentos:</p>
                    </div>
                    <div class="w-auto">
                        <?php while (have_rows('acabamentos')):
                            the_row();
                            $acabamento = get_sub_field('acabamento');
                            ?>
                            <p class="text-black text text-sm font-bold"><?php echo esc_html($acabamento); ?></p>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (get_field('normas')): ?>
                <p class="text-black text text-sm mb-5">Normas: <span
                        class="font-bold"><?php echo get_field('normas') ?></span></p>
            <?php endif ?>
        </div>
        <div class="md:w-1/2 w-full" data-aos="fade-left">
            <img src="<?php echo the_post_thumbnail_url('medium'); ?>" class="w-full">
        </div>
    </div>
</section>
<section class="w-full md:pt-10 pb-16 md:px-0 px-5">
    <div class="max-w-6xl mx-auto">
        <h2 class="md:text-4xl text-3xl font-rockstar mb-5 text-black">Tabela de medida <span
                class="<?php echo $classe ?>"><?php echo the_title() ?></span></h2>
        <div class="w-full">
            <?php
            $table = get_field('shortcode_da_tabela', get_the_ID());
            echo do_shortcode($table);
            ?>
        </div>
    </div>
</section>
<?php
// Obtém o ID do post atual
$current_id = get_the_ID();

// Obtém os termos da taxonomia 'categoria-produto' e 'lojas' do produto atual
$categorias = wp_get_post_terms($current_id, 'categoria-produto', ['fields' => 'ids']);
$lojas = wp_get_post_terms($current_id, 'lojas', ['fields' => 'ids']);

$args = array(
    'post_type' => 'produtos',
    'posts_per_page' => 4,
    'post__not_in' => array($current_id), // Exclui o produto atual
    'tax_query' => array(
        'relation' => 'OR', // Relaciona por qualquer uma das taxonomias
        array(
            'taxonomy' => 'categoria-produto',
            'field' => 'term_id',
            'terms' => $categorias,
        ),
        array(
            'taxonomy' => 'lojas',
            'field' => 'term_id',
            'terms' => $lojas,
        ),
    ),
);
$query = new WP_Query($args);
?>
<section class="w-full pb-16 px-5 md:px-0">
    <div class="max-w-6xl mx-auto">
        <div class="w-full flex justify-between mb-8 md:gap-0 gap-5">
            <div class="w-1/2">
                <div class="flex w-full items-center">
                    <div class="w-[10%]">
                        <img src="<?php echo get_theme_image('rocket.png') ?>">
                    </div>
                    <div class="w-[90%]">
                        <h2 class="md:text-xl text-base font-rockstar text-custom-gray">Produtos <span
                                class="text-casadoaco-orange">Relacionados</span></h2>
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center">
                <a href="/produtos" class="font-noto text-sm" style="text-decoration: underline !important;">Ver todos os
                    produtos</a>
            </div>
        </div>

        <?php if ($query->have_posts()): ?>
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8">
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
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p class="text-center text-gray-500">Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>
</section>

<?php
echo do_shortcode('[calculator_cta]');
echo do_shortcode('[articles_grid]');

?>