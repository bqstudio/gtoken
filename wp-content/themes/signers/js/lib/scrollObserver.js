jQuery.noConflict();

function isScrolledIntoView(ele) {
    //console.log(ele);
    
    let offset = ele.getBoundingClientRect()

    var lBound = window.scrollY,
        uBound = lBound + window.innerHeight,
        top = offset.top,
        bottom = top + offset.height;

    return (top > lBound && top < uBound)
        || (bottom > lBound && bottom < uBound)
        || (lBound >= top && lBound <= bottom)
        || (uBound >= top && uBound <= bottom);
}

jQuery(document).ready(function($){

    $(window).scroll(() => {
        $('[data-scroll-observe]').each(function () {
            if (isScrolledIntoView(this)) return
            let offset = this.getBoundingClientRect()
            let elementMiddle = offset.top + offset.height / 2 + window.scrollY

            let elementDistance = window.scrollY + window.innerHeight / 2 - elementMiddle

            //console.log( 'min', min )
            if ( $(this).data('min') != null && elementDistance < $(this).data('min') ) {
                elementDistance = $(this).data('data-scroll-observe-min')
            }
            if ( $(this).data('max') != null && elementDistance > $(this).data('max') ) {
                elementDistance = $(this).data('data-scroll-observe-max')
            }

            $(this).css('--elementDistance', elementDistance)
        })
    });

});