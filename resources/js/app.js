jQuery(document).ready(function ($) {
      const swiper = new Swiper('.swiper', {
            slidesPerView: 3,
            spaceBetween: 60,
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
      let counterStarted = false;

	const observer = new IntersectionObserver(function(entries) {
		const entry = entries[0];
		if (entry.isIntersecting && !counterStarted) {
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
	}, {
		threshold: 0.9 // espera quase toda a div estar visível
	});

	// Observa diretamente a div onde estão os contadores
	const counterBlock = document.querySelector('.flex.justify-center');
	if (counterBlock) {
		observer.observe(counterBlock);
	}
});
