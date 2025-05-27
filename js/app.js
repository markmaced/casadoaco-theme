/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/editor-style.css":
/*!****************************************!*\
  !*** ./resources/css/editor-style.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

jQuery(document).ready(function ($) {
  var swiper = new Swiper('.swiper', {
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
  var swiperProducts = new Swiper('.swiper-products', {
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
    var $counter = $(counter);
    var target = parseInt($counter.attr("data-target"));
    var count = 0;
    var increment = Math.ceil(target / 100);
    var interval = setInterval(function () {
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
      var $this = $(this);
      var offsetTop = $this.offset().top;
      var windowHeight = $(window).height();
      var scrollTop = $(window).scrollTop();
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
    $('#mobileMenu').removeClass('-right-100').addClass('right-0');
  });
  $('#closeMenu').on('click', function () {
    $('#mobileMenu').removeClass('right-0').addClass('-right-100');
  });
  if (wpurl.isPage == 'cda') {
    var $header = $('header');
    var triggerPoint = 350; // pixels para exibir o header

    $header.hide();
    var isVisible = false;
    $(window).on('scroll', function () {
      var scrollTop = $(this).scrollTop();
      if (scrollTop > triggerPoint) {
        if (!isVisible) {
          isVisible = true;
          $header.stop(true, true).css({
            display: 'flex',
            opacity: 0,
            transform: 'translateY(-20px)'
          }).animate({
            opacity: 1
          }, {
            duration: 400,
            step: function step(now, fx) {
              $(this).css('transform', "translateY(".concat((1 - now) * -20, "px)"));
            }
          });
        }
      } else {
        if (isVisible) {
          isVisible = false;
          $header.stop(true, true).animate({
            opacity: 0
          }, {
            duration: 400,
            step: function step(now, fx) {
              $(this).css('transform', "translateY(".concat((1 - now) * -20, "px)"));
            },
            complete: function complete() {
              $(this).hide();
            }
          });
        }
      }
    });

    // Executa uma verificação no carregamento da página
    $(window).trigger('scroll');
  }
  var currentPath = window.location.pathname;
  $('.menu-item a').each(function () {
    var linkPath = $(this).attr('href');

    // Verifica se a URL atual começa com o caminho do link
    if (currentPath === linkPath || linkPath !== '/' && currentPath.startsWith(linkPath)) {
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
    $('.row-table-style').removeClass('row-active');
    $(this).addClass('row-active');
  });
  function filtrarProdutos() {
    var paged = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
    var form = $('#filtro-produtos');
    var formData = form.serializeArray();
    formData.push({
      name: 'action',
      value: 'filtrar_produtos_ajax'
    });
    formData.push({
      name: 'paged',
      value: paged
    });
    $.ajax({
      url: wpurl.admin_url,
      method: 'POST',
      data: formData,
      beforeSend: function beforeSend() {
        $('#resultProducts').html('<p>Carregando...</p>');
      },
      success: function success(response) {
        $('#resultProducts').html(response);
      },
      error: function error() {
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
    var paged = $(this).data('paged');
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
    var termId = $(this).data('calc-id');
    $('.cat-calc-btn').removeClass('activeCalc');
    $(this).addClass('activeCalc');
    limpaTxt();
    var idValue = $(this).attr('id');
    $('#material').val(idValue);
    $.ajax({
      url: wpurl.admin_url,
      type: 'POST',
      data: {
        action: 'filtrar_calculadoras',
        categoria_id: termId
      },
      beforeSend: function beforeSend() {
        $('#calcOptions').html('<p>Carregando...</p>');
      },
      success: function success(response) {
        $('#calcOptions').html(response);
      },
      error: function error() {
        $('#calcOptions').html('<p>Erro ao carregar calculadoras.</p>');
      }
    });
  });
  $('.cat-calc-btn').eq(0).trigger('click');
  $(document).on('click', '[data-option-id]', function () {
    var postId = $(this).data('option-id');
    $('[data-option-id]').removeClass('buttonActive');
    $(this).addClass('buttonActive');
    var idValue = $(this).attr('id');
    $('#formato').val(idValue);
    $.ajax({
      url: wpurl.admin_url,
      type: 'POST',
      data: {
        action: 'carregar_campos_calculadora',
        post_id: postId
      },
      beforeSend: function beforeSend() {
        $('#optionsFields').html('<p>Carregando campos...</p>');
      },
      success: function success(response) {
        $('#optionsFields').html(response);
      },
      error: function error() {
        $('#optionsFields').html('<p>Erro ao carregar os campos.</p>');
      }
    });
  });
  function volume(formato, a, b, c, d) {
    if (a) {
      a = a * 1;
    }
    if (b) {
      b = b * 1;
    }
    if (c) {
      c = c * 1;
    }
    if (d) {
      d = d * 1;
    }
    switch (formato) {
      case "barra-quadrada":
        return a * a / 1000;
      case "barra-retangular":
        return a * b / 1000;
      case "barra-chata":
        return a * b / 1000;
      case "bobina":
        return a * b / 1000;
      case "chapa":
        return a * b * c / 1000000;
      case "chapa-xadrez":
        return a * b * c / 1000000 * 1.1;
      case "tarugo":
        if (a) {
          return (a + 1.58) * (a + 1.58) * 0.7854 / 2000;
        } else {
          return 0;
        }
      case "barra-redonda":
        return a * a * 0.7854 / 1000;
      case "barra-sextavada":
        return a * a * 0.866 / 1000;
      case "bucha":
        a = (a + 1.58) * (a + 1.58);
        b = (b - 1.58) * (b - 1.58);
        return (a - b) * 0.003534;
      case "tubo-redondo":
      case "tubo-schedule":
      case "tubo-refrigeracao":
        return (b - a) * a * 3.1416 / 1000;
      case "tubo-quadrado":
        return (2 * b - 2 * a) * 2 * a / 1000;
      case "tubo-retangular":
        return (b + c - 2 * a) * 2 * a / 1000;
      case "perfil-l":
      case "perfil-t":
        return (2 * b * a - a * a) / 1000;
      case "perfil-u":
        return (3 * b * a - 2 * a * a) / 1000;
      case "perfil-u-abas-desiguais":
        return (b + c + d) * a / 1000;
      case "vergalhao-quadrado":
        return a * a / 1000;
      case "vergalhao-redondo":
        return a * a * 0.7854 / 1000;
      case "vergalhao-sextavado":
        return a * a * 0.866 / 1000;
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
      peso = vol;
    } else {
      peso = vol * materiais[material];
    }
    console.log("vol " + vol);
    console.log("Peso " + peso);
    return peso;
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
    $("#resultado").val("");
  }
  $(document).on('keyup', 'input', function () {
    $(this).change();
  });
  $(document).on('change', 'input', function () {
    // console.log($("#txta").val())
    if (!$("#material").val() || !$("#formato").val()) {
      return !1;
    }
    var pesoVal = 0,
      unidade = "g";
    pesoVal = peso($("#material").val(), $("#formato").val(), toNumber($("#txta").val()), toNumber($("#txtb").val()), toNumber($("#txtc").val()), toNumber($("#txtd").val()));

    // console.log(pesoVal)

    if (pesoVal > 0) {
      unidade = "kg";
      if (pesoVal >= 1000) {
        pesoVal /= 1000;
        unidade = "t";
      }
      $("#resultado").val(Math.round(pesoVal * 1000) / 1000 + unidade);
    } else {
      $("#resultado").val("");
    }
  });
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
        txta: {
          label: labela,
          value: txta
        },
        txtb: {
          label: labelb,
          value: txtb
        },
        txtc: {
          label: labelc,
          value: txtc
        },
        txtd: {
          label: labeld,
          value: txtd
        },
        resultado: {
          label: labelResult,
          value: resultado
        }
      },
      quantidade: 1
    };
    var found = false;
    for (var i = 0; i < cart.length; i++) {
      if (cart[i].material === product.material && cart[i].formato === product.formato && cart[i].medidas.txta.value === product.medidas.txta.value && cart[i].medidas.txtb.value === product.medidas.txtb.value && cart[i].medidas.txtc.value === product.medidas.txtc.value && cart[i].medidas.txtd.value === product.medidas.txtd.value && cart[i].medidas.resultado.value === product.medidas.resultado.value) {
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
      success: function success(response) {
        $('#cartSession').html(response);
        $('#cartIcon').html('<div class="fixed z-50 right-10 bottom-10 rounded-full p-4 openModal cursor-pointer shadow-btn bg-casadoaco-orange transition-all duration-500 hover:bg-black"><img src="/wp-content/themes/casadoaco-theme/resources/images/cart.png" class="w-7"></div>');
      },
      error: function error(xhr, status, _error) {
        console.error('Erro ao enviar o carrinho:', status, _error);
      }
    });
  }
  $(document).on('click', '#closeCart', function () {
    $('.modal-cart').removeClass('flex').addClass('hidden');
  });
  $(document).on('click', '.closeModal', function () {
    $('.modal-cart').removeClass('flex').addClass('hidden');
  });
  $(document).on('click', '.modal-cart', function (e) {
    if ($(e.target).is('.modal-cart')) {
      $('.modal-cart').removeClass('flex').addClass('hidden');
    }
  });
  $(document).on('click', '.openModal', function () {
    $('.modal-cart').removeClass('hidden').addClass('flex');
    addToCart(JSON.parse(localStorage.getItem('cart')));
  });
  if (cart != '') {
    $('#cartIcon').html('<div class="fixed z-50 right-10 bottom-10 rounded-full p-4 openModal cursor-pointer shadow-btn bg-casadoaco-orange transition-all duration-500 hover:bg-black"><img src="/wp-content/themes/casadoaco-theme/resources/images/cart.png" class="w-7"></div>');
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
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.map(function (produto) {
      if (produto.cartId === cartId) {
        produto.quantidade = novaQuantidade;
      }
      return produto;
    });
    localStorage.setItem('cart', JSON.stringify(cart));
  }
  function removeFromLocalStorage(cartId) {
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(function (produto) {
      return produto.cartId !== cartId;
    });
    localStorage.setItem('cart', JSON.stringify(cart));
    addToCart(cart);
  }
  $(document).on('click', '#removeItem', function () {
    var cartId = $(this).data('cartid');
    removeFromLocalStorage(cartId);
    $(this).closest('.product-item').remove();
  });
  var envioEscolhido = '';
  $('.next-step').on('click', function () {
    envioEscolhido = $('input[name="envio"]:checked').val();
    console.log('Envio escolhido:', envioEscolhido);
    var $contato = $('#contato');
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
  $('.prev-step').on('click', function () {
    $('.step2').hide();
    $('.step1').show();
  });

  // Máscara para o CNPJ
  $('#cnpj').mask('00.000.000/0000-00');
  $('.enviar-proposta').on('click', function () {
    var envioEscolhido = $('input[name="envio"]:checked').val();
    var nome = $('#nome').val();
    var empresa = $('#empresa').val();
    var cnpj = $('#cnpj').val();
    var contato = $('#contato').val();
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    var dados = {
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
      didOpen: function didOpen() {
        Swal.showLoading();
      }
    });
    $.ajax({
      url: wpurl.admin_url,
      method: 'POST',
      data: dados,
      success: function success(response) {
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
      error: function error(err) {
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
  $(document).on('click', '.cat-calc-btn', function () {
    if (isMobile()) {
      $('html, body').animate({
        scrollTop: $('#calcOptions').offset().top - 50
      }, 600);
    }
  });
  $(document).on('click', '.formato-btn', function () {
    if (isMobile()) {
      // Scroll suave até a seção "Medidas"
      $('html, body').animate({
        scrollTop: $('#optionsFields').offset().top - 50
      }, 600);
    }
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0,
/******/ 			"css/editor-style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunktailpress"] = self["webpackChunktailpress"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app","css/editor-style"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/editor-style"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app","css/editor-style"], () => (__webpack_require__("./resources/css/editor-style.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;