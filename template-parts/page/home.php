<section class="w-full bg-black relative overflow-hidden">
    <div class="max-w-6xl mx-auto flex items-center relative py-20 z-10 md:min-h-[calc(100vh-96px)]">
        <div class="w-2/5 relative z-10 md:px-0 px-5">
            <p class="text-white font-noto text-sm mb-2 md:block hidden">Lorem Ipsum</p>
            <h1 class="text-casadoaco-orange md:text-6xl text-2xl font-rockstar font-bold mb-8">Lorem ipsum dolor sit amet, consectetur .</h1>
            <h2 class="text-white mt-4 text-sm font-noto mb-8 md:block hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus, vitae condimentum ex aliquet sollicitudin. Proin pellentesque vitae risus et luctus. Etiam varius urna sed accumsan dignissim.</h2>
            <div class="w-full md:flex gap-5 mt-6">
                <a href="#" class="text-white bg-casadoaco-orange py-1.5 px-5 rounded-md font-noto font-semibold md:text-base text-sm md:mb-0 mb-5">Conheça a casa do aço</a>
                <a href="#" class="text-white bg-black py-1.5 px-5 rounded-md font-noto font-semibold md:text-base text-sm">Conheça a CDA</a>
            </div>
        </div>
    </div>
    <!-- Imagem fora do container -->
    <div class="absolute inset-y-0 right-0 w-1/2">
        <img src="<?php echo get_theme_image('Hero.jpg') ?>" class="w-full h-full object-cover">
    </div>
</section>
<section class="w-full py-16 relative md:px-0 px-5">
    <div class="max-w-6xl mx-auto">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-1.png') ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-2.png') ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-3.png') ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-4.png') ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-5.png') ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-6.png') ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_theme_image('aco-1.png') ?>">
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<section class="w-full pb-16 md:px-0 px-5">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-center gap-8 text-center text-black">
            <div class="w-1/3">
                <p class="md:text-6xl text-3xl font-bold font-rockstar"><span class="counter" data-count="3000">0</span>+</p>
                <p class="text-sm mt-2 font-noto">clientes atendidos em todo Brasil</p>
            </div>
            <div class="w-1/3">
                <p class="md:text-6xl text-3xl font-bold font-rockstar"><span class="counter" data-count="10">0</span>+</p>
                <p class="text-sm mt-2 font-noto">produtos</p>
            </div>
            <div class="w-1/3">
                <p class="md:text-6xl text-3xl font-bold font-rockstar"><span class="counter" data-count="400">0</span>+</p>
                <p class="text-sm mt-2 font-noto">toneladas ao mês</p>
            </div>
        </div>
    </div>
</section>
<section class="w-full py-16">
    <div class="max-w-6xl mx-auto flex gap-10 items-center">
        <div class="w-1/2">
            <img src="<?php echo get_theme_image('office-1.png') ?>">
        </div>
        <div class="w-1/2">
            <div class="flex w-full items-center mb-5">
                <div class="w-[10%]">
                    <img src="<?php echo get_theme_image('rocket.png')?>">
                </div>
                <div class="w-[90%]">
                    <h2 class="text-lg font-rockstar">Lorem Ipsum <span class="text-casadoaco-orange">Dolor</span></h2>
                </div>
            </div>
            <p class="text-custom-gray text-sm font-noto mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus, vitae condimentum ex aliquet sollicitudin. Proin pellentesque vitae risus et luctus. Etiam varius urna sed accumsan dignissim.</p>
            <p class="text-custom-gray text-sm font-noto mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus, vitae condimentum ex aliquet sollicitudin.</p>
            <a href="#" class="text-white bg-casadoaco-orange py-1.5 px-5 rounded-md font-noto font-semibold text-base">Conheça a casa do aço</a>
        </div>
    </div>
</section>
<?php echo do_shortcode('[products_grid]')?>
<?php echo do_shortcode('[calculator_cta]')?>
<?php echo do_shortcode('[articles_grid]')?>