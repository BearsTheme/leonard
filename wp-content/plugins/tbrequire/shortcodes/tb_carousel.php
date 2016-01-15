<?php
vc_map(
    array(
        "name" => __("TB Carousel", TB_NAME),
        "base" => "tb_carousel",
        "class" => "vc-tb-carousel",
        "category" => __("ThemeBears Shortcodes", TB_NAME),
        "params" => array(
            array(
                "type" => "loop",
                "heading" => __("Source",TB_NAME),
                "param_name" => "source",
                'settings' => array(
                    'size' => array('hidden' => 0, 'value' => 10),
                    'order_by' => array('value' => 'date')
                ),
                "group" => __("Source Settings", TB_NAME),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("XSmall Devices",TB_NAME),
                "param_name" => "xsmall_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Small Devices",TB_NAME),
                "param_name" => "small_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 2,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Medium Devices",TB_NAME),
                "param_name" => "medium_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 3,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Large Devices",TB_NAME),
                "param_name" => "large_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 4,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __("Margin Items",TB_NAME),
                "param_name" => "margin",
                "value" => "10",
                "description" => __("",TB_NAME),
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Loop Items",TB_NAME),
                "param_name" => "loop",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Mouse Drag",TB_NAME),
                "param_name" => "mousedrag",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Touch Drag",TB_NAME),
                "param_name" => "touchdrag",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Show Nav",TB_NAME),
                "param_name" => "nav",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Show Dots",TB_NAME),
                "param_name" => "dots",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Center",TB_NAME),
                "param_name" => "center",
                "value" => array(
                    "False" => 0,
                    "True" => 1
                ),
                'std' => 0,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Auto Play",TB_NAME),
                "param_name" => "autoplay",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __("Auto Play TimeOut",TB_NAME),
                "param_name" => "autoplaytimeout",
                "value" => "5000",
                "dependency" => array(
                    "element"=>"autoplay",
                    "value" => 1
                ),
                "description" => __("",TB_NAME),
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __("Smart Speed",TB_NAME),
                "param_name" => "smartspeed",
                "value" => "1000",
                "description" => __("Speed scroll of each item",TB_NAME),
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Pause On Hover",TB_NAME),
                "param_name" => "autoplayhoverpause",
                "dependency" => array(
                    "element"=>"autoplay",
                    "value" => 1
                ),
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Left Arrow', TB_NAME ),
                'param_name' => 'left_arrow',
                'value' => 'fa fa-arrow-left',
                'settings' => array(
                    'emptyIcon' => 0, // default 1, display an "EMPTY" icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Right Arrow', TB_NAME ),
                'param_name' => 'right_arrow',
                'value' => 'fa fa-arrow-right',
                'settings' => array(
                    'emptyIcon' => 0, // default 1, display an "EMPTY" icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Filter", TB_NAME),
                "param_name" => "filter",
                "value" => array(
                    "Disable" => "false",
                    "Enable" => "true"
                ),
                'std' => "false",
                'description' => __('The filter don\'t work with Loop.', TB_NAME),
                "group" => __("Carousel Settings", TB_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra Class",TB_NAME),
                "param_name" => "class",
                "value" => "",
                "description" => __("",TB_NAME),
                "group" => __("Template", TB_NAME)
            ),
            array(
                "type" => "tb_template",
                "param_name" => "tb_template",
                "shortcode" => "tb_carousel",
                "admin_label" => true,
                "heading" => __("Shortcode Template",TB_NAME),
                "group" => __("Template", TB_NAME),
            )
        )
    )
);
global $tb_carousel;
$tb_carousel = array();
class WPBakeryShortCode_tb_carousel extends TbShortcode{
    protected function content($atts, $content = null){
        //default value
        $atts_extra = shortcode_atts(array(
            'xsmall_items' => 1,
            'small_items' => 2,
            'medium_items' => 3,
            'large_items' => 4,
            'margin' => 0,
            'loop' => 1,
            'mousedrag' => 1,
            'touchdrag' => 1,
            'nav' => 1,
            'dots' => 1,
            'center' => 0,
            'autoplay' => 1,
            'autoplaytimeout' => '5000',
            'smartspeed' => '250',
            'autoplayhoverpause' => 1,
            'left_arrow' => 'fa fa-arrow-left',
            'right_arrow' => 'fa fa-arrow-right',
            'filter' => "false",
            'class' => '',
        ), $atts);
        global $tb_carousel;
        $atts = array_merge($atts_extra,$atts);
        wp_enqueue_style('owl-carousel',TB_CSS.'owl.carousel.css','','2.0.0b','all');
        wp_enqueue_script('owl-carousel',TB_JS.'owl.carousel.js',array('jquery'),'2.0.0b', true);
        wp_enqueue_script('owl-autoplay',TB_JS.'owl.autoplay.js',array('jquery'),'2.0.0b', true);
        wp_enqueue_script('owl-navigation',TB_JS.'owl.navigation.js',array('jquery'),'2.0.0b', true);
        wp_enqueue_script('owl-animate',TB_JS.'owl.animate.js',array('jquery'),'2.0.0b', true);

        wp_enqueue_script('owl-carousel-tb',TB_JS.'owl.carousel.tb.js',array('jquery'),'1.0.0', true);

        $source = $atts['source'];
        list($args, $posts) = vc_build_loop_query($source);
        $atts['posts'] = $posts;
        $html_id = tbHtmlID('tb-carousel');
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout']) ? (int)$atts['autoplaytimeout'] : 5000;
        $atts['smartspeed'] = isset($atts['smartspeed']) ? (int)$atts['smartspeed'] : 250;
        $left_arrow = isset($atts['left_arrow'])?$atts['left_arrow']:'fa fa-arrow-left';
        $right_arrow = isset($atts['right_arrow'])?$atts['right_arrow']:'fa fa-arrow-right';

        $tb_carousel[$html_id] = array(
            'margin' => (int)$atts['margin'],
            'autoHeight' => false,
            'loop' => $atts['loop'] == 1 ? true : false,
            'mouseDrag' => $atts['mousedrag'] == 1 ? true : false,
            'touchDrag' => $atts['touchdrag'] == 1 ? true : false,
            'nav' => $atts['nav'] == 1 ? true : false,
            'dots' => $atts['dots'] == 1 ? true : false,
            'center' => $atts['center'] == 1 ? true : false,
            'autoplay' => $atts['autoplay'] == 1 ? true : false,
            'autoplayTimeout' => $atts['autoplaytimeout'],
            'smartSpeed' => $atts['smartspeed'],
            'autoplayHoverPause' => $atts['autoplayhoverpause'] == 1 ? true : false,
            'navText' => array('<i class="'.$left_arrow.'"></i>','<i class="'.$right_arrow.'"></i>'),
            'dotscontainer' => $html_id.' .tb-dots',
            'items' => (int)$atts['large_items'],
            'responsive' => array(
                0 => array(
                    "items" => (int)$atts['xsmall_items'],
                ),
                768 => array(
                    "items" => (int)$atts['small_items'],
                ),
                992 => array(
                    "items" => (int)$atts['medium_items'],
                ),
                1200 => array(
                    "items" => (int)$atts['large_items'],
                )
            )
        );
        wp_localize_script('owl-carousel-tb', "tbcarousel", $tb_carousel);
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' '. $atts['class'];
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>