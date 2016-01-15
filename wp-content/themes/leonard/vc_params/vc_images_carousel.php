<?php
/**
 * Add custom heading params
 *
 * @author Themebears
 * @since 1.0.0
 */
if (shortcode_exists('vc_images_carousel')) {

    vc_add_param("vc_images_carousel", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Carousel Libraries", 'leonard'),
        "admin_label" => true,
        "param_name" => "tb_carousel_lib",
        "value" => array(
            'Default' => '',
            'TB Carousel' => 'tb'
        )
    ));

    vc_add_param("vc_images_carousel", array(
        "type" => "checkbox",
        "class" => "",
        "heading" => __("Show Pagination With Image", 'leonard'),
        "admin_label" => true,
        "param_name" => "tb_page_image",
        "value" => array('Yes' => 'yes'),
        'dependency' => array(
            "element"=>"tb_carousel_lib",
            "value"=> array(
                'tb'
            )
        )
    ));

    vc_add_param("vc_images_carousel", array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Number Image For Pagination", 'leonard'),
        "admin_label" => true,
        "param_name" => "tb_page_image_count",
        "value" => 3,
        'dependency' => array(
            "element"=>"tb_carousel_lib",
            "value"=> array(
                'tb'
            )
        )
    ));

}