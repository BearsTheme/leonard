<?php
vc_map(
	array(
		"name" => __("TB Progress Bar", TB_NAME),
	    "base" => "tb_progressbar",
	    "class" => "vc-tb-progressbar",
	    "category" => __("ThemeBears Shortcodes", TB_NAME),
	    "params" => array(
	        array(
	            "type" => "dropdown",
	            "heading" => __("Mode",TB_NAME),
	            "param_name" => "mode",
	            "value" => array(
	            	"Horizontal" => "horizontal",
	            	"Vertical" => "vertical"
	            	),
	            "group" => __("Progress Bar Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Item Title",TB_NAME),
	            "param_name" => "item_title",
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Progress Bar Settings", TB_NAME)
	        ),
            /* Start Icon */
            array(
                'type' => 'dropdown',
                'heading' => __( 'Icon library', TB_NAME ),
                'value' => array(
                    __( 'Font Awesome', TB_NAME ) => 'fontawesome',
                    __( 'Open Iconic', TB_NAME ) => 'openiconic',
                    __( 'Typicons', TB_NAME ) => 'typicons',
                    __( 'Entypo', TB_NAME ) => 'entypo',
                    __( 'Linecons', TB_NAME ) => 'linecons',
                    __( 'Pixel', TB_NAME ) => 'pixelicons',
                    __( 'P7 Stroke', TB_NAME ) => 'pe7stroke',
                ),
                'param_name' => 'icon_type',
                'description' => __( 'Select icon library.', 'js_composer' ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_fontawesome',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_openiconic',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_typicons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_entypo',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_linecons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_pixelicons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'pixelicons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'pixelicons',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', TB_NAME ),
                'param_name' => 'icon_pe7stroke',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'pe7stroke',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'pe7stroke',
                ),
                'description' => __( 'Select icon from library.', TB_NAME ),
                "group" => __("Progress Bar Settings", TB_NAME)
            ),
            /* End Icon */
			array(
			"type" => "dropdown",
			"heading" => __ ( 'Show Value', TB_NAME ),
			"param_name" => "show_value",
			"value" => array(
					"Yes" => "true",
					"No" => "false"
			),
			"description" => '',
			"group" => __("Progress Bar Settings", TB_NAME)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"value" => "60",
				"heading" => __ ( "Value", TB_NAME ),
				"param_name" => "value",
				"description" => "Number only, ex: 60",
				"group" => __("Progress Bar Settings", TB_NAME)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Value Suffix", TB_NAME ),
				"group" => __("Progress Bar Settings", TB_NAME),
				"param_name" => "value_suffix",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => __ ( 'Background Color Bar', TB_NAME ),
				"param_name" => "bg_color",
				"group" => __("Progress Bar Settings", TB_NAME),
				"value" =>"#e9e9e9",
				"description" => __('Background color for wrapper bar. Default is #e9e9e9',TB_NAME)
			),
			array(
				"type" => "colorpicker",
				"heading" => __ ( 'Progress Color', TB_NAME ),
				"param_name" => "color",
				"group" => __("Progress Bar Settings", TB_NAME),
				"description" => __('Background color for progress.',TB_NAME)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Width", TB_NAME ),
				"param_name" => "width",
				"value" => "250px",
				"group" => __("Progress Bar Settings", TB_NAME),
				"description" => "in px"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Height", TB_NAME ),
				"param_name" => "height",
				"value" => "50px",
				"group" => __("Progress Bar Settings", TB_NAME),
				"description" => "in px"
			),
			array(
			    "type" => "textfield",
			    "heading" => __ ( 'Border Radius', TB_NAME ),
			    "param_name" => "border_radius",
			    "group" => __("Progress Bar Settings", TB_NAME),
			    "description" => 'px,%,...'
			),
			array(
	            "type" => "dropdown",
	            "heading" => __("Striped",TB_NAME),
	            "param_name" => "striped",
	            "value" => array(
	            	"Yes" => "yes",
	            	"No" => "no"
	            	),
	            "group" => __("Progress Bar Settings", TB_NAME)
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
	            "shortcode" => "tb_progressbar",
	            "group" => __("Template", TB_NAME),
	        )
	    )
	)
);
class WPBakeryShortCode_tb_progressbar extends TbShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'mode' => 'horitbntal',
			'item_title' => '',
			'show_value' => 'false',
			'value'=> '60',
			'value_suffix'=> '',
			'bg_color'=> '#e9e9e9',
			'color'=> '',
			'width'=> '250px',
			'height'=> '50px',
			'border_radius'=> '',
			'striped'=> 'no',
			'class' => '',
			    ), $atts);

        $atts['icon_type'] = isset($atts['icon_type']) ? $atts['icon_type'] : 'fontawesome';

		$atts = array_merge($atts_extra,$atts);
        if($atts['icon_type']=='pe7stroke'){
            wp_enqueue_style('tb-icon-pe7stroke', TB_CSS. 'Pe-icon-7-stroke.css');
        }else{
            vc_icon_element_fonts_enqueue( $atts['icon_type'] );
        }
		/* CSS */
	    wp_register_style('bootstrap-progressbar', TB_CSS . "bootstrap-progressbar.min.css","","0.7.0","all");
	    wp_enqueue_style('bootstrap-progressbar');
	    /* JS */
	    wp_register_script('bootstrap-progressbar', TB_JS . "bootstrap-progressbar.min.js",array('jquery'),"0.7.0",true);
	    wp_register_script('tb-progressbar', TB_JS . "bootstrap-progressbar.tb.js",array('jquery','bootstrap-progressbar'),"1.0.0",true);
	    wp_enqueue_script('tb-progressbar');
	    wp_enqueue_script('waypoints');
	    /* Layout */
        $html_id = tbHtmlID('tb-progressbar');
        /* Get Icon */
        $icon_name = "icon_" . $atts['icon_type'];
        $atts['icon'] = isset($atts[$icon_name]) ? $atts[$icon_name] : '';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']) . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>