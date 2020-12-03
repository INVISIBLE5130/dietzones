"use strict";var $=document.querySelector.bind(document),$$=document.querySelectorAll.bind(document);!function(){var e=$("#menu-open"),t=$("#menu-open-scroll"),a=$("#menu-close"),n=$("#menu-mobile"),r=function(){n.classList.toggle("menu-mobile_active")};e.addEventListener("click",r),t.addEventListener("click",r),a.addEventListener("click",r)}();var handleSliderChange=function(){var e=$("[data-target='carousel']");if(e){var t=$("[data-action='slideLeft']"),a=$("[data-action='slideRight']"),n=e.querySelector("[data-target='card']"),r=$$(".paginatecircle"),l=n.offsetWidth,i=e.offsetWidth,c=n.currentStyle||window.getComputedStyle(n),o=Number(c.marginRight.match(/\d+/g)[0]),d=e.querySelectorAll("[data-target='card']").length,s=0;e.style.transform="translateX("+s+"px)";var u=Math.floor(i/l)<1?1:Math.floor(i/l),v=(d-u)*l*-1;r.forEach(function(t){var a=t.dataset.index;t.addEventListener("click",function(){s=(l+o)*a*-1,e.style.transform="translateX("+s+"px)",r.forEach(function(e){return e.classList.remove("paginatecircle_active")}),t.classList.add("paginatecircle_active")})});var f=function(){s<0&&(s+=l+o,e.style.transform="translateX("+s+"px)")},h=function(){s>=v&&(s-=l+o,e.style.transform="translateX("+s+"px)")};t.addEventListener("click",f),a.addEventListener("click",h)}},handleBlockSliderChange=function(){var e=$("[data-target='block-carousel']");if(e){var t=$("[data-action='block-carousel-prev']"),a=$("[data-action='block-carousel-next']"),n=e.querySelector("[data-target='card']"),r=n.offsetWidth,l=e.offsetWidth,i=n.currentStyle||window.getComputedStyle(n),c=Number(i.marginRight.match(/\d+/g)[0]),o=e.querySelectorAll("[data-target='card']").length,d=0;e.style.transform="translateX("+d+"px)";var s=Math.floor(l/r)<1?1:Math.floor(l/r),u=(o-s)*r*-1,v=function(){d<0&&(d+=r+c,e.style.transform="translateX("+d+"px)")},f=function(){d>=u&&(d-=r+c,e.style.transform="translateX("+d+"px)")};t.addEventListener("click",v),a.addEventListener("click",f)}},prevScrollpos=0,handleScrollBehavior=function(){var e=$("#navbar"),t=window.pageYOffset;t>200&&prevScrollpos>t?e.classList.add("navbar_active"):e.classList.remove("navbar_active"),prevScrollpos=t},ready=function(){handleSliderChange(),handleBlockSliderChange()};document.addEventListener("DOMContentLoaded",ready),window.addEventListener("scroll",handleScrollBehavior),window.addEventListener("resize",handleSliderChange),window.addEventListener("resize",handleBlockSliderChange),AOS.init();

jQuery(function() {
	initMobileNav();
});


// mobile menu init
function initMobileNav() {
	jQuery('body').mobileNav({
		menuActiveClass: 'search-active',
		menuOpener: '.search-opener',
		hideOnClickOutside: true,
		menuDrop: '.form-search'
	});
}


/*
 * Simple Mobile Navigation
 */
;(function($) {
	function MobileNav(options) {
		this.options = $.extend({
			container: null,
			hideOnClickOutside: false,
			menuActiveClass: 'nav-active',
			menuOpener: '.nav-opener',
			menuDrop: '.nav-drop',
			toggleEvent: 'click',
			outsideClickEvent: 'click touchstart pointerdown MSPointerDown'
		}, options);
		this.initStructure();
		this.attachEvents();
	}
	MobileNav.prototype = {
		initStructure: function() {
			this.page = $('html');
			this.container = $(this.options.container);
			this.opener = this.container.find(this.options.menuOpener);
			this.drop = this.container.find(this.options.menuDrop);
		},
		attachEvents: function() {
			var self = this;

			if(activateResizeHandler) {
				activateResizeHandler();
				activateResizeHandler = null;
			}

			this.outsideClickHandler = function(e) {
				if(self.isOpened()) {
					var target = $(e.target);
					if(!target.closest(self.opener).length && !target.closest(self.drop).length) {
						self.hide();
					}
				}
			};

			this.openerClickHandler = function(e) {
				e.preventDefault();
				self.toggle();
			};

			this.opener.on(this.options.toggleEvent, this.openerClickHandler);
		},
		isOpened: function() {
			return this.container.hasClass(this.options.menuActiveClass);
		},
		show: function() {
			this.container.addClass(this.options.menuActiveClass);
			if(this.options.hideOnClickOutside) {
				this.page.on(this.options.outsideClickEvent, this.outsideClickHandler);
			}
		},
		hide: function() {
			this.container.removeClass(this.options.menuActiveClass);
			if(this.options.hideOnClickOutside) {
				this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
			}
		},
		toggle: function() {
			if(this.isOpened()) {
				this.hide();
			} else {
				this.show();
			}
		},
		destroy: function() {
			this.container.removeClass(this.options.menuActiveClass);
			this.opener.off(this.options.toggleEvent, this.clickHandler);
			this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
		}
	};

	var activateResizeHandler = function() {
		var win = $(window),
			doc = $('html'),
			resizeClass = 'resize-active',
			flag, timer;
		var removeClassHandler = function() {
			flag = false;
			doc.removeClass(resizeClass);
		};
		var resizeHandler = function() {
			if(!flag) {
				flag = true;
				doc.addClass(resizeClass);
			}
			clearTimeout(timer);
			timer = setTimeout(removeClassHandler, 500);
		};
		win.on('resize orientationchange', resizeHandler);
	};

	$.fn.mobileNav = function(opt) {
		var args = Array.prototype.slice.call(arguments);
		var method = args[0];

		return this.each(function() {
			var $container = jQuery(this);
			var instance = $container.data('MobileNav');

			if (typeof opt === 'object' || typeof opt === 'undefined') {
				$container.data('MobileNav', new MobileNav($.extend({
					container: this
				}, opt)));
			} else if (typeof method === 'string' && instance) {
				if (typeof instance[method] === 'function') {
					args.shift();
					instance[method].apply(instance, args);
				}
			}
		});
	};
}(jQuery));

document.querySelectorAll('.navbar__search').forEach(item => {
	item.addEventListener('click', () => {
		window.scrollTo(0,0)
	})
})

document.querySelector('.main__search-input').focus()

document.querySelectorAll('.desktop__search').forEach(item => item.addEventListener('click', () => {
	document.querySelector('.main__search-out').classList.toggle('main__search-in')
	document.querySelector('.main__search-input').focus()
}))

document.querySelector('.main__search-close').addEventListener('click', () => {
	document.querySelector('.main__search-out').classList.remove('main__search-in')
})

document.querySelector('.menu-mobile__search').addEventListener('click', () => {
	document.querySelector('.menu-mobile__search-out').classList.toggle('menu-mobile__search-in')
	document.querySelector('.menu-mobile__search-input').focus()
})

document.querySelector('.menu-mobile__search-close').addEventListener('click', () => {
	document.querySelector('.menu-mobile__search-out').classList.remove('menu-mobile__search-in')
})