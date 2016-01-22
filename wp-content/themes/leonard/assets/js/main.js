jQuery(document).ready(function($) {
	"use strict";
	
	/* window */
	var window_width, window_height, scroll_top;
	
	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;
	
	/* header menu */
	var header = $('#tb-header');
	var header_top = 0;
	
	/* scroll status */
	var scroll_status = '';
	
	/**
	 * window load event.
	 * 
	 * Bind an event handler to the "load" JavaScript event.
	 * @author Themebears
	 */
	$(window).load(function() {
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/** current window width */
		window_width = $(window).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;
		
		/* get top header menu */
        header_top = $('#tb-header .tb-header-bottom-wrap').offset().top;
		/* check sticky menu. */
		if(TBOptions.menu_sticky == '1'){
			tb_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		tb_mobile_menu();
		
		/* check back to top */
		if(TBOptions.back_to_top == '1'){
			/* add html. */
			$('body').append('<div id="back_to_top" class="back_to_top"><span class="go_up"><i style="" class="fa fa-arrow-up"></i></span></div><!-- #back-to-top -->');
			tb_back_to_top();
		}
		
		/* page loading. */
		tb_page_loading();
		
		/* check video size */
		tb_auto_video_width();
	});

	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ tb_page_loading(1); }
	
	/**
	 * resize event.
	 * 
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * @author Themebears
	 */
	$(window).resize(function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/* check sticky menu. */
		if(TBOptions.menu_sticky == '1'){
			tb_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		tb_mobile_menu();
		
		/* check video size */
		tb_auto_video_width();
	});
	
	/**
	 * scroll event.
	 * 
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * @author Themebears
	 */
	var lastScrollTop = 0;
	
	$(window).scroll(function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		/** check scroll up or down. */
		if(scroll_top < lastScrollTop) {
			/* scroll up. */
			scroll_status = 'up';
		} else {
			/* scroll down. */
			scroll_status = 'down';
		}
		
		lastScrollTop = scroll_top;
		
		/* check sticky menu. */
		if(TBOptions.menu_sticky == '1'){
			tb_stiky_menu();
		}

		/* check back to top */
		tb_back_to_top();
	});

	/**
	 * Stiky menu
	 * 
	 * Show or hide sticky menu.
	 * @author Themebears
	 * @since 1.0.0
	 */
	function tb_stiky_menu() {
		if (header_top < scroll_top) {
			switch (true) {
				case (window_width > 992):
					header.addClass('header-fixed');
					$('body').addClass('fixed-margin-top');
					break;
				case ((window_width <= 992 && window_width >= 768) && (TBOptions.menu_sticky_tablets == '1')):
					header.addClass('header-fixed');
					$('body').addClass('fixed-margin-top');
					break;
				case ((window_width <= 768) && (TBOptions.menu_sticky_mobile == '1')):
					header.addClass('header-fixed');
					$('body').addClass('fixed-margin-top');
					break;
			}
		} else {
			header.removeClass('header-fixed');
			$('body').removeClass('fixed-margin-top');
		}
	}

	
	/**
	 * Mobile menu
	 * 
	 * Show or hide mobile menu.
	 * @author Themebears
	 * @since 1.0.0
	 */
	
	$('body').on('click', '#tb-menu-mobile', function(){
		var navigation = $('#tb-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse');
		} else {
			navigation.removeClass('collapse');
		}
	});
	/* check mobile screen. */
	function tb_mobile_menu() {
		var menu = $('#tb-header-navigation');
		
		/* active mobile menu. */
		switch (true) {
            case (window_width <= 992 && window_width >= 768):
                menu.removeClass('phones-nav').addClass('tablets-nav');
                /* */
                tb_mobile_menu_group(menu);
                break;
            case (window_width <= 768):
                menu.removeClass('tablets-nav').addClass('phones-nav');
                break;
            default:
                menu.removeClass('mobile-nav tablets-nav');
                menu.find('li').removeClass('mobile-group');
                break;
		}	
	}
	/* group sub menu. */
	function tb_mobile_menu_group(nav) {
		nav.each(function(){
			$(this).find('li').each(function(){
				if($(this).find('ul:first').length > 0){
					$(this).addClass('mobile-group');
				}
			});
		});
	}

    /**
     * Tb Menu Fixed Style
     *
     */
    var main_menu_fixed = $('.main-navigation-fixed');
    main_menu_fixed.find('.menu-item-has-children').each(function() {
        $(this).append('<i class="fa btn-menu-open fa-angle-down"></i>');
    });
    $('body').on('click', $('.btn-menu-open', main_menu_fixed), function () {
        var parent = $(this).parent();
        $('> .sub-menu', parent).toggleClass('open');
    });
    /*open menu*/
    $('body').on('click', '#tb-menu-mobile-fixed', function (e) {
        var parent = $(this).parent();
        $('.main-navigation-fixed', parent).addClass('open');
        e.stopPropagation();
        return false;
    });
    /* close menu */
    $('body').on('click', $('.close', main_menu_fixed), function () {
        $('.main-navigation-fixed').removeClass('open');
    });
    $('body').on('click', main_menu_fixed, function (e) {
        //e.stopPropagation();
    });
    $(document).on('click', function () {
        if( main_menu_fixed.hasClass('open') ){
            main_menu_fixed.removeClass('open');
        }
    });
    /**
	 * Auto width video iframe
	 * 
	 * Youtube Vimeo.
	 * @author Themebears
	 */
	function tb_auto_video_width() {
		$('.entry-video iframe').each(function(){
			var v_width = $(this).width();

			v_width = v_width / (16/9);
			$(this).attr('height',v_width + 35);
		})
	}
	
	
	/**
	 * Parallax.
	 * 
	 * @author Themebears
	 * @since 1.0.0
	 */
	var tb_parallax = $('.tb_parallax');
	if(tb_parallax.length > 0 && TBOptions.paralax == '1'){
		tb_parallax.each(function() {
			"use strict";
			var speed = $(this).attr('data-speed');
			
			speed = (speed != undefined && speed != '') ? speed : 0.1 ;
			
			$(this).parallax("50%", speed);
		});
	}
	/**
	 * Header Title Parallax.
	 *
	 * @author John
	 * @since 1.0.0
	 */
	var tb_header_parallax = $('.tb_header_parallax');
	if(tb_header_parallax.length > 0 && TBOptions.page_title_parallax == '1' && TBOptions.paralax == '1'){
        tb_header_parallax.each(function() {
            "use strict";
			$(this).parallax("50%", 0.1);
		});
	}
	
	/**
	 * Page Loading.
	 */
	function tb_page_loading($load) {
		switch ($load) {
		case 1:
			$('#tb-loadding').css('display','block')
			break;
		default:
			$('#tb-loadding').css('display','none')
			break;
		}
	}
	
	/**
	 * Back To Top
	 * 
	 * @author Themebears
	 * @since 1.0.0
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });
    $('body').on('click', '#scroll_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
	/* Show or hide buttom  */
	function tb_back_to_top(){
		/* back to top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}
	
	/* Remove Link Schedule */
	$('body').on('click', '.tt_timetable .event_container > a',function () {
		return false;
	});

    /**
     * Post Like.
     *
     * @author Themebears
     * @since 1.0.0
     */

    $('body').on('click', '.tb-post-like', function () {
        "use strict";
        /* get post id. */
        var bt_like = $(this);

        var post_id = bt_like.attr('data-id');

        if(post_id != undefined && post_id != ''){
            /* add like. */
            $.post(ajaxurl, {
                action : 'tb_post_like',
                id : post_id,
                dataType: "json"
            }, function(response) {
                if(response != ''){
                    bt_like.find('i').attr('class', 'fa fa-heart')
                    bt_like.find('span').html(response);
                }
            });
        }

    });



    $(document).ready(function() {
        /**
         * Fancy Box
         */
        $('.fancybox').each(function() {
            $(this).fancybox({
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });
        });

        /**
         * Slick Slider
         */
        $('.tb-slick').each(function() {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: false,
                dots: false
            });
        });
        /**
         * Custom Carousel
         */
        $('.custom-carousel').each(function(){
            $(this).addClass('owl-carousel owl-theme');
            $(this).owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                dots: false,
                items: 1,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
            });
        });
        /**
         * Add Product Quantity Up Down icon
         */
        $('div.quantity').each(function() {
            $(this).append('<span class="qty-minus"><i class="fa fa-minus"></i></span>');
            $(this).append('<span class="qty-plus"><i class="fa fa-plus"></i></span>');
        });
        /* Plus Qty */
        $(document).on('click', '.qty-plus', function() {
            var parent = $(this).parent();
            $('input.qty', parent).val( parseInt($('input.qty', parent).val()) + 1);
        })
        /* Minus Qty */
        $(document).on('click', '.qty-minus', function() {
            var parent = $(this).parent();
            if( parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val( parseInt($('input.qty', parent).val()) - 1);
            }
        });
		
        /**
         * Logo Custom Parallax
         *
         * @author John
         * @since 1.0.0
         */
        var tb_header_parallax = $('.logo-parallax img');
        if(tb_header_parallax.length > 0 && TBOptions.paralax == '1'){
            tb_header_parallax.each(function() {
                $(this).parallax("50%", 0.1);
            });
        }
        /**
         * Process Bar Counter
         */
        $('.tb-bar-counter').counterUp({
            time: 900
        });

        /**
         * Tb Process Circle Loading
         */
        if (typeof $.fn.waypoint === 'function') {
            $('.tb-counter-process').each(function() {
                var $char = $(this);
                $char.waypoint(function() {
                    $char.tbProcessCircle();
                    $char.unbind('waypoint');
                }, {
                    offset : '100%',
                    triggerOnce : true
                });
            });
        } else {
            $('.tb-counter-process').tbProcessCircle();
        }

    });
    /**
     * Counter Up Digit Process Bar
     * @param options
     * @returns {*}
     */
    $.fn.counterUp = function( options ) {
        // Defaults
        var settings = $.extend({
            'time': 400,
            'delay': 10
        }, options);

        return this.each(function(){

            // Store the object
            var $this = $(this);
            var $settings = settings;

            var counterUpper = function() {
                var nums = [];
                var divisions = $settings.time / $settings.delay;
                var num = $this.text();
                var isComma = /[0-9]+,[0-9]+/.test(num);
                num = num.replace(/,/g, '');
                var isInt = /^[0-9]+$/.test(num);
                var isFloat = /^[0-9]+\.[0-9]+$/.test(num);
                var decimalPlaces = isFloat ? (num.split('.')[1] || []).length : 0;

                // Generate list of incremental numbers to display
                for (var i = divisions; i >= 1; i--) {

                    // Preserve as int if input was int
                    var newNum = parseInt(num / divisions * i);

                    // Preserve float if input was float
                    if (isFloat) {
                        newNum = parseFloat(num / divisions * i).toFixed(decimalPlaces);
                    }

                    // Preserve commas if input had commas
                    if (isComma) {
                        while (/(\d+)(\d{3})/.test(newNum.toString())) {
                            newNum = newNum.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
                        }
                    }

                    nums.unshift(newNum);
                }

                $this.data('counterup-nums', nums);
                $this.text('0');

                // Updates the number until we're done
                var f = function() {
                    $this.text($this.data('counterup-nums').shift());
                    if ($this.data('counterup-nums').length) {
                        setTimeout($this.data('counterup-func'), $settings.delay);
                    } else {
                        delete $this.data('counterup-nums');
                        $this.data('counterup-nums', null);
                        $this.data('counterup-func', null);
                    }
                };
                $this.data('counterup-func', f);

                // Start the count up
                setTimeout($this.data('counterup-func'), $settings.delay);
            };

            // Perform counts when the element gets into view
            $this.waypoint(counterUpper, { offset: '100%', triggerOnce: true });
        });

    };

    /**
     * Tb Process Circle Loading
     * @returns {*}
     */
    $.fn.tbProcessCircle = function() {
        return this.each(function() {
            var $this = $(this),
                percent = $this.data('percent'),
                suffix = $this.data('suffix'),
                start = 0;
                var i = setInterval(function () {
                    if (start <= percent) {
                        var deg = parseInt(start) * 3.6;
                        if (start > 50) {
                            $this.addClass('tb-process-start');
                        }
                        $this.find('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
                        $this.find('.ppc-percents .tb-process-counter').html(start + suffix);
                        start++;
                    } else {
                        clearInterval(i);
                    }
                }, 20);
        });
    };
    
    /**
	 * TB Plugin
	 * Render SVG for leonard theme
	 */
	var leonardSVG = {
		render: function() {
			var $leonard_svg = $( '.leonad-svg' ),
				self = this
			
			/* check element exist */
			if( $leonard_svg.length <= 0 )
				return;

			$leonard_svg.each( function() {
				var $elem = $( this ),
					elemInfo = {
						w: $elem.width(),
						h: $elem.height(),
						type: $elem.data( 'type' ),
						strokeWidth: 1,
						radian: $elem.data( 'radian' ),
						stroke: $elem.data( 'stroke-color' ),
						imageId: $elem.data( 'fill-image-id' ),
						fillColor: $elem.data( 'fill-color' ),
					};

				var svg = document.createElementNS( 'http://www.w3.org/2000/svg', 'svg' );
				
				svg.setAttribute( 'width', elemInfo.w + 2 );

				switch( elemInfo.type ) {
					case 'polygon':
    					svg.setAttribute( 'height', elemInfo.h + 2 );

						var point_str = self.makePointPolygon( elemInfo.w, elemInfo.h, elemInfo.radian ).join( ' ' ),
							polygon = self.makeSVG( 'polygon', {points: point_str, style: 'fill: transparent; stroke: '+elemInfo.stroke+';stroke-width: 0.5px;'} );

						svg.appendChild( polygon );
						break;
					case 'polygon2':
    					svg.setAttribute( 'height', elemInfo.h + 2 );

						var point_str = self.makePointPolygon2( elemInfo.w, elemInfo.h, elemInfo.radian ).join( ' ' ),
							polygon = self.makeSVG( 'polygon', {points: point_str, style: 'fill: '+ elemInfo.fillColor +'; stroke: '+elemInfo.stroke+';stroke-width: 0px;'} );

						svg.appendChild( polygon );
						break;
					case 'extrapolygon':
    					svg.setAttribute( 'height', elemInfo.h + 2 + 16 );

    					var point_str_1 = self.makePointPolygon( elemInfo.w, elemInfo.h, elemInfo.radian ).join( ' ' ),
							polygon_1 = self.makeSVG( 'polygon', {points: point_str_1, style: 'fill: transparent; stroke: '+elemInfo.stroke+';stroke-width: 1px;'} );
						
						var point_2 = self.makePointPolygon( elemInfo.w - 8, elemInfo.h - 8, elemInfo.radian ),
							point_str_2 = point_2.map( self.updatePointInner ).join( ' ' );

						var style = [];
						if( elemInfo.imageId ) style.push( 'fill: url('+ elemInfo.imageId +')' );
						if( elemInfo.fillColor ) style.push( 'fill: '+fillColor+'' );
						
						var polygon_2 = self.makeSVG( 'polygon', {points: point_str_2, style: style.join( ';' ) } );						

						var edge = ( ( elemInfo.w + elemInfo.h ) / 2 ) * elemInfo.radian,
							line_1 = self.makeSVG( 'line', { x1: elemInfo.w + 1, y1: ( elemInfo.h - edge ) + 1, x2: elemInfo.w + 1, y2: ( elemInfo.h - edge ) + 1 + 12, style: 'stroke: '+elemInfo.stroke+';stroke-width: 1', } ),
							line_2 = self.makeSVG( 'line', { x1: elemInfo.w + 1, y1: ( elemInfo.h - edge ) + 1 + 12, x2: ( elemInfo.w / 2 ) + 1, y2: elemInfo.h + 1 + 16, style: 'stroke: '+elemInfo.stroke+';stroke-width: 1', } ),
							line_3 = self.makeSVG( 'line', { x1: ( elemInfo.w / 2 ) + 1, y1: elemInfo.h + 1 + 16, x2: 0 + 1, y2: ( elemInfo.h - edge ) + 1 + 12, style: 'stroke: '+elemInfo.stroke+';stroke-width: 1', } ),
							line_4 = self.makeSVG( 'line', { x1: 0 + 1, y1: ( elemInfo.h - edge ) + 1 + 12, x2: 0 + 1, y2: ( elemInfo.h - edge ) + 1, style: 'stroke: '+elemInfo.stroke+';stroke-width: 1', } );

						svg.appendChild( polygon_1 );
						svg.appendChild( polygon_2 );
						svg.appendChild( line_1 );
						svg.appendChild( line_2 );
						svg.appendChild( line_3 );
						svg.appendChild( line_4 );
						break;
				}

				$elem.append( svg );
			} )
		},
		makePointPolygon: function( w, h, radian ) {
			var points = [],
				edge = ( ( w + h ) / 2 ) * radian;

			points.push( [ ( w / 2 ) + 1, 0 + 1 ] ); 
			points.push( [ w + 1, ( h - ( h - edge ) ) + 1 ] ); 
			points.push( [ w + 1, ( h - edge ) + 1 ] ); 
			points.push( [ ( w / 2 ) + 1, h + 1 ] ); 
			points.push( [ 0 + 1, ( h - edge ) + 1 ] ); 
			points.push( [ 0 + 1, ( h - ( h - edge ) ) + 1 ] ); 

			return points; 
		},
		makePointPolygon2: function( w, h, radian ) {
			var points = [],
				edge = ( ( w + h ) / 2 ) * radian;

			points.push( [ edge + 1, 0 + 1 ] );
			points.push( [ w - edge + 1, 0 + 1 ] );
			points.push( [ w + 1, ( h / 2 ) + 1 ] );
			points.push( [ w - edge + 1, h + 1 ] );
			points.push( [ edge + 1, h + 1 ] );
			points.push( [ 0 + 1, ( h / 2 ) + 1 ] );
			
			return points; 
		},
		updatePointInner: function( obj ) {
			obj[0] = obj[0] + 4;
			obj[1] = obj[1] + 4;

			return obj;
		},
		makeSVG: function( tag, attrs ) {
            var el = document.createElementNS('http://www.w3.org/2000/svg', tag);
            for (var k in attrs)
                el.setAttribute(k, attrs[k]);
            
            return el;
        }
	};
	
	/**
	 * DOM ready
	 */
	$( function() {
		/* call leonardSVG  */
		leonardSVG.render();
	} )
	
	function TbZoomImage() {
		var $window = $(window);
		$("#tb_zoom_image > img").elevateZoom({
			zoomType: "lens",
			responsive: true,
			containLensZoom: true,
			cursor: 'pointer',
			gallery:'tb_gallery_0',
			borderSize: 1,
			borderColour: "#e54e5d",
			galleryActiveClass: "tb-active",
			loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
		});

		$("#tb_zoom_image > img").on("click", function(e) {
			var ez =   $('#tb_zoom_image > img').data('elevateZoom');
				$.fancybox(ez.getGalleryList());
			return false;
		});
	}
	TbZoomImage();
	
	function TbMalihuCustomScrollbar() {
		var $nice_scroll_class_js = $('.nice-scroll-class-js');
		if($nice_scroll_class_js.length > 0){
			$nice_scroll_class_js.each(function(){
				$(this).niceScroll();
			})
		}
	}
	TbMalihuCustomScrollbar();
});