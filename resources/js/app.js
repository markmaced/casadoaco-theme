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

	let counterStarted = false;

	function isInViewport(element) {
		const rect = element[0].getBoundingClientRect();
		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
			rect.right <= (window.innerWidth || document.documentElement.clientWidth)
		);
	}

	function startCounter() {
		if (counterStarted) return;

		const $counterBlock = $('.flex.justify-center');
		if (isInViewport($counterBlock)) {
			counterStarted = true;

			$('.counter').each(function () {
				const $this = $(this);
				const countTo = parseInt($this.attr('data-count'));

				if (countTo === 10) {
					$({ countNum: 0 }).animate(
						{ countNum: countTo },
						{
							duration: 2000,
							easing: 'swing',
							step: function (now) {
								if (now >= 10) {
									$this.text('10M');
								} else {
									$this.text(Math.floor(now).toLocaleString('pt-BR'));
								}
							},
							complete: function () {
								$this.text('10M');
							}
						}
					);
				} else {
					$({ countNum: 0 }).animate(
						{ countNum: countTo },
						{
							duration: 2000,
							easing: 'swing',
							step: function (now) {
								$this.text(Math.floor(now).toLocaleString('pt-BR'));
							},
							complete: function () {
								$this.text(countTo.toLocaleString('pt-BR'));
							}
						}
					);
				}
			});
		}
	}

	// Dispara ao carregar e ao rolar a página
	$(window).on('scroll resize', startCounter);
	startCounter();

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
});
