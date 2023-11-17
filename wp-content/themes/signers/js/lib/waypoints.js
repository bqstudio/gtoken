jQuery.noConflict();
jQuery(document).ready(function($){

function buildwaypoints() {
    $('[data-waypoint]').each(function () {
        let options = {  
            threshold: 0,
            rootMargin: '-' + ( $(this).data('waypoint') ? $(this).data('waypoint') : .25 ) * 100 + '% 0px'
        } 
        if ( this.waypointObserver ) this.waypointObserver.disconnect();
        this.waypointObserver = new IntersectionObserver((entries, observer) => {
            let element = entries[0].target;
            if (entries[0].isIntersecting) {
                $( element ).addClass('in').removeAttr('data-waypoint');
                if ( $(element).data('function') ) {
                    window[ $(element).data('function') ]();
                }
                element.waypointObserver.disconnect();
            }
        }, options);
        this.waypointObserver.observe( $(this)[0] );
    });
}

$(window).on('resize',function () {
    buildwaypoints();
});

jQuery('[data-in]').each(function () {
   let t = this; 
    setTimeout(() => {
        jQuery(t).addClass('in');
        if ( jQuery(t).data('function') ) {
            window[ $(t).data('function') ]();
        }
    }, jQuery(this).data('in'));
});

var CSSloadcheck = setInterval(function () {
    if ( $('html').css('box-sizing') == 'border-box') {
        buildwaypoints();      
        clearInterval(CSSloadcheck);  
    }
}, 100);

});