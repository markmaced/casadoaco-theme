<section class="w-full py-16 overflow-x-hidden animate__animated animate__fadeInUp animate__delay-1s">
  <div class="max-w-6xl mx-auto flex md:gap-10 items-center relative">
    <div class="md:w-1/2 w-3/5 md:px-0 px-5 animate__animated animate__fadeInLeft animate__delay-1s">
      <div class="flex w-full items-center mb-5">
        <div class="w-[10%]">
          <img src="<?php echo get_theme_image('rocket.png') ?>">
        </div>
        <div class="w-[90%]">
          <h2 class="md:text-xl text-xl font-rockstar md:w-[70%] leading-6">
            Organização e <span class="text-casadoaco-orange">controle técnico</span>
          </h2>
        </div>
      </div>
      <p class="text-custom-gray md:text-base text-base font-noto mb-5">A CDA se destaca pela excelência no
        armazenamento, padronização e manuseio dos metais.</p>
      <p class="text-custom-gray text-base font-noto mb-10">Cada lote é inspecionado com critérios rigorosos,
        assegurando que você receba o material certo, no prazo combinado.</p>
    </div>
    <div class="md:w-1/2 w-2/5 relative animate__animated animate__zoomIn animate__delay-2s">
      <img src="<?php echo get_theme_image('cda-1.png') ?>"
        class="md:w-full w-[312px] md:relative absolute h-[400px] md:top-0 -top-52 object-cover md:rounded-none rounded-2xl md:left-0 -right-3">
    </div>
  </div>
</section>

<section class="w-full md:pb-16 animate__animated animate__fadeInUp animate__delay-2s">
  <div class="max-w-6xl mx-auto flex md:gap-10 items-center">
    <div class="md:w-1/2 w-2/5 relative animate__animated animate__zoomIn animate__delay-3s">
      <img src="<?php echo get_theme_image('cda-2.png') ?>"
        class="md:w-full w-[312px] md:relative absolute h-[400px] md:top-0 -top-52 object-cover md:rounded-none rounded-2xl md:left-0 -left-3">
    </div>
    <div class="md:w-1/2 w-3/5 md:px-0 px-5 animate__animated animate__fadeInRight animate__delay-2s">
      <div class="flex w-full items-center mb-5">
        <div class="w-[10%]">
          <img src="<?php echo get_theme_image('rocket.png') ?>">
        </div>
        <div class="w-[90%]">
          <h2 class="md:text-xl text-xl font-rockstar md:w-[70%] leading-6">
            Eficiência do <span class="text-casadoaco-orange">início ao fim</span>
          </h2>
        </div>
      </div>
      <p class="text-custom-gray md:text-base text-base font-noto mb-10">Com uma equipe qualificada e estrutura pronta
        para grandes volumes, garantimos eficiência em todas as etapas: do recebimento ao carregamento. Isso assegura
        mais agilidade, precisão e segurança no seu pedido.</p>
    </div>
  </div>
</section>

<section class="w-full pt-16 pb-20 animate__animated animate__fadeIn animate__delay-3s">
  <div class="max-w-6xl mx-auto flex flex-col justify-center md:px-0 px-5">
    <h2 class="text-black font-noto mb-5 text-3xl text-center font-semibold">
      Conheça os <span class="text-casadoaco-orange">produtos</span> que trabalhamos
    </h2>
    <p class="text-center mx-auto text-sm mb-1 font-bold">Matéria-prima de confiança para quem exige precisão.</p>
    <p class="text-center mx-auto text-sm mb-10">Nossa linha atende às demandas industriais com alto padrão de
      qualidade, pronta entrega e corte sob medida.</p>
    <div class="w-full animate__animated animate__fadeInUp animate__delay-4s">
      <?php
      $args = array(
        'post_type' => 'produtos',
        'posts_per_page' => 4,
      );
      $query = new WP_Query($args);
      ?>
      <?php if ($query->have_posts()): ?>
        <div class="swiper-products">
          <div class="swiper-wrapper">
            <?php while ($query->have_posts()):
              $query->the_post(); ?>
              <div class="swiper-slide animate__animated animate__zoomIn">
                <a href="<?php echo the_permalink()?>">
                  <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
                    class="rounded-xl w-full h-48 object-cover">
                </a>
              </div>
            <?php endwhile ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>

<?php echo do_shortcode('[calculator_cta]') ?>
<div class="w-full mb-16"></div>