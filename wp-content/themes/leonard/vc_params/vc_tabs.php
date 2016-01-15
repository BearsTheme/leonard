<?php
/**
 * Add tabs params
 * 
 * @author Themebears
 * @since 1.0.0
 */
if (shortcode_exists('vc_tab')) {
    vc_add_param("vc_tab", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Tab Background Color", 'leonard'),
        "param_name" => "tb_tab_bg_color",
        "value" => ""
    ));
    vc_add_param("vc_tab", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Tab Border Color", 'leonard'),
        "param_name" => "tb_tab_border_color",
        "value" => ""
    ));
    vc_add_param("vc_tab", array(
        "type" => "textfield",
        "heading" => __("Tab Icon", 'leonard'),
        "param_name" => "tb_tab_icon"
    ));
}