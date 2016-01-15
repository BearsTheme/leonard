<?php
vc_map(
    array(
        "name" => __("TB Logo", 'leonard'),
        "base" => "tb_logo", 
        "class" => "vc-tb-logo",
        "category" => __("ThemeBears Shortcodes", 'leonard'),
        "params" => array(
			
		)
	)
);

class WPBakeryShortCode_tb_logo extends TbShortcode{
	protected function content($atts, $content = null){
		extract( shortcode_atts( array(
			'max-width'	=> '36px',
			'max-height'=> '36px',
			'src' => '',
			'el_class' => '',
			), $atts ) );
			
		$src = !empty($src) ? $src : tb_page_logo();
		ob_start(); ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="Logo" src="<?php echo esc_url($src); ?>"></a>		
		<?php
		return ob_get_clean();
	}
}
