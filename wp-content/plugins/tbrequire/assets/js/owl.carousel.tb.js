(function ($) {
    "use strict";
    $(document).ready(function () {
        $(".tb-carousel").each(function () {
            var $this = $(this), slide_id = $this.attr('id'), slider_settings = tbcarousel[slide_id];
            $this.addClass('owl-carousel owl-theme');
			var callback = {
				onInitialized: owl_onInitialized
			};
			$.extend( slider_settings, callback );
            var owl = $this.owlCarousel(slider_settings);
        });
    });
	function owl_onInitialized(e){
		var _this = $(e.target);
		console.log(_this);
		var heights = [];
		$('.owl-item',_this).each(function(){					
			heights.push($(this).height());
		})
		var maxheight = Math.max.apply(Math, heights);
		$('.owl-item',_this).height(maxheight);
	}
    $(window).load(function(){
        $('.tb-carousel-filter a').click(function(e){
            e.preventDefault();
            var parent = $(this).closest('.tb-carousel-wrap');
            $('.tb-carousel-filter a').removeClass('active');
            var filter = $(this).data('group');
            $(this).addClass('active');
            tbCarouselFilter( filter, parent );
        });
		/* owlCallback */
		
		jQuery('.tb-carousel').each(function(){
			var _this = $(this);
			var heights = [];
			$('.owl-item',_this).each(function(){					
				heights.push($(this).height());
			})
			var maxheight = Math.max.apply(Math, heights);
			$('.owl-item',_this).height(maxheight);
		})
    });

    /**
     * Carousel Filter
     * @param filter category
     * @param parent
     */
    function tbCarouselFilter( filter, parent ){
        if ( filter == 'all'){
            $('.tb-carousel-filter-hidden .tb-carousel-filter-item', parent).each(function(){
                var owl   = $(".tb-carousel", parent);
                var parentElem      = $(this).parent(),
                    elem = parentElem.html();
                owl.trigger('add.owl.carousel', [elem]).trigger('refresh.owl.carousel');
                parentElem.remove();
            });
        } else {
            $('.tb-carousel-filter-hidden .tb-carousel-filter-item.'+ filter, parent).each(function(){
                var owl = $(".owl-carousel", parent);
                var parentElem      = $(this).parent(),
                    elem = parentElem.html();
                owl.trigger('add.owl.carousel', [elem]).trigger('refresh.owl.carousel');
                parentElem.remove();
            });

            $('.tb-carousel .tb-carousel-filter-item:not(".'+filter+'")', parent)
                .each(function(){
                var owl   = $(".tb-carousel", parent);
                var parentElem = $(this).parent(),
                    targetPos = parentElem.index();
                $( parentElem ).clone().appendTo( $('.tb-carousel-filter-hidden', parent) );
                owl.trigger('remove.owl.carousel', [targetPos]).trigger('refresh.owl.carousel');
            });
        }
    }
})(jQuery);