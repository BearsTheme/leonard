(function($) {
    "use strict";

    $(document).ready(function () {
        $('.tb-slick-wrap').find('.tb-testimonial-default').each(function() {
            $('.tb-testimonial-wrap', $(this)).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: true,
                asNavFor: $('.tb-testimonial-nav', $(this))
            });
            $('.tb-testimonial-nav', $(this)).slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: $('.tb-testimonial-wrap', $(this)),
                dots: false,
                arrows: false,
                centerMode: true,
                focusOnSelect: true
            });
        });
    });
}(jQuery));