<?php
vc_map(
	array(
		"name" => __("TB Fancy Box", TB_NAME),
	    "base" => "tb_fancybox",
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
	        array(
	            "type" => "dropdown",
	            "heading" => __("Select Number Cols",TB_NAME),
	            "param_name" => "tb_cols",
	            "value" => array(
	            	"1 Column",
	            	"2 Columns",
	            	"3 Columns",
	            	"4 Columns", 
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        /* Start Items */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 1",TB_NAME),
	            "param_name" => "heading_1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 1', TB_NAME ),
				'param_name' => 'icon1',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 1",TB_NAME),
	            "param_name" => "image1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Style item 1",TB_NAME),
	            "param_name" => "tb_styles_1",
	            "std" => "textcenter",
	            "value" => array(
	            	"Polygon" => "polygon",
	            	"Text Top" => "texttop",
	            	"Text Bottom" => "textbottom",
	            	"Text Center" => "textcenter",
	            	),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 1",TB_NAME),
	            "param_name" => "title1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 1",TB_NAME),
	            "param_name" => "description1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 1",TB_NAME),
	            "param_name" => "button_link1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 2",TB_NAME),
	            "param_name" => "heading_2",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 2', TB_NAME ),
				'param_name' => 'icon2',
				'dependency' => array(
						"element"=>"tb_cols",
						"value"=>array(
							"2 Columns",
							"4 Columns",
							"3 Columns",
						)
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 2",TB_NAME),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "param_name" => "image2",
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Style item 2",TB_NAME),
	            "param_name" => "tb_styles_2",
	            "std" => "textcenter",
	            "value" => array(
	            	"Polygon" => "polygon",
	            	"Text Top" => "texttop",
	            	"Text Bottom" => "textbottom",
	            	"Text Center" => "textcenter",
	            	),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 2",TB_NAME),
	            "param_name" => "title2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 2",TB_NAME),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "description2",
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 2",TB_NAME),
	            "param_name" => "button_link2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 3",TB_NAME),
	            "param_name" => "heading_3",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 3', TB_NAME ),
				'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"4 Columns",
						"3 Columns",
						)
					),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 3",TB_NAME),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "image3",
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Style item 3",TB_NAME),
	            "param_name" => "tb_styles_3",
	            "std" => "textcenter",
	            "value" => array(
	            	"Polygon" => "polygon",
	            	"Text Top" => "texttop",
	            	"Text Bottom" => "textbottom",
	            	"Text Center" => "textcenter",
	            	),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 3",TB_NAME),
	            "param_name" => "title3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 3",TB_NAME),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "description3",
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 3",TB_NAME),
	            "param_name" => "button_link3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 4",TB_NAME),
	            "param_name" => "heading_4",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"4 Columns",
						)
					),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 4', TB_NAME ),
				'param_name' => 'icon4',
				'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"4 Columns",
						)
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Fancy Icon Settings", TB_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 4",TB_NAME),
	            "param_name" => "image4",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Style item 4",TB_NAME),
	            "param_name" => "tb_styles_4",
	            "std" => "textcenter",
	            "value" => array(
	            	"Polygon" => "polygon",
	            	"Text Top" => "texttop",
	            	"Text Bottom" => "textbottom",
	            	"Text Center" => "textcenter",
	            	),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 4",TB_NAME),
	            "param_name" => "title4",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 4",TB_NAME),
	            "param_name" => "description4",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 4",TB_NAME),
	            "param_name" => "button_link4",
	            "value" => "",
	            'dependency' => array( 
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"4 Columns",
						) 
	            	),
	            "description" => __("",TB_NAME),
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
	            "shortcode" => "tb_fancybox",
	            "group" => __("Template", TB_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_tb_fancybox extends TbShortcode{
	protected function content($atts, $content = null){ 
		$atts_extra = shortcode_atts(array(
			'item_id' => '',
			'title' => '',
			'description' => '',
			'content_align' => 'default',
			'tb_cols' => '1 Column',
			'button_type'=> 'button',
			'button_text'=> '',
			'class' => '',
			    ), $atts);
		   
		$atts = array_merge($atts_extra,$atts);
		
        $html_id = tbHtmlID('tb-fancy-box');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>