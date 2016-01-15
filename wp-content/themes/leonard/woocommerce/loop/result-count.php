<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
}
$term_id = 0;
if(is_product_category()):
	$product_cat = get_query_var('product_cat');
	if($product_cat):
		$current_term = get_term_by('slug', $product_cat, 'product_cat');
		$term_id = $current_term->term_id;
	endif;
endif;
if(isset($_COOKIE["loop_shop_columns_".$term_id])) {
    $woocommerce_loop['columns'] = $_COOKIE["loop_shop_columns_".$term_id];
}
$term_id = 0;
if(is_product_category()):
	$product_cat = get_query_var('product_cat');
	if($product_cat):
		$current_term = get_term_by('slug', $product_cat, 'product_cat');
		$term_id = $current_term->term_id;
	endif;
global $wp_query;
if ( ! woocommerce_products_will_display() && !is_page_template( 'page-templates/products-sidebar.php' ) )
	return;
?>
<p class="woocommerce-result-count">
	<a class="tb_action_grid tb_action <?php echo $woocommerce_loop['loop'] > 1 ? 'active':'';?>" data-column="3" data-term_id="<?php echo $term_id; ?>" title="Layout Grid" href="javascript:void(0)"><i class="fa fa-th-large"></i></a>
	<a class="tb_action_list tb_action <?php echo $woocommerce_loop['loop'] <= 1 ? 'active':'';?>" data-column="1" data-term_id="<?php echo $term_id; ?>" title="Layout List" href="javascript:void(0)"><i class="fa fa-list"></i></a>
</p>
<?php endif; ?>
