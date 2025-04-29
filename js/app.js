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
  var counterStarted = false;
  function isInViewport(element) {
    var rect = element[0].getBoundingClientRect();
    return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
  }
  function startCounter() {
    if (counterStarted) return;
    var $counterBlock = $('.flex.justify-center');
    if (isInViewport($counterBlock)) {
      counterStarted = true;
      $('.counter').each(function () {
        var $this = $(this);
        var countTo = parseInt($this.attr('data-count'));
        if (countTo === 10) {
          $({
            countNum: 0
          }).animate({
            countNum: countTo
          }, {
            duration: 2000,
            easing: 'swing',
            step: function step(now) {
              if (now >= 10) {
                $this.text('10M');
              } else {
                $this.text(Math.floor(now).toLocaleString('pt-BR'));
              }
            },
            complete: function complete() {
              $this.text('10M');
            }
          });
        } else {
          $({
            countNum: 0
          }).animate({
            countNum: countTo
          }, {
            duration: 2000,
            easing: 'swing',
            step: function step(now) {
              $this.text(Math.floor(now).toLocaleString('pt-BR'));
            },
            complete: function complete() {
              $this.text(countTo.toLocaleString('pt-BR'));
            }
          });
        }
      });
    }
  }

  // Dispara ao carregar e ao rolar a página
  $(window).on('scroll resize', startCounter);
  startCounter();
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