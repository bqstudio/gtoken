jQuery.noConflict();
jQuery(document).ready(function ($) {

	/*
	$('a[href^="#"]').on('click', function(e){
		e.preventDefault();
		const el = $($(this).attr('href'));
		el.length && $('html, body').animate({ scrollTop: el.offset().top - 90}, 500);
		return false;
	});
	*/

	$('body').on('click', 'select', (e) => {
		$(e.target).toggleClass('active');
	});

	$('body').on('blur', 'select', (e) => {
		$(e.target).removeClass('active');
	});

	$(".js-go-top").on('click', function () {
		$([document.documentElement, document.body]).animate({
			scrollTop: ($("body").offset().top)
		}, 400);
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 50) {
			$('body').addClass('scrolled');
		} else {
			$('body').removeClass('scrolled');
		}
	});

	$('.block-tabs .tabs li').click(function (e) {

		if ($('.block-tabs .tabs-content-in').css('position') == 'sticky') {
			e.stopPropagation();
			//get the li position relative to it siblings
			i = $(this).index('.block-tabs .tabs li');
			//scroll to the position of that tab
			st = $('.tabs-content-out').position().top + i * 1000 + 100;
			$('html, body').animate({ scrollTop: st + 'px' }, 0);
		}
	});

	$('.js-tab').click(function (e) {
		e.stopPropagation();

		$(this).attr('aria-selected', 'true').parent().siblings().find('button').attr('aria-selected', 'false');

		$(this).parent().addClass('active').siblings().removeClass('active');

		let id = $(this).attr('aria-controls');
		$('#' + id).attr('aria-hidden', 'false').siblings().attr('aria-hidden', 'true');

		$('.block-tabs .tabs-content .content.animate').removeClass('animate');
		setTimeout(function () {
			$('.block-tabs .tabs-content .content[aria-hidden="false"]').addClass('animate');
		});
	});

	$('.responsive__btn').click(() => {
		$('body').toggleClass('menuopen');
	});

	$('.with-submenu .site-menu__first-level').click(function (e) {
		if ($(window).width() < 1051) {
			e.preventDefault();

			p = $(this).closest('.with-submenu');

			if ($('.submenu', p).attr('aria-hidden') == 'false') {

				$('.submenu', p).attr('aria-hidden', 'true');
				$(this).attr('aria-selected', 'true');
			} else {
				$('.submenu', p).attr('aria-hidden', 'false');
				$(this).attr('aria-selected', 'false');

			}

		}
	});

	$(window).scroll(() => {

		if ($('.block-tabs .tabs-content-in').css('position') == 'sticky') {
			currentScroll = $('.tabs-content-out').position().top - $(window).scrollTop();
			if (currentScroll < 0) {

				currentitem = Math.floor(currentScroll / 1000) * -1 - 1;

				//only activate de button if is not selected
				if ($('.tabs li:eq(' + currentitem + ') button').attr('aria-selected') !== 'true')
					$('.tabs li:eq(' + currentitem + ') button').click();
			}
		}

	});

	jQuery('.ginput_container_select select').change(function () {
		jQuery('.ginput_container_select select option:eq(0)').attr('disabled', 'disabled');
	});


	jQuery('.with-submenu .site-menu__first-level').on('click', function (e) {
		e.preventDefault();
		jQuery('.site-menu__item.hover').not(jQuery(this).parent()).removeClass('hover');
		jQuery(this).parent().toggleClass('hover');
	})

	jQuery('body').on('click', function (e) {
		if (jQuery(e.target).closest('.site-menu').length == 0) {
			jQuery('.site-menu__item.hover').removeClass('hover');
		}
	})


	//swiper
	if (document.querySelector('.slider-partners')) {
		const opciones = {
			loop: false,
			autoplay: {
				delay: 4000
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
				type: "bullets",
				disableOnInteraction: false,
				dynamicBullets: false
			},

			slidesPerView: 1,
			loopedSlides: 1,

			breakpoints: {
				480: {
					slidesPerView: 2,
					loopedSlides: 2
				},
				900: {
					slidesPerView: 6,
					loopedSlides: 2
				}
			}
		}
		new Swiper('.slider-partners', opciones);
	}
	
	/* Move gravity form script after meta charset tag to fix html validation error */
	scriptContents = `var gform;gform||(document.addEventListener("gform_main_scripts_loaded",function()`;
	const script = jQuery("script:contains(" + scriptContents + ")");
	metaCharset = jQuery('head meta[charset="UTF-8"]');
	metaCharset.first().after(script);

});

const tabssection = () => {
	setTimeout(() => {
		jQuery('.tabs-content .content:eq(0)').addClass('animate');
	}, 200);

}

jQuery(document).bind('gform_post_render', function () {
	jQuery('.ginput_container_select select option:eq(0)').attr('disabled', 'disabled');
});

jQuery('.site-menu__first-level').on('click', () => {
	jQuery('body').removeClass('menuopen');
});

window.tabssection = tabssection;