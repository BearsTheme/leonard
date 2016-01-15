<?php 
vc_map(
	array(
		"name" => __("TB Counter", TB_NAME),
	    "base" => "tb_counter",
	    "class" => "vc-tb-counter",
	    "category" => __("ThemeBears Shortcodes", TB_NAME),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",TB_NAME),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("General Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Description",TB_NAME),
	            "param_name" => "description",
	            "value" => "",
	            "description" => __("",TB_NAME),
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
	            	"6 Columns",
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        /* Counters */
	        array(
	            "type" => "dropdown",
	            "heading" => __("Using Grouping",TB_NAME),
	            "param_name" => "grouping",
	            "std" => "false",
	            "value" => array(
				"True" => "true",
				"False" => "false"
				),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Separator",TB_NAME),
	            "param_name" => "separator",
	            "value" => ",",
	            'dependency' => array(
	            	"element"=>"grouping",
	            	"value"=>array(
						"true"
						)
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 1",TB_NAME),
	            "param_name" => "heading_1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 1",TB_NAME),
	            "param_name" => "title1",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 1",TB_NAME),
	            "param_name" => "type1",
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 1', TB_NAME ),
				'param_name' => 'icon1',
	            'value' => '',
                'dependency' => array(
                    "element"=>"tb_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "3 Columns",
                        "1 Column"
                    )
                ),
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Counters Settings", TB_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 1",TB_NAME),
	            "param_name" => "digit1",
	            "value" => "69",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 1",TB_NAME),
                "param_name" => "prefix1",
                'dependency' => array(
                    "element"=>"tb_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "3 Columns",
                        "1 Column"
                    )
                ),
                "value" => "",
                "description" => __("",TB_NAME),
                "group" => __("Counters Settings", TB_NAME)
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 1",TB_NAME),
	            "param_name" => "suffix1",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Description 1",TB_NAME),
                "param_name" => "description1",
                'dependency' => array(
                    "element"=>"tb_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "3 Columns",
                        "1 Column"
                    )
                ),
                "value" => "",
                "description" => __("",TB_NAME),
                "group" => __("Counters Settings", TB_NAME)
            ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 2",TB_NAME),
	            "param_name" => "heading_2",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 2",TB_NAME),
	            "param_name" => "title2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 2",TB_NAME),
	            "param_name" => "type2",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 2', TB_NAME ),
				'param_name' => 'icon2',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Counters Settings", TB_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 2",TB_NAME),
	            "param_name" => "digit2",
	            "value" => "69",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 2",TB_NAME),
                "param_name" => "prefix2",
                "value" => "",
                'dependency' => array(
                    "element"=>"tb_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "3 Columns",
                    )
                ),
                "description" => __("",TB_NAME),
                "group" => __("Counters Settings", TB_NAME)
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 2",TB_NAME),
	            "param_name" => "suffix2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 2",TB_NAME),
	            "param_name" => "description2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 3",TB_NAME),
	            "param_name" => "heading_3",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 3",TB_NAME),
	            "param_name" => "title3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 3",TB_NAME),
	            "param_name" => "type3",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 3', TB_NAME ),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Counters Settings", TB_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 3",TB_NAME),
	            "param_name" => "digit3",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => "69",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 3",TB_NAME),
                "param_name" => "prefix3",
                'dependency' => array(
                    "element"=>"tb_cols",
                    "value"=>array(
                        "6 Columns",
                        "4 Columns",
                        "3 Columns",
                    )
                ),
                "value" => "",
                "description" => __("",TB_NAME),
                "group" => __("Counters Settings", TB_NAME)
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 3",TB_NAME),
	            "param_name" => "suffix3",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 3",TB_NAME),
	            "param_name" => "description3",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 4",TB_NAME),
	            "param_name" => "heading_4",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 4",TB_NAME),
	            "param_name" => "title4",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 4",TB_NAME),
	            "param_name" => "type4",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 4', TB_NAME ),
				'param_name' => 'icon4',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Counters Settings", TB_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 4",TB_NAME),
	            "param_name" => "digit4",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => "69",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 4",TB_NAME),
                "param_name" => "prefix4",
                'dependency' => array(
                    "element"=>"tb_cols",
                    "value"=>array(
                        "6 Columns",
                        "4 Columns",
                    )
                ),
                "value" => "",
                "description" => __("",TB_NAME),
                "group" => __("Counters Settings", TB_NAME)
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 4",TB_NAME),
	            "param_name" => "suffix4",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 4",TB_NAME),
	            "param_name" => "description4",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 6",TB_NAME),
	            "param_name" => "heading_6",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>"6 Columns"
					),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 6",TB_NAME),
	            "param_name" => "title6",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("Title Of Item",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 6",TB_NAME),
	            "param_name" => "type6",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>"6 Columns"
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 6', TB_NAME ),
				'param_name' => 'icon6',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"tb_cols",
	            	"value"=>array(
						"6 Columns",
						)
					),
				'description' => __( 'Select icon from library.', TB_NAME ),
				"group" => __("Counters Settings", TB_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 6",TB_NAME),
	            "param_name" => "digit6",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>"6 Columns"
					),
	            "value" => "69",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 6",TB_NAME),
	            "param_name" => "prefix6",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 6",TB_NAME),
	            "param_name" => "suffix6",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 6",TB_NAME),
	            "param_name" => "description6",
	            'dependency' => array(
					"element"=>"tb_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Counters Settings", TB_NAME)
	        ),
	        /* End Counters */
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
	            "heading" => __("Shortcode Template",TB_NAME),
	            "param_name" => "tb_template",
	            "shortcode" => "tb_counter",
	            "admin_label" => true,
	            "group" => __("Template", TB_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_tb_counter extends TbShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'grouping' => 'false',
			'separator' => ',',
			'content_align' => 'default',
			'tb_cols' => '1 Column',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
		wp_register_script('counter', TB_JS. 'counter.min.js', array('jquery'),'1.0.0',true);
		wp_register_script('counter-tb', TB_JS. 'counter.tb.js', array('counter','waypoints'),'1.0.0',true);
		wp_enqueue_script('counter-tb');
        $html_id = tbHtmlID('tb-counter');
        $class = ($atts['class'])?$atts['class']:'';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' content-align-' . $atts['content_align'] . ' '. $class;
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>