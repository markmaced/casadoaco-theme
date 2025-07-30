</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer class="w-full pt-10">
	<?php do_action('tailpress_footer'); ?>
	<?php
	$args = array(
		'post_type' => 'produtos',
		'posts_per_page' => 6,
		'paged' => $paged,
	);

	$query = new WP_Query($args);
	?>
	<div class="max-w-6xl mx-auto flex md:flex-nowrap md:gap-0 flex-wrap md:px-0 px-5">
		<div class="md:w-[34%] w-full md:mb-0 mb-10">
			<img src="<?php echo get_theme_image('logo-casadoaco.png') ?>" class="mb-5">
			<p class="md:text-sm text-xs text-custom-gray md:w-1/2 mb-5">Distribuição e atendimento técnico em todo o
				Brasil. Fale com nossa equipe e descubra o material ideal para seu projeto.</p>
			<div class="w-full flex justify-start gap-5">
				<a href="https://www.facebook.com/casadoacobrasil/" target="_blank">
					<img src="<?php echo get_theme_image('facebook.png') ?>" class="w-5 h-5 mt-0.5">
				</a>
				<a href="https://www.instagram.com/casadoacobrasil/" target="_blank">
					<img src="<?php echo get_theme_image('instagram.png') ?>" class="w-5 h-5 mt-0.5">
				</a>
				<a href="https://share.google/I422L5CCJmBpomZtF">
					<img src="<?php echo get_theme_image('icon-google.png') ?>">
				</a>
			</div>
		</div>
		<div class="md:w-[20%] w-1/2 md:pl-0 pl-7 md:block hidden">
			<h2 class="font-rockstar text-lg mb-5">Produtos</h2>
			<?php if ($query->have_posts()): ?>
				<ul class="pl-0 md:block flex flex-wrap">
					<?php while ($query->have_posts()):
						$query->the_post(); ?>
						<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a
								href="<?php echo the_permalink() ?>"><?php echo the_title() ?></a></li>
					<?php endwhile ?>
				</ul>
			<?php endif ?>
		</div>
		<div class="md:w-[20%] w-1/2">
			<h2 class="font-rockstar text-lg mb-5">Casa do aço</h2>
			<ul class="pl-0">
				<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a href="/">Home</a></li>
				<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a href="/cda">CDA</a></li>
				<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a href="/produtos">Produtos</a></li>
				<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a href="/calculadora">Calculadora</a>
				</li>
				<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a href="/contato">Contato</a></li>
				<li class="font-noto md:text-base text-xs mb-3 md:w-full w-1/2"><a href="/blog">Blog</a></li>
			</ul>
		</div>
		<div class="md:w-[26%] w-1/2">
			<h2 class="font-rockstar text-lg mb-5">Contato</h2>
			<ul class="pl-0">
				<li class="font-noto text-base flex items-start gap-2 mb-3">
					<div class="flex-shrink-0 w-4 mt-1">
						<img src="<?php echo get_theme_image('gmail.png') ?>" class="w-5">
					</div>
					<div class="break-all text-sm leading-tight">
						<a href="mailto:contato@casadoacobrasil.com.br" target="_blank">contato@casadoacobrasil.com.br</a>
					</div>
				</li>
				<li class="font-noto text-base flex items-center gap-2 mb-3">
					<div class="flex-shrink-0 w-4 mt-1">
						<img src="<?php echo get_theme_image('whatsapp.png') ?>" class="w-5">
					</div>
					<div class="text-sm leading-tight mt-1">
						<a href="https://wa.me/555131195999" target="_blank">51 31195999</a>
					</div>
				</li>
				<li class="font-noto text-base flex items-start gap-2 mb-3">
					<!-- <div class="flex-shrink-0 w-4 mt-1">
						<img src="<?php # echo get_theme_image('map.png') ?>" class="w-full">
					</div> -->
					<div class="text-sm leading-tight mt-1">
						<p class="font-bold font-rockstar mb-1">Casa do Aço</p>
						<a href="https://www.google.com/maps?q=Av.+Frederico+Augusto+Ritter,+3650,+Cachoeirinha,+RS"
							target="_blank" class="font-noto block hover:underline">
							Av. Frederico Augusto Ritter, 3650<br>
							Distrito Industrial, Cachoeirinha - RS
						</a>
					</div>
				</li>
				<li class="font-noto text-base flex items-start gap-2">
					<!-- <div class="flex-shrink-0 w-4 mt-1">
						<img src="<?php # echo get_theme_image('map.png') ?>" class="w-full">
					</div> -->
					<div class="text-sm leading-tight">
						<p class="font-bold font-rockstar mb-1">CDA</p>
						<a href="https://www.google.com/maps?q=Estrada+Manoel+José+do+Nascimento,+128,+Cachoeirinha,+RS"
							target="_blank" class="font-noto mb-1 block hover:underline">
							Estrada Manoel José do Nascimento, 128<br>
							Distrito Industrial, Cachoeirinha - RS
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="max-w-6xl mx-auto flex justify-between my-5 md:px-0 px-5">
		<div class="w-1/2">
			<p class="text-custom-gray md:text-sm text-xs font-noto">©Copyright 2025 Casa do Aço. Todos os direitos
				reservados</p>
		</div>
		<div class="w-1/2 flex justify-end">
			<p class="text-custom-gray text-sm font-normal font-inter">Criado por <a href="https://www.wave.pro.br"
					class="hover:text-wave transition-all duration-300" target="_blank">wave</a></p>
		</div>
	</div>
	<div class="bg-casadoaco-orange py-5 md:px-0 px-5">
		<div class="flex justify-center">
			<p class="text-white text-sm font-noto">Uma empresa do Grupo Casa do Aço</p>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>