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

	// $('#load-more').on('click', function () {
	//     var button = $(this);
	//     var offset = parseInt(button.attr('data-offset'));

	//     $.ajax({
	//         url: wpurl.admin_url,
	//         type: 'POST',
	//         data: {
	//             action: 'load_more_posts',
	//             offset: offset
	//         },
	//         beforeSend: function () {
	//             button.text('Carregando...');
	//         },
	//         success: function (response) {
	//             if (response.trim() === 'no_more') {
	//                 button.remove(); // Remove botão se não houver mais posts
	//             } else {
	//                 $('#old-posts').append(response); // Adiciona os novos posts
	//                 offset += 6;
	//                 button.attr('data-offset', offset);
	//                 button.text('Carregar mais');
	//             }
	//         }
	//     });
	// });

	$('.share-copy').on('click', function () {
		var postLink = $('input[name="siteUrl"]').val();
		var tempInput = $("<input>");
		$("body").append(tempInput);
		tempInput.val(postLink).select();
		document.execCommand("copy");
		tempInput.remove();
		alert("Link copiado");
	});
	$(document).on('click', function (event) {
		if (!$(event.target).closest('.share-content-top').length && !$(event.target).hasClass('open-share-yop')) {
			$('.share-content-top').css('display', 'none');
		}
	});
	$(document).on('click', function (event) {
		if (!$(event.target).closest('.share-content-bottom').length && !$(event.target).hasClass('open-share-bottom')) {
			$('.share-content-bottom').css('display', 'none');
		}
	});
	$('.open-share-yop').on('click', function (event) {
		event.stopPropagation();
		$('.share-content-top').css('display', 'flex');
	});
	$('.open-share-bottom').on('click', function (event) {
		event.stopPropagation();
		$('.share-content-bottom').css('display', 'flex');
	});

	$('.cat-calc-btn').on('click', function () {
		const termId = $(this).data('calc-id');

		$('.cat-calc-btn').removeClass('activeCalc')
		$(this).addClass('activeCalc')

		limpaTxt()

		const idValue = $(this).attr('id');
		$('#material').val(idValue);

		$.ajax({
			url: wpurl.admin_url,
			type: 'POST',
			data: {
				action: 'filtrar_calculadoras',
				categoria_id: termId
			},
			beforeSend: function () {
				$('#calcOptions').html('<p>Carregando...</p>');
			},
			success: function (response) {
				$('#calcOptions').html(response);
			},
			error: function () {
				$('#calcOptions').html('<p>Erro ao carregar calculadoras.</p>');
			}
		});
	});

	$('.cat-calc-btn').eq(0).trigger('click');

	$(document).on('click', '[data-option-id]', function () {
		const postId = $(this).data('option-id');

		$('[data-option-id]').removeClass('buttonActive')
		$(this).addClass('buttonActive')

		const idValue = $(this).attr('id');
		$('#formato').val(idValue);

		$.ajax({
			url: wpurl.admin_url,
			type: 'POST',
			data: {
				action: 'carregar_campos_calculadora',
				post_id: postId
			},
			beforeSend: function () {
				$('#optionsFields').html('<p>Carregando campos...</p>');
			},
			success: function (response) {
				$('#optionsFields').html(response);
			},
			error: function () {
				$('#optionsFields').html('<p>Erro ao carregar os campos.</p>');
			}
		});
	});
	function volume(formato, a, b, c, d) {
		if (a) {
			a = a * 1
		}
		if (b) {
			b = b * 1
		}
		if (c) {
			c = c * 1
		}
		if (d) {
			d = d * 1
		}
		switch (formato) {
			case "barra-quadrada":
				return (a * a) / 1000;
			case "barra-retangular":
				return (a * b) / 1000;
			case "barra-chata":
				return (a * b) / 1000;
			case "bobina":
				return (a * b) / 1000;
			case "chapa":
				return (a * b * c) / 1000000;
			case "chapa-xadrez":
				return ((a * b * c) / 1000000) * 1.1;
			case "tarugo":
				if (a) {
					return ((a + 1.58) * (a + 1.58) * 0.7854) / 2000
				} else {
					return 0
				}
			case "barra-redonda":
				return (a * a * 0.7854) / 1000;
			case "barra-sextavada":
				return (a * a * 0.866) / 1000;
			case "bucha":
				a = (a + 1.58) * (a + 1.58);
				b = (b - 1.58) * (b - 1.58);
				return (a - b) * 0.003534;
			case "tubo-redondo":
			case "tubo-schedule":
			case "tubo-refrigeracao":
				return ((b - a) * a * 3.1416) / 1000;
			case "tubo-quadrado":
				return ((2 * b - 2 * a) * 2 * a) / 1000;
			case "tubo-retangular":
				return ((b + c - 2 * a) * 2 * a) / 1000;
			case "perfil-l":
			case "perfil-t":
				return (2 * b * a - a * a) / 1000;
			case "perfil-u":
				return (3 * b * a - 2 * a * a) / 1000;
			case "perfil-u-abas-desiguais":
				return ((b + c + d) * a) / 1000;
			case "vergalhao-quadrado":
				return (a * a) / 1000;
			case "vergalhao-redondo":
				return (a * a * 0.7854) / 1000;
			case "vergalhao-sextavado":
				return (a * a * 0.866) / 1000
		}
	}
	function peso(material, formato, a, b, c, d) {
		var materiais = new Array();
		materiais.aluminio = 2.75;
		materiais.cobre = 9;
		materiais.latao = 8.7;
		materiais.bronze = 9;
		materiais.acoinox = 8;
		materiais.acocarbono = 8;
		var vol = 0;
		var peso = 0;
		vol = volume(formato, a, b, c, d);
		if (formato == "bucha") {
			peso = vol
		} else {
			peso = vol * materiais[material]
		}
		console.log("vol " + vol);
		console.log("Peso " + peso);
		return peso
	}
	function toNumber(number) {
		if (typeof number !== 'string') number = String(number || '');

		number = number.replace(/,/, ".");
		number = number.replace(/[^0-9\.]*/, "");

		return number;
	}
	function limpaTxt() {
		$("#txta").val("");
		$("#txtb").val("");
		$("#txtc").val("");
		$("#txtd").val("");
		$("#resultado").val("")
	}
	$(document).on('keyup', 'input', function () {
		$(this).change()
	});
	$(document).on('change', 'input', function () {
		// console.log($("#txta").val())
		if (!$("#material").val() || !$("#formato").val()) {
			return !1
		}
		var pesoVal = 0, unidade = "g";

		pesoVal = peso($("#material").val(), $("#formato").val(), toNumber($("#txta").val()), toNumber($("#txtb").val()), toNumber($("#txtc").val()), toNumber($("#txtd").val()));

		// console.log(pesoVal)

		if (pesoVal > 0) {
			unidade = "kg";
			if (pesoVal >= 1000) {
				pesoVal /= 1000;
				unidade = "t"
			}
			$("#resultado").val(Math.round(pesoVal * 1000) / 1000 + unidade)
		} else {
			$("#resultado").val("")
		}
	})
	var cart = JSON.parse(localStorage.getItem('cart')) || [];
	$(document).on('click', '#addToCart', function () {
		var activeBtn = $('.activeCalc');
		var activeFormat = $('.buttonActive');

		var activeBtnText = activeBtn.text();
		var activeFormatText = activeFormat.text().trim();

		var labela = $('#txta').attr('placeholder');
		var labelb = $('#txtb').attr('placeholder');
		var labelc = $('#txtc').attr('placeholder');
		var labeld = $('#txtd').attr('placeholder');
		var labelResult = $('label[for="resultado"]').text();

		var txta = $('#txta').val();
		var txtb = $('#txtb').val();
		var txtc = $('#txtc').val();
		var txtd = $('#txtd').val();
		var resultado = $('#resultado').val();

		var cart = JSON.parse(localStorage.getItem('cart')) || [];

		var lastCartId = parseInt(localStorage.getItem('lastCartId')) || 0;
		var cartId = lastCartId + 1;
		localStorage.setItem('lastCartId', cartId);

		var product = {
			cartId: cartId,
			material: activeBtnText,
			formato: activeFormatText,
			medidas: {
				txta: { label: labela, value: txta },
				txtb: { label: labelb, value: txtb },
				txtc: { label: labelc, value: txtc },
				txtd: { label: labeld, value: txtd },
				resultado: { label: labelResult, value: resultado }
			},
			quantidade: 1
		};

		var found = false;

		for (var i = 0; i < cart.length; i++) {
			if (
				cart[i].material === product.material &&
				cart[i].formato === product.formato &&
				cart[i].medidas.txta.value === product.medidas.txta.value &&
				cart[i].medidas.txtb.value === product.medidas.txtb.value &&
				cart[i].medidas.txtc.value === product.medidas.txtc.value &&
				cart[i].medidas.txtd.value === product.medidas.txtd.value &&
				cart[i].medidas.resultado.value === product.medidas.resultado.value
			) {
				cart[i].quantidade += 1;
				found = true;
				break;
			}
		}

		if (!found) {
			cart.push(product);
		}

		localStorage.setItem('cart', JSON.stringify(cart));

		addToCart(cart);

		$('.modal-cart').removeClass('hidden').addClass('flex');
	});


	function addToCart(cartObject) {
		$.ajax({
			url: wpurl.admin_url,
			type: 'POST',
			data: {
				action: 'enviar_carrinho',
				cart: JSON.stringify(cartObject)
			},
			success: function (response) {
				$('#cartSession').html(response);
			},
			error: function (xhr, status, error) {
				console.error('Erro ao enviar o carrinho:', status, error);
			}
		});
	}

	$(document).on('click', '#closeCart', function () {
		$('.modal-cart').removeClass('flex').addClass('hidden')
	})
	$(document).on('click', '.closeModal', function () {
		$('.modal-cart').removeClass('flex').addClass('hidden')
	})
	$(document).on('click', '.modal-cart', function (e) {
		if ($(e.target).is('.modal-cart')) {
			$('.modal-cart').removeClass('flex').addClass('hidden');
		}
	});
	$(document).on('click', '.openModal', function () {
		$('.modal-cart').removeClass('hidden').addClass('flex');
		addToCart(JSON.parse(localStorage.getItem('cart')))
	})
	if (cart != '') {
		$('#cartIcon').html('<div class="fixed z-50 right-10 bottom-10 rounded-full p-3 openModal cursor-pointer shadow-btn bg-white transition-all duration-500 hover:bg-casadoaco-orange"><img src="/wp-content/themes/casadoaco-theme/resources/images/cart.png" class="w-6"></div>')
	}
	$(document).on('click', '.increase-qty', function () {
		var input = $(this).siblings('#qtd');
		var currentVal = parseInt(input.text());
		var newVal = currentVal + 1;
		input.text(newVal);

		var cartId = $(this).data('cartid');
		updateLocalStorage(cartId, newVal);
	});

	$(document).on('click', '.decrease-qty', function () {
		var input = $(this).siblings('#qtd');
		var currentVal = parseInt(input.text());
		if (currentVal > 1) {
			var newVal = currentVal - 1;
			input.text(newVal);

			var cartId = $(this).data('cartid');
			updateLocalStorage(cartId, newVal);
		}
	});

	function updateLocalStorage(cartId, novaQuantidade) {
		let cart = JSON.parse(localStorage.getItem('cart')) || [];
		cart = cart.map(produto => {
			if (produto.cartId === cartId) {
				produto.quantidade = novaQuantidade;
			}
			return produto;
		});
		localStorage.setItem('cart', JSON.stringify(cart));
	}
	function removeFromLocalStorage(cartId) {
		let cart = JSON.parse(localStorage.getItem('cart')) || [];
		cart = cart.filter(produto => produto.cartId !== cartId);
		localStorage.setItem('cart', JSON.stringify(cart));
		addToCart(cart)
	}

	$(document).on('click', '#removeItem', function () {
		const cartId = $(this).data('cartid');
		removeFromLocalStorage(cartId);

		$(this).closest('.product-item').remove();
	});

	let envioEscolhido = '';
	$('.next-step').on('click', function () {
		envioEscolhido = $('input[name="envio"]:checked').val();

		console.log('Envio escolhido:', envioEscolhido);

		const $contato = $('#contato');

		if (envioEscolhido === 'email') {
			$contato.attr('placeholder', 'Digite seu e-mail');
			$contato.attr('type', 'email');
			$contato.unmask(); // remove qualquer máscara
		} else {
			$contato.attr('placeholder', 'Digite seu WhatsApp');
			$contato.attr('type', 'text');
			$contato.mask('(00) 00000-0000');
		}

		// Esconde o step1 e mostra o step2
		$('.step1').hide();
		$('.step2').show();
	});

	// Máscara para o CNPJ
	$('#cnpj').mask('00.000.000/0000-00');

	$('.enviar-proposta').on('click', function () {
		const envioEscolhido = $('input[name="envio"]:checked').val();
		const nome = $('#nome').val();
		const empresa = $('#empresa').val();
		const cnpj = $('#cnpj').val();
		const contato = $('#contato').val();
		const cart = JSON.parse(localStorage.getItem('cart')) || [];

		const dados = {
			action: 'enviar_proposta',
			envio: envioEscolhido,
			nome: nome,
			empresa: empresa,
			cnpj: cnpj,
			contato: contato,
			cart: cart
		};

		// Swal de loading
		Swal.fire({
			title: 'Enviando...',
			text: 'Por favor, aguarde.',
			allowOutsideClick: false,
			allowEscapeKey: false,
			didOpen: () => {
				Swal.showLoading();
			}
		});

		$.ajax({
			url: wpurl.admin_url,
			method: 'POST',
			data: dados,
			success: function (response) {
				Swal.fire({
					icon: 'success',
					title: 'Proposta enviada!',
					text: 'Obrigado por entrar em contato.',
					confirmButtonColor: '#f97316'
				});

				console.log(response);

				localStorage.removeItem('cart');
				$('.step1').hide();
				$('.step2').hide();
				$('.product-table').hide();
				$('.product-table').hide();
				$('.header-title').hide();
				$('.step3').removeClass('hidden').show();
			},
			error: function (err) {
				Swal.fire({
					icon: 'error',
					title: 'Erro!',
					text: 'Não foi possível enviar a proposta. Tente novamente.',
					confirmButtonColor: '#f97316'
				});
				console.error(err);
			}
		});
	});
	function isMobile() {
        return window.innerWidth <= 768;
    }

    $(document).on('click', '.cat-calc-btn' , function() {
        if (isMobile()) {
            $('html, body').animate({
                scrollTop: $('#calcOptions').offset().top - 50
            }, 600);
        }
    });

    $(document).on('click', '.formato-btn', function() {
        if (isMobile()) {
            // Scroll suave até a seção "Medidas"
            $('html, body').animate({
                scrollTop: $('#optionsFields').offset().top - 50
            }, 600);
        }
    });

});