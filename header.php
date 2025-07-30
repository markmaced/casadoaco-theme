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
		<header class="w-full bg-white py-5 md:px-0 px-5">
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
						<li>
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
						<li>
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