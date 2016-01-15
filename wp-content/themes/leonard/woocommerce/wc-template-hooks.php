<?php
/**
 * WooCommerce Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Sale flashes
 *
 * @see woocommerce_show_product_loop_sale_flash()
 * @see woocommerce_show_product_sale_flash()
 */
add_action( 'woocommerce_show_product_loop_sale_flash', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_show_product_sale_flash', 'woocommerce_show_product_sale_flash', 10 );

/**
 * woocommerce_after_single_product_summary hook
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * woocommerce_after_single_product hook
 */
add_action('woocommerce_after_single_product', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 20);


/**
 * woocommerce_single_product_summary hook
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 */

add_action( 'woocommerce_template_single_rating', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_template_single_price', 'woocommerce_template_single_price', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 7 );
/* function link compare */
function tb_add_compare_link( $product_id = false, $args = array() ) {
	extract( $args );
	if(!class_exists('YITH_Woocompare_Frontend')) return false;
	$YITH_Woocompare_Frontend = new YITH_Woocompare_Frontend();
	if ( ! $product_id ) {
		global $product;
		$product_id = isset( $product->id ) ? $product->id : 0;
	}

	// return if product doesn't exist
	if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
		return;

	$is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;

	if ( ! isset( $button_text ) || $button_text == 'default' ) {
		$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'yith-woocommerce-compare' ) );
		$button_text = function_exists( 'icl_translate' ) ? icl_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text ) : $button_text;
	}
	printf( '<a href="%s" class="%s" data-product_id="%d">%s</a>', $YITH_Woocompare_Frontend->add_product_url( $product_id ), 'compare' . ( $is_button == 'button' ? ' button' : '' ), $product_id, '<i class="fa fa-exchange"></i>' );
}
/**
* woocommerce_before_main_content hook
*
* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
* @hooked woocommerce_breadcrumb - 20
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'tb_product_overlay_top', 25 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 30 );
function tb_product_overlay_top(){
	?>
	<div class="tb-product-overlay-top">
		<div class="tb_wishlist_wrap"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
		<div class="tb_compare_wrap"><?php tb_add_compare_link(); ?>
		</div>
		<div class="tb_link_detail_wrap">
			<a class="tb_link_detail_product" href="<?php the_permalink(); ?>" title="<?php _e('View detail', 'leonard'); ?>" data-toggle="lightbox">
				<i class="fa fa-search"></i>
			</a>
		</div>
	</div>
	<?php
}

/* Hook sortby template */ 
// now we set our cookie if we need to
function tb_sort_by_page($count) {
	$count = 9;
	if (isset($_GET['tb_sortby'])) {
		$count = $_GET['tb_sortby'];
	}
	// else normal page load and no cookie
	return $count;
}
add_filter('loop_shop_per_page','tb_sort_by_page', 15);
/* Show grid layout link on archive */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 35 );
/* hook loop_shop_columns */
add_filter( 'loop_shop_columns', 'tb_wc_loop_shop_columns', 1, 10 );
/*
 * Return a new number of maximum columns for shop archives
 * @param int Original value
 * @return int New number of columns
 */
function tb_wc_loop_shop_columns( $number_columns ) {
	global $woocommerce_loop;
	$number_columns = 3;
	if(is_product_category()):
		$product_cat = get_query_var('product_cat');
		if($product_cat):
			$current_term = get_term_by('slug', $product_cat, 'product_cat');
			$term_id = $current_term->term_id;
			$display_columns	= get_woocommerce_term_meta( $term_id, 'display_columns', true );
			if($display_columns == '1') {
				$woocommerce_loop['columns'] = 1;
				return 1;
			}
		endif;
	endif;
	$woocommerce_loop['columns'] = $number_columns;
	return $number_columns;
}
