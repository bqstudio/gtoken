jQuery.noConflict();
jQuery(document).ready(function($){

    $('.js-open-block').on('click', function(){
        $('[data-block='+$(this).data('block')+']').toggleClass('js-open').parent().toggleClass('js-child-open');
        $(this).toggleClass('js-active');
    });

    $('.js-close-block').on('click', function(){
        $('[data-block='+$(this).data('block')+']').removeClass('js-open').parent().removeClass('js-child-open');
        $(this).removeClass('js-active');
    });

    $('.js-parent-open').on('click', function(){
        $(this).parents('.js-parent').toggleClass('js-open').siblings().removeClass('js-open');
    });
        
    $('.js-open-tab').on('click', function() {
        const block = $('[data-block='+$(this).data('block')+']');
        block.hasClass('js-open') || block.toggleClass('js-open').siblings().removeClass('js-open');
        $(this).toggleClass('js-active').siblings().removeClass('js-active');
        $(this).parent().toggleClass('js-tab-opened');
    });
    
});