<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="w-full bg-white py-7">
		<div class="max-w-6xl mx-auto w-full flex items-center">
			<div class="w-1/3">
				<img src="<?php echo get_theme_image('logo-casadoaco.png')?>">
			</div>
			<div class="w-2/3 flex items-center">
				<ul class="pl-0 flex gap-10 items-center justify-end w-full">
					<li>
						<a href="#" class="text-custom-gray font-noto font-semibold text-lg active:text-black">Home</a>
					</li>
					<li>
						<a href="#" class="text-custom-gray font-noto font-semibold text-lg active:text-black">CDA</a>
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
			</div>
		</div>
	</header>

	<div id="content" class="site-content grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
