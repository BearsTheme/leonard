<?php
vc_map(array(
    "name" => 'TB Google Map',
    "base" => "tb_googlemap",
    "icon" => "tb_icon_for_vc",
    "category" => __('ThemeBears Shortcodes', TB_NAME),
    "description" => __('Map API V3 Unlimited Style', TB_NAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('API Key', TB_NAME),
            "param_name" => "api",
            "value" => '',
            "description" => __('Enter you api key of map, get key from (https://console.developers.google.com)', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Address', TB_NAME),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => __('Enter address of Map', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Coordinate', TB_NAME),
            "param_name" => "coordinate",
            "value" => '',
            "description" => __('Enter coordinate of Map, format input (latitude, longitude)', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Click Show Info window', TB_NAME),
            "param_name" => "infoclick",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Click a marker and show info window (Default Show).', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Coordinate', TB_NAME),
            "param_name" => "markercoordinate",
            "value" => '',
            "description" => __('Enter marker coordinate of Map, format input (latitude, longitude)', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Title', TB_NAME),
            "param_name" => "markertitle",
            "value" => '',
            "description" => __('Enter Title Info windows for marker', TB_NAME)
        ),
        array(
            "type" => "textarea",
            "heading" => __('Marker Description', TB_NAME),
            "param_name" => "markerdesc",
            "value" => '',
            "description" => __('Enter Description Info windows for marker', TB_NAME)
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Marker Icon', TB_NAME),
            "param_name" => "markericon",
            "value" => '',
            "description" => __('Select image icon for marker', TB_NAME)
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Marker List', TB_NAME),
            "param_name" => "markerlist",
            "value" => '',
            "description" => __('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Info Window Max Width', TB_NAME),
            "param_name" => "infowidth",
            "value" => '200',
            "description" => __('Set max width for info window', TB_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", TB_NAME),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => __('Select the map type.', TB_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Template", TB_NAME),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Custom" => "custom",
                "Light Monochrome" => "light-monochrome",
                "Blue water" => "blue-water",
                "Midnight Commander" => "midnight-commander",
                "Paper" => "paper",
                "Red Hues" => "red-hues",
                "Hot Pink" => "hot-pink"
            ),
			"dependency" => array(
				"element"=>"type",
				"value" => "ROADMAP"
			),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textarea",
            "heading" => __('Custom Template', TB_NAME),
            "param_name" => "content",
            "value" => '',
			"dependency" => array(
				"element"=>"style",
				"value" => "custom"
			),
            "description" => __('Get template from http://snazzymaps.com', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Zoom', TB_NAME),
            "param_name" => "zoom",
            "value" => '13',
            "description" => __('zoom level of map, default is 13', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width', TB_NAME),
            "param_name" => "width",
            "value" => 'auto',
            "description" => __('Width of map without pixel, default is auto', TB_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height', TB_NAME),
            "param_name" => "height",
            "value" => '350px',
            "description" => __('Height of map without pixel, default is 350px', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scroll Wheel', TB_NAME),
            "param_name" => "scrollwheel",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Pan Control', TB_NAME),
            "param_name" => "pancontrol",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Show or hide Pan control.', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Zoom Control', TB_NAME),
            "param_name" => "zoomcontrol",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Show or hide Zoom Control.', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scale Control', TB_NAME),
            "param_name" => "scalecontrol",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Show or hide Scale Control.', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Map Type Control', TB_NAME),
            "param_name" => "maptypecontrol",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Show or hide Map Type Control.', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Street View Control', TB_NAME),
            "param_name" => "streetviewcontrol",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Show or hide Street View Control.', TB_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Over View Map Control', TB_NAME),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                __("Yes, please", TB_NAME) => true
            ),
            "description" => __('Show or hide Over View Map Control.', TB_NAME)
        )
    )
));

class WPBakeryShortCode_tb_googlemap extends TBShortcode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}