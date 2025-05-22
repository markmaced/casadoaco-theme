<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<?php do_action('tailpress_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col">

		<?php do_action('tailpress_header'); ?>

		<?php
		$header_class = '';
		if (is_page('cda')):
			$header_class .= 'fixed top-0 left-0 z-50';
			?>
			<section
				class="w-full md:h-screen h-auto flex md:items-end items-center py-20 md:px-0 px-5 bg-cover"
				style="background-image: url(<?php echo get_theme_image('hero-cda.jpg') ?>);">
				<div class="max-w-6xl mx-auto flex flex-col justify-center" data-aos="fade-down">
					<h1
						class="md:w-2/5 mx-auto text-casadoaco-orange font-rockstar md:text-6xl text-3xl md:text-center md:mb-0 mb-5 text-center">
						Tubos técnicos para projetos de alta exigência
					</h1>
					<h2
						class="text-white text-base font-noto md:w-2/5 md:text-center mx-auto md:mb-0 mb-5 text-center">
						Precisão, acabamento e matéria-prima certificada para quem não pode errar.
					</h2>
					<a href="#"
						class="text-white bg-casadoaco-orange py-1.5 md:px-5 px-3 rounded-md font-noto font-semibold text-base md:hidden text-center w-2/3 mx-auto">
						Fale com nosso time
					</a>
					<div class="w-full md:flex gap-5 mt-32 hidden">
						<div
							class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<a href="/categoria-produto/tubos-achatados">
								<div class="relative z-10">
									<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">
										Tubos achatados
									</h3>
									<p class="text-base text-white font-noto">Leveza e resistência combinadas. Ideal para
										estruturas que exigem estética e performance.</p>
								</div>
							</a>
						</div>
						<div
							class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<a href="/categoria-produto/tubos-redondos">
								<div class="relative z-10">
									<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">
										Tubos redondos
									</h3>
									<p class="text-base text-white font-noto">Versatilidade para aplicações industriais e
										hidráulicas. Produzidos com alto padrão de precisão dimensional.</p>
								</div>
							</a>
						</div>
						<div
							class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<a href="/categoria-produto/tubos-retangulares">
								<div class="relative z-10">
									<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">
										Tubos retangulares
									</h3>
									<p class="text-base text-white font-noto">Estabilidade e rigidez para estruturas
										metálicas, maquinários e componentes industriais.</p>
								</div>
							</a>
						</div>
						<div
							class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<a href="/categoria-produto/tubos-quadrados">
								<div class="relative z-10">
									<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">
										Tubos quadrados
									</h3>
									<p class="text-base text-white font-noto">Alta resistência à torção e impactos.
										Utilizado em obras, suportes e sistemas estruturais.</p>
								</div>
							</a>
						</div>
						<div
							class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<a href="/categoria-produto/tubos-trefilados">
								<div class="relative z-10">
									<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">
										Tubos trefilados
									</h3>
									<p class="text-base text-white font-noto">Acabamento refinado e tolerância exata.
										Recomendado para projetos com alto nível técnico e visual.</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>
			<?php
		endif;
		?>
		<header class="w-full bg-white py-5 md:px-0 px-5 <?php echo $header_class ?>">
			<div class="max-w-6xl mx-auto w-full flex items-center">
				<div class="md:w-1/3 w-2/3">
					<a href="/">
						<img src="<?php echo get_theme_image('logo-casadoaco.png') ?>" class="md:w-[262px]">
					</a>
				</div>
				<div class="md:w-2/3 w-1/3 flex items-center justify-end">
					<ul class="pl-0 md:flex hidden gap-10 items-center justify-end w-full">
						<li class="menu-item">
							<a href="/"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Home</a>
						</li>
						<li class="menu-item">
							<a href="/cda"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">CDA</a>
						</li>
						<li class="menu-item">
							<a href="/produtos"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Produtos</a>
						</li>
						<li class="menu-item">
							<a href="/blog"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Blog</a>
						</li>
						<li class="menu-item">
							<a href="/contato"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Contato</a>
						</li>
						<li class="menu-item">
							<a href="/calculadora"
								class="text-white bg-casadoaco-orange py-1.5 px-5 rounded-md font-noto font-semibold text-lg transition-all duration-500 hover:bg-black">Calculadora</a>
						</li>
					</ul>
					<div class="md:hidden openMenu">
						<div class="w-8 bg-casadoaco-orange h-1.5 mb-1 rounded-sm"></div>
						<div class="w-8 bg-casadoaco-orange h-1.5 mb-1 rounded-sm"></div>
						<div class="w-8 bg-casadoaco-orange h-1.5 mb-1 rounded-sm"></div>
					</div>
				</div>
			</div>
			<div class="md:hidden flex flex-col fixed w-full bg-white h-screen top-0 -right-100 transition-all duration-500 z-50 items-start px-5"
				id="mobileMenu">
				<button id="closeMenu" class="absolute top-5 right-5 text-black hover:text-black">&times;</button>
				<div class="flex justify-center pt-20 pb-10 w-full flex-col items-center border-b px-5 border-b-white">
					<img src="<?php echo get_theme_image('logo-casadoaco.png') ?>"
						class="w-64 mx-auto object-contain mb-10">
					<ul class="flex p-0 gap-5 flex-col text-center">
						<li class="menu-item">
							<a href="/"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Home</a>
						</li>
						<li class="menu-item">
							<a href="/cda"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">CDA</a>
						</li>
						<li class="menu-item">
							<a href="/produtos"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Produtos</a>
						</li>
						<li class="menu-item">
							<a href="/blog"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Blog</a>
						</li>
						<li class="menu-item">
							<a href="/contato"
								class="text-custom-gray hover:text-black relative transition-all duration-500 before:transition-all before:duration-500 before:h-0.5 before:absolute before:-bottom-1 hover:before:w-full before:w-0 before:content-[''] before:bg-casadoaco-orange font-noto font-semibold text-lg active:text-black">Contato</a>
						</li>
						<li class="menu-item">
							<a href="/calculadora"
								class="text-white bg-casadoaco-orange py-1.5 px-5 rounded-md font-noto font-semibold text-lg transition-all duration-500 hover:bg-black">Calculadora</a>
						</li>
					</ul>
				</div>
			</div>
		</header>

		<div id="content" class="site-content grow">

			<?php do_action('tailpress_content_start'); ?>

			<main>