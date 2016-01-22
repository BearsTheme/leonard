<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php
	$postDate = strtotime( get_the_date('j F Y') );
	$todaysDate = time() - (7 * 86400);// publish < current time 1 week
	if ( $postDate >= $todaysDate) {
		echo '<span class="new">'.esc_html__('New', 'leonard').'</span>';
	} elseif ( $product->is_on_sale() ) {
		echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product );
	}
?>
