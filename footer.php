</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer class="w-full pt-10">
	<?php do_action('tailpress_footer'); ?>
	<div class="max-w-6xl mx-auto flex">
		<div class="w-3/6">
			<img src="<?php echo get_theme_image('logo-casadoaco.png') ?>" class="mb-5">
			<p class="text-sm text-custom-gray md:w-1/2 mb-5">Lorem ipsum dolor sit amet consectetur. Bibendum feugiat</p>
			<div class="w-full flex justify-start gap-5">
				<img src="<?php echo get_theme_image('icon-facebook.png') ?>">
				<img src="<?php echo get_theme_image('icon-instagram.png') ?>">
				<img src="<?php echo get_theme_image('icon-google.png') ?>">
			</div>
		</div>
		<div class="w-1/6">
			<h2 class="font-rockstar text-lg mb-5">Produtos</h2>
			<ul class="pl-0">
				<li class="font-noto text-base mb-3">Produto #1</li>
				<li class="font-noto text-base mb-3">Produto #1</li>
				<li class="font-noto text-base mb-3">Produto #1</li>
				<li class="font-noto text-base mb-3">Produto #1</li>
				<li class="font-noto text-base mb-3">Produto #1</li>
				<li class="font-noto text-base mb-3">Produto #1</li>
			</ul>
		</div>
		<div class="w-1/6">
			<h2 class="font-rockstar text-lg mb-5">Casa do aço</h2>
			<ul class="pl-0">
				<li class="font-noto text-base mb-3">Sobre a gente</li>
				<li class="font-noto text-base mb-3">Produtos</li>
				<li class="font-noto text-base mb-3">Calculadora</li>
				<li class="font-noto text-base mb-3">Contato</li>
				<li class="font-noto text-base mb-3">Blog</li>
			</ul>
		</div>
		<div class="w-1/6">
			<h2 class="font-rockstar text-lg mb-5">Contato</h2>
			<ul class="pl-0">
				<li class="font-noto text-base flex gap-5 items-center mb-3">
					<div class="w-[10%]">
						<img src="<?php echo get_theme_image('icon-mail.png') ?>" class="w-full">
					</div>
					<div class="w-[90%] relative">
						<p class="font-noto text-sm absolute -top-3">contato@casadoacobrasil.com.br</p>
					</div>
				</li>
				<li class="font-noto text-base flex gap-5 items-center">
					<div class="w-[10%]">
						<img src="<?php echo get_theme_image('icon-tel.png') ?>">
					</div>
					<div class="w-[90%]">
						<p class="font-noto text-sm">51 31195999</p>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="max-w-6xl mx-auto flex justify-between my-5">
		<div class="w-1/2">
			<p class="text-custom-gray text-sm font-noto">©Copyright 2025 Casa do Aço. Todos os direitos reservados</p>
		</div>
		<div class="w-1/2 flex justify-end">
			<p class="text-custom-gray text-sm font-normal font-inter">Criado por <a href="https://www.wave.pro.br" class="hover:text-wave transition-all duration-300" target="_blank">wave</a></p>
		</div>
	</div>
	<div class="bg-casadoaco-orange py-5">
		<div class="flex justify-center">
			<p class="text-white text-sm font-noto">Uma empresa do Grupo Casa do Aço</p>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>