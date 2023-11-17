jQuery.noConflict();
jQuery(document).ready(function($){
    $('.js-accordion-open').on('click',function(e){
		e.stopPropagation();
		let elem = $(this).parent();
		
		elem.hasClass('js-open') ? 
			elem.removeClass('js-open').find('.js-accordion-open').next().slideUp() : 
			elem.addClass('js-open').find('.js-accordion-open').next().slideDown();

        elem.siblings('.js-open').removeClass('js-open').find('.js-accordion-open').next().slideUp();
	});
    $('.js-open > .js-accordion-open').next().slideDown();
});