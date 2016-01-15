<?php
vc_map(
    array(
        "name" => __("TB Polygon", 'leonard'),
        "base" => "tb_polygon", 
        "class" => "vc-tb-polygon",
        "category" => __("ThemeBears Shortcodes", 'leonard'),
        "params" => array(
			
		)
	)
);

class WPBakeryShortCode_tb_polygon extends TbShortcode{
	protected function content($atts, $content = null){
		global $tb_options, $tb_base, $tb_meta;
		$primary_color = isset($tb_options['primary_color'])?$tb_options['primary_color']:'#e54e5d';
		$primary_color = ( isset($tb_meta->_tb_primary_color) && !empty($tb_meta->_tb_primary_color) ) ? $tb_meta->_tb_primary_color : $primary_color;
	
		extract( shortcode_atts( array(
			'type' 	=> 'icon', 					/* icon || image */
			'icon' 	=> 'fa-connectdevelop',		/* icon class fontawesome */
			'image' => '',						/* url image */
			'color'	=> $primary_color,			/* border color */
			'radian'=> 0.25,
			'width'	=> '36px',
			'height'=> '36px',
			'el_class' => '',
			), $atts ) ); 
        
		ob_start();
		require __DIR__ . '/temp-'. $type .'.php';
		$template = ob_get_clean();
		
		return $template;
	}
}
