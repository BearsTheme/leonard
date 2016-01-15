<?php
global $tb_options;
$output = $title = $interval = $el_class = $tb_tab_bg_color = $tb_tab_icon = '';
extract( shortcode_atts( array(
	'title' => '',
	'interval' => 0,
	'tb_tab_bg_color' => '',
	'tb_tab_border_color' => '',
	'tb_tab_icon' => '',
	'el_class' => ''
), $atts ) );

wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );
$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode ) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
$tb_tab_bg_color = $atts['tb_tab_bg_color']; 
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
$uqid = uniqid();
$class_link = 'tb-tab-'.$uqid;
$tabs_nav = '';
$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix">';
foreach ( $tab_titles as $tab ) {
	preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
    $tab_atts = shortcode_parse_atts($tab[0]);
    if(isset($tab_atts['title'])) {
        $tabs_nav .= '<li class="'.$class_link.'"><a style="background-color: '.$tab_atts['tb_tab_bg_color'].';border-color: '.$tab_atts['tb_tab_border_color'].';" href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'"><i class="fa '.$tab_atts['tb_tab_icon'].'"></i>' . $tab_matches[1][0] . '<span style="background-color: '.$tab_atts['tb_tab_bg_color'].';border-color: '.$tab_atts['tb_tab_border_color'].';"></span></a></li>';

    }
}
$tabs_nav .= '</ul>' . "\n";

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

$output .= "\n\t" . '<div class="' . $css_class . '" data-interval="' . $interval . '">';
$output .= "\n\t\t" . '<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) );
$output .= "\n\t\t\t" . $tabs_nav;
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
if ( 'vc_tour' == $this->shortcode ) {
	$output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="' . __( 'Previous tab', 'js_composer' ) . '">' . __( 'Previous tab', 'js_composer' ) . '</a></span> <span class="wpb_next_slide"><a href="#next" title="' . __( 'Next tab', 'js_composer' ) . '">' . __( 'Next tab', 'js_composer' ) . '</a></span></div>';
}
$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $element );

echo do_shortcode($output);
?>
