<?php
vc_map(
	array(
		"name" => __("TB Single Fancy Box", TB_NAME),
	    "base" => "tb_fancybox_single",
	    "class" => "vc-tb-fancy-boxes",
	    "category" => __("ThemeBears Shortcodes", TB_NAME),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",TB_NAME),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("Title Of Fancy Icon Box",TB_NAME),
	            "group" => __("General Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Description",TB_NAME),
	            "param_name" => "description",
	            "value" => "",
	            "description" => __("Description Of Fancy Icon Box",TB_NAME),
	            "group" => __("General Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Content Align",TB_NAME),
	            "param_name" => "content_align",
	            "value" => array(
	            	"Default" => "default",
	            	"Left" => "left",
	            	"Right" => "right",
	            	"Center" => "center"
	            	),
	            "group" => __("General Settings", TB_NAME)
	        ),
	        /* Start Items */
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
                'std' => 'fontawesome',
				'param_name' => 'icon_type',
				'description' => __( 'Select icon library.', 'js_composer' ),
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', TB_NAME ),
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
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			/* End Icon */
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item",TB_NAME),
	            "param_name" => "image",
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item",TB_NAME),
	            "param_name" => "title_item",
	            "value" => "",
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item",TB_NAME),
	            "param_name" => "description_item",
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        /* End Items */
	        array(
	            "type" => "dropdown",
	            "heading" => __("Button Type",TB_NAME),
	            "param_name" => "button_type",
	            "value" => array(
	            	"Button" => "button",
	            	"Text" => "text"
	            	),
	            "group" => __("Buttons Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link",TB_NAME),
	            "param_name" => "button_link",
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Buttons Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Text",TB_NAME),
	            "param_name" => "button_text",
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Buttons Settings", TB_NAME)
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
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",TB_NAME),
	            "shortcode" => "tb_fancybox_single",
	            "group" => __("Template", TB_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_tb_fancybox_single extends TbShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'content_align' => 'default',
			'button_type'=> 'button',
			'button_text'=> '',
			'button_link'=> '',
			'icon_type' => 'fontawesome',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_pe7stroke' => '',
			'description_item' => '',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
		$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
		$atts['description_item'] = isset($atts['description_item'])?$atts['description_item']:'';
		$atts['title_item'] = isset($atts['title_item'])?$atts['title_item']:'';
		if($atts['icon_type']=='pe7stroke'){
	        wp_enqueue_style('tb-icon-pe7stroke', TB_CSS. 'Pe-icon-7-stroke.css');
	    }else{
	        vc_icon_element_fonts_enqueue( $atts['icon_type'] );
	    }
        $html_id = tbHtmlID('tb-fancy-box-single');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>