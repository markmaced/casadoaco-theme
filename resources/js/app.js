jQuery(document).ready(function ($) {
	const swiper = new Swiper('.swiper', {
		slidesPerView: 3,
		spaceBetween: 20,
		breakpoints: {
			768: {
				slidesPerView: 6,
				spaceBetween: 60
			}
		},
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false // Continua mesmo após interação do usuário
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		}
	});
	const swiperProducts = new Swiper('.swiper-products', {
		slidesPerView: 2,
		spaceBetween: 20,
		breakpoints: {
			768: {
				slidesPerView: 4,
				spaceBetween: 20
			}
		},
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		}
	});

	function startCounter(counter) {
		let $counter = $(counter);
		let target = parseInt($counter.attr("data-target"));
		let count = 0;
		let increment = Math.ceil(target / 100);

		let interval = setInterval(() => {
			count += increment;
			if (count >= target) {
				$counter.text(target.toLocaleString('pt-BR') + '+');
				clearInterval(interval);
			} else {
				$counter.text(count.toLocaleString('pt-BR') + '+');
			}
		}, 25);
	}

	function checkVisibility() {
		$(".counter").each(function () {
			let $this = $(this);
			let offsetTop = $this.offset().top;
			let windowHeight = $(window).height();
			let scrollTop = $(window).scrollTop();

			if (scrollTop + windowHeight > offsetTop && !$this.hasClass("counting")) {
				$this.addClass("counting");
				startCounter(this);
			}
		});
	}

	$(window).on("scroll", function () {
		checkVisibility();
	});

	checkVisibility();

	$('.openMenu').on('click', function () {
		$('#mobileMenu').removeClass('-right-100').addClass('right-0')
	})
	$('#closeMenu').on('click', function () {
		$('#mobileMenu').removeClass('right-0').addClass('-right-100')
	})

	if (wpurl.isPage == 'cda') {
		const $header = $('header');
		const triggerPoint = 350; // pixels para exibir o header

		$header.hide();

		let isVisible = false;

		$(window).on('scroll', function () {
			const scrollTop = $(this).scrollTop();

			if (scrollTop > triggerPoint) {
				if (!isVisible) {
					isVisible = true;

					$header
						.stop(true, true)
						.css({
							display: 'flex',
							opacity: 0,
							transform: 'translateY(-20px)'
						})
						.animate(
							{ opacity: 1 },
							{
								duration: 400,
								step: function (now, fx) {
									$(this).css('transform', `translateY(${(1 - now) * -20}px)`);
								}
							}
						);
				}
			} else {
				if (isVisible) {
					isVisible = false;

					$header
						.stop(true, true)
						.animate(
							{ opacity: 0 },
							{
								duration: 400,
								step: function (now, fx) {
									$(this).css('transform', `translateY(${(1 - now) * -20}px)`);
								},
								complete: function () {
									$(this).hide();
								}
							}
						);
				}
			}
		});

		// Executa uma verificação no carregamento da página
		$(window).trigger('scroll');
	}
	const currentPath = window.location.pathname;

	$('.menu-item a').each(function () {
		const linkPath = $(this).attr('href');

		// Verifica se a URL atual começa com o caminho do link
		if (currentPath === linkPath || (linkPath !== '/' && currentPath.startsWith(linkPath))) {
			$(this).removeClass('text-custom-gray');
			$(this).addClass('text-black');
			$(this).addClass('linkActive');
		}
	});
	$(document).on('click', 'a[href^="#"]', function (event) {
		event.preventDefault();

		var target = $($.attr(this, 'href'));

		if (target.length) {
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 800);
		}
	});
	$(document).on('click', '.row-table-style', function () {
		$('.row-table-style').removeClass('row-active')
		$(this).addClass('row-active')
	})

	function filtrarProdutos(paged = 1) {
		const form = $('#filtro-produtos');
		const formData = form.serializeArray();
		formData.push({ name: 'action', value: 'filtrar_produtos_ajax' });
		formData.push({ name: 'paged', value: paged });

		$.ajax({
			url: wpurl.admin_url,
			method: 'POST',
			data: formData,
			beforeSend: function () {
				$('#resultProducts').html('<p>Carregando...</p>');
			},
			success: function (response) {
				$('#resultProducts').html(response);
			},
			error: function () {
				$('#resultProducts').html('<p>Erro ao carregar produtos.</p>');
			}
		});
	}

	// Ao alterar filtros
	$('#filtro-produtos').on('change', 'input[type=checkbox]', function () {
		filtrarProdutos(1);
	});

	// Paginação dinâmica
	$(document).on('click', '#paginacao-produtos button', function (e) {
		e.preventDefault();
		const paged = $(this).data('paged');
		filtrarProdutos(paged);
	});

	function animateOnScroll() {
		$('.animate-on-scroll').each(function () {
			var elementTop = $(this).offset().top;
			var elementBottom = elementTop + $(this).outerHeight();
			var viewportTop = $(window).scrollTop();
			var viewportBottom = viewportTop + $(window).height();

			if (elementBottom > viewportTop && elementTop < viewportBottom) {
				var animation = $(this).data('animation') || 'animate__fadeInUp';
				$(this).addClass(animation).addClass('animate__animated');
				$(this).removeClass('animate-on-scroll'); // remove pra não repetir
			}
		});
	}

	// dispara no load e no scroll
	$(window).on('scroll resize load', animateOnScroll);

	AOS.init();
});