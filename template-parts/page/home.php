<section class="w-full bg-black relative overflow-hidden">
  <div class="max-w-6xl mx-auto flex md:flex-row flex-col-reverse items-center relative md:py-20 z-10 md:min-h-[calc(100vh-96px)]">
    <div class="md:w-2/5 w-full relative z-10 md:px-0 px-5 py-10">
      <h1 class="text-casadoaco-orange md:text-6xl text-2xl font-rockstar font-bold mb-8" data-aos="fade-right">
        Mais que aço: compromisso com quem constrói
      </h1>
      <h2 class="text-white mt-4 text-sm font-noto mb-5 md:block font-bold">
        Há mais de uma década fornecendo qualidade, variedade e entrega rápida no Sul do Brasil.
      </h2>
      <p class="text-white mt-4 text-sm font-noto mb-8 md:block hidden">
        Com duas unidades — Casa do Aço e CDA — atuamos com foco no fornecimento de metais certificados, amplo estoque e
        agilidade logística para atender projetos de diversos setores.
      </p>
      <div class="w-full md:flex gap-5 mt-6">
        <div class="w-auto md:mb-0 mb-5">
          <a href="#casadoaco"
            class="text-white bg-casadoaco-orange py-1.5 md:px-5 px-2 rounded-md font-noto font-semibold md:text-base text-sm">
            Conheça a Casa do Aço
          </a>
        </div>
        <div class="w-auto">
          <a href="/cda"
            class="text-white bg-black py-1.5 md:px-5 px-2 rounded-md font-noto font-semibold md:text-base text-sm">
            Conheça a CDA
          </a>
        </div>
      </div>
    </div>
    <div class="md:absolute md:hidden md:inset-y-0 md:right-0 md:w-1/2 w-full animate__animated animate__fadeInRight">
      <div class=" relative w-full h-full">
        <!-- Vídeo de fundo -->
        <video autoplay loop muted playsinline class="md:absolute w-full h-full object-cover z-10">
          <source src="<?php echo get_template_directory_uri(); ?>/resources/images/hero-video.mp4" type="video/mp4">
          Seu navegador não suporta vídeo em HTML5.
        </video>

        <!-- Overlay -->
        <div class="absolute top-0 left-0 w-full h-full bg-casadoaco-orange opacity-50 z-20"></div>
      </div>
    </div>
  </div>

  <div class="md:absolute md:block hidden inset-y-0 right-0 md:w-1/2 w-full animate__animated animate__fadeInRight">
    <div class=" relative w-full h-full">
      <!-- Vídeo de fundo -->
      <video autoplay loop muted playsinline class="absolute w-full h-full object-cover z-10">
        <source src="<?php echo get_template_directory_uri(); ?>/resources/images/hero-video.mp4" type="video/mp4">
        Seu navegador não suporta vídeo em HTML5.
      </video>

      <!-- Overlay -->
      <div class="absolute top-0 left-0 w-full h-full bg-casadoaco-orange opacity-50 z-20"></div>
    </div>
  </div>

</section>

<section class="w-full py-16 relative md:px-0 px-5">
  <div class="max-w-6xl mx-auto">
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
        foreach (['aco-1.png', 'aco-2.png', 'aco-3.png', 'aco-4.png', 'aco-5.png', 'aco-6.png', 'aco-1.png'] as $img) {
          echo '<div class="swiper-slide animate-on-scroll" data-animation="animate__zoomIn"><img src="' . get_theme_image($img) . '" class="md:w-[70px] w-[40px] mx-auto"></div>';
        }
        ?>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>

<section class="w-full pb-5 md:px-0 px-5">
  <div class="max-w-6xl mx-auto">
    <div class="flex justify-center gap-8 text-center text-black">
      <div class="w-1/3">
        <p class="md:text-6xl text-3xl font-bold font-rockstar"><span class="counter" data-target="5000">0</span></p>
        <p class="text-sm mt-2 font-noto">clientes atendidos em todo Brasil</p>
      </div>
      <div class="w-1/3">
        <p class="md:text-6xl text-3xl font-bold font-rockstar"><span class="counter" data-target="10000">0</span></p>
        <p class="text-sm mt-2 font-noto">de produtos no portfólio</p>
      </div>
      <div class="w-1/3">
        <p class="md:text-6xl text-3xl font-bold font-rockstar"><span class="counter" data-target="1000">0</span></p>
        <p class="text-sm mt-2 font-noto">toneladas movimentadas por mês</p>
      </div>
    </div>
  </div>
</section>

<section class="w-full py-16" id="casadoaco">
  <div class="max-w-6xl mx-auto flex md:gap-10 items-center">
    <div class="md:w-1/2 w-2/5 relative overflow-x-hidden rounded-2xl">
      <img src="<?php echo get_theme_image('office.png') ?>"
        class="md:w-full w-[312px] md:relative absolute h-[400px] md:top-0 -top-52 object-cover md:rounded-none rounded-2xl md:left-0 -left-3">
    </div>
    <div class="md:w-1/2 w-3/5 md:px-0 px-5">
      <div class="flex w-full items-start mb-5">
        <div class="w-[10%]">
          <img src="<?php echo get_theme_image('rocket.png') ?>">
        </div>
        <div class="w-[90%]">
          <h2 class="md:text-3xl text-base font-rockstar md:w-[70%] md:leading-6 leading-5">
            Atendimento técnico e estrutura de ponta <span class="text-casadoaco-orange">para o seu projeto</span>
          </h2>
        </div>
      </div>
      <p class="text-custom-gray md:text-xl text-sm font-noto font-normal mb-10">
        Nos bastidores da Casa do Aço, uma equipe especializada acompanha cada etapa para garantir excelência em
        qualidade e precisão. Desde a seleção dos materiais até o suporte ao cliente, somos movidos por agilidade,
        responsabilidade e parceria.
      </p>
      <a href="/contato"
        class="text-white bg-casadoaco-orange py-1.5 md:px-5 px-3 rounded-md font-noto font-semibold text-base transition-all duration-500 hover:bg-black"
        data-aos="zoom-in-up">
        Fale com nosso time
      </a>
    </div>
  </div>
</section>

<?php echo do_shortcode('[products_grid]') ?>
<?php echo do_shortcode('[calculator_cta]') ?>
<?php echo do_shortcode('[articles_grid]') ?>