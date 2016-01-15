<?php

/**
 * Auto create css from Meta Options.
 *
 * @author Themebears
 * @version 1.0.0
 */
class Themebears_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $tb_options, $tb_base;
        $css = $this->css_render();
        if (! $tb_options['dev_mode']) {
            $css = $tb_base->compressCss($css);
        }
        echo '<style type="text/css" data-type="tb_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $tb_options, $tb_meta;
        ob_start();

        /* custom css.  */
        if( isset($tb_options['custom_css']) ) {
            echo wp_filter_nohtml_kses(trim($tb_options['custom_css']))."\n";
        }
        /* ==========================================================================
           Start Header
        ========================================================================== */
        /* Header Fixed Only Page */
        if (!empty($tb_meta->_tb_header_fixed_bg_color)) {
            echo "#tb-header.header-fixed-page {
				background-color: ".esc_attr($tb_meta->_tb_header_fixed_bg_color).";
			}\n";
        }
        if (!empty($tb_meta->_tb_header_fixed_bg_color)) {
            echo "#tb-header.header-fixed-page {
				background-color: ".esc_attr($tb_meta->_tb_header_fixed_bg_color).";
			}\n";
        }
        /* End Header Fixed Only Page */
        /* Custom Menu Color Only Page */
        if (!empty($tb_meta->_tb_header_menu_color)) {
            echo "#tb-header.header-menu-custom #tb-header-navigation .main-navigation .menu-main-menu > li > a, #tb-header.tb-header-1 #tb-menu-mobile-fixed {
				color: ".esc_attr($tb_meta->_tb_header_menu_color).";
			}\n";
        }
        if (!empty($tb_meta->_tb_header_menu_color_hover)) {
            echo "#tb-header.header-menu-custom #tb-header-navigation .main-navigation .menu-main-menu > li > a:hover, #tb-header .widget_cart_search_wrap .widget_cart_search_wrap_item > a.icon:hover {
				color: ".esc_attr($tb_meta->_tb_header_menu_color_hover).";
			}\n";
        }
        if (!empty($tb_meta->_tb_header_menu_color_active)) {
            echo "#tb-header.header-menu-custom #tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
			#tb-header.header-menu-custom #tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
			#tb-header.header-menu-custom #tb-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
			#tb-header.header-menu-custom #tb-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a,
			#tb-header .widget_cart_search_wrap .widget_cart_search_wrap_item > a.icon:hover {
				color: ".esc_attr($tb_meta->_tb_header_menu_color_active).";
			}\n";
        }
        /* End Custom Menu Color Only Page */

        /* Menu Fixed Only Page */
        if (!empty($tb_meta->_tb_header_fixed_menu_color)) {
            echo "#tb-header.header-fixed-page #tb-header-navigation .main-navigation .menu-main-menu > li > a {
				color: ".esc_attr($tb_meta->_tb_header_fixed_menu_color).";
			}\n";
        }
        if (!empty($tb_meta->_tb_header_fixed_menu_color_hover)) {
            echo "#tb-header.header-fixed-page #tb-header-navigation .main-navigation .menu-main-menu > li > a:hover {
				color: ".esc_attr($tb_meta->_tb_header_fixed_menu_color_hover).";
			}\n";
        }
        if (!empty($tb_meta->_tb_header_fixed_menu_color_active)) {
            echo "#tb-header.header-fixed-page #tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
			#tb-header.header-fixed-page #tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
			#tb-header.header-fixed-page #tb-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
			#tb-header.header-fixed-page #tb-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a {
				color: ".esc_attr($tb_meta->_tb_header_fixed_menu_color_active).";
			}\n";
        }
        /* End Menu Fixed Only Page */
        /* Start Page Title */
        if (!empty($tb_meta->_tb_page_title_margin)) {
            echo "body #page .page-title {
				margin: ".esc_attr($tb_meta->_tb_page_title_margin).";
			}\n";
        }
        if (!empty($tb_meta->_tb_page_title_background)) {
            $background = wp_get_attachment_image_src($tb_meta->_tb_page_title_background, 'full');
            echo "body #tb-page-element-wrap {
				background-image: url('".esc_url($background[0])."');
			}\n";
        }
		if ( is_product_category() ) :
			$product_cat = get_query_var('product_cat');
			$current_term = get_term_by('slug', $product_cat, 'product_cat');
			$term_id = $current_term->term_id;
			$thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
            echo $thumbnail_id ? "body #tb-page-element-wrap {
				background-image: url('".$image."');
			}\n" : "";
		endif;
		if ( is_product() ) :
			global $post;
			$terms = get_the_terms( $post->ID, 'product_cat' );
			if(isset($terms[0]) && isset($terms[0]->term_id)):
				$term_id = $terms[0]->term_id;
				$thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				echo $thumbnail_id ? "body #tb-page-element-wrap {
					background-image: url('".$image."');
				}\n" : "";
			endif;
		endif;
        /* End Page Title */
        /* ==========================================================================
           End Header
        ========================================================================== */
        return ob_get_clean();
    }
}

new Themebears_DynamicCss();