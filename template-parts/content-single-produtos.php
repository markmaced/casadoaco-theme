<section class="w-full pt-10">
    <div class="max-w-6xl mx-auto">
        <img src="<?php echo get_theme_image('hero-products.jpg') ?>" class="w-full">
    </div>
</section>
<section class="w-full py-16">
    <div class="max-w-6xl mx-auto flex gap-10">
        <div class="w-1/2 flex flex-col pt-16">
            <h3 class="text-xs text-custom-gray font-noto">Categoria</h3>
            <h2 class="text-4xl font-rockstar text-casadoaco-orange mb-1"><?php echo the_title() ?></h2>
            <p class="text-sm text-black font-noto font-bold mb-5">Faturado e entregue por: <span
                    class="text-casadoaco-orange font-rockstar">Casa do aço</span></p>
            <div class="text-custom-gray font-noto mb-5"><?php echo the_content() ?></div>
            <p class="text-black text text-sm mb-5">Formato: <span class="font-bold">Redondo</span></p>
            <div class="w-full flex gap-1 mb-8">
                <div class="w-auto">
                    <p class="text-sm text-black font-noto mb-5">Acabamentos:</p>
                </div>
                <div class="w-auto">
                    <p class="text-black text text-sm font-bold">Tubos com ou sem costura.</p>
                    <p class="text-black text text-sm font-bold">Tubos com ou sem costura.</p>
                </div>
            </div>
            <p class="text-black text text-sm mb-5">Normas: <span class="font-bold">A312 e A778</span></p>
        </div>
        <div class="w-1/2">
            <img src="<?php echo get_theme_image('office-1.png') ?>">
        </div>
    </div>
</section>
<section class="w-full py-16">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-rockstar mb-5 text-black">Tabela de medida <span class="text-casadoaco-orange"><?php echo the_title() ?></span></h2>
        <div class="w-full">
            <?php
            $table = get_field('shortcode_da_tabela', get_the_ID());
            echo do_shortcode($table);
            ?>
        </div>
    </div>
</section>
