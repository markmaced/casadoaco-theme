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
		if (is_page('cda')):
		?>
			<section class="w-full h-screen flex items-end py-20" style="background-image: url(<?php echo get_theme_image('hero-cda.jpg') ?>);">
				<div class="max-w-6xl mx-auto flex flex-col justify-center">
					<h2 class="md:w-2/5 mx-auto text-casadoaco-orange font-rockstar text-6xl md:text-center">Lorem ipsum dolor sit amet</h2>
					<p class="text-white text-base font-noto md:w-2/5 md:text-center mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus</p>
					<div class="w-full flex gap-5 mt-32">
						<div class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<div class="relative z-10">
								<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">Tubos achatados</h3>
								<p class="text-base text-white font-noto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus</p>
							</div>
						</div>
						<div class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<div class="relative z-10">
								<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">Tubos achatados</h3>
								<p class="text-base text-white font-noto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus</p>
							</div>
						</div>
						<div class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<div class="relative z-10">
								<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">Tubos achatados</h3>
								<p class="text-base text-white font-noto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus</p>
							</div>
						</div>
						<div class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<div class="relative z-10">
								<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">Tubos achatados</h3>
								<p class="text-base text-white font-noto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus</p>
							</div>
						</div>
						<div class="w-1/5 border-t border-t-white pt-5 px-3 relative group before:content-[''] before:absolute before:-top-7 before:left-0 before:h-0 before:w-0 before:bg-casadoaco-orange before:transition-all before:duration-500 before:z-0 hover:before:w-full hover:before:h-[272px]">
							<div class="relative z-10">
								<h3 class="text-lg font-rockstar text-casadoaco-orange group-hover:text-black mb-5">Tubos achatados</h3>
								<p class="text-base text-white font-noto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere accumsan tellus</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
		endif;
		?>

		<header class="w-full bg-white py-5 md:px-0 px-5">
			<div class="max-w-6xl mx-auto w-full flex items-center">
				<div class="md:w-1/3 w-2/3">
					<img src="<?php echo get_theme_image('logo-casadoaco.png') ?>" class="md:w-[262px]">
				</div>
				<div class="md:w-2/3 w-1/3 flex items-center justify-end">
					<ul class="pl-0 md:flex hidden gap-10 items-center justify-end w-full">
						<li>
							<a href="/" class="text-custom-gray font-noto font-semibold text-lg active:text-black">Home</a>
						</li>
						<li>
							<a href="/cda" class="text-custom-gray font-noto font-semibold text-lg active:text-black">CDA</a>
						</li>
						<li>
							<a href="#" class="text-custom-gray font-noto font-semibold text-lg active:text-black">Produtos</a>
						</li>
						<li>
							<a href="#" class="text-custom-gray font-noto font-semibold text-lg active:text-black">Blog</a>
						</li>
						<li>
							<a href="#" class="text-custom-gray font-noto font-semibold text-lg active:text-black">Contato</a>
						</li>
						<li>
							<a href="#" class="text-white bg-casadoaco-orange py-1.5 px-5 rounded-md font-noto font-semibold text-lg">Calculadora</a>
						</li>
					</ul>
					<div class="md:hidden">
						<div class="w-8 bg-casadoaco-orange h-1.5 mb-1 rounded-sm"></div>
						<div class="w-8 bg-casadoaco-orange h-1.5 mb-1 rounded-sm"></div>
						<div class="w-8 bg-casadoaco-orange h-1.5 mb-1 rounded-sm"></div>
					</div>
				</div>
			</div>
		</header>

		<div id="content" class="site-content grow">

			<?php do_action('tailpress_content_start'); ?>

			<main>