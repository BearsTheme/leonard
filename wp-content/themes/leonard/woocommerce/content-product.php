<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0; 

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

//$loop_shop_columns = get_option('loop_shop_columns');
if  (isset($_GET['tb_layout'])) :
	$loop_shop_columns = $_GET['tb_layout'];
else:
	$loop_shop_columns = 3;
endif;

if($loop_shop_columns){
	$woocommerce_loop['columns'] = $loop_shop_columns; 
}

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ){
    $classes[] = 'first';
}

if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ){
    $classes[] = 'last';
}

if($woocommerce_loop['columns'] == 1){
	$classes[] = 'list-item';
}
if($woocommerce_loop['columns'] == 3){
	$classes[] = 'grid-item';
}

?>
<div <?php post_class( $classes ); ?>>
    <div class="tb-product-teaser">
        <div class="tb-product-header">
            <div class="tb-product-image">
                <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                <a href="<?php the_permalink(); ?>" title="<?php _e('View detail', 'leonard'); ?>">
                    <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                    ?>
                </a>
            </div>
			<div class="tb-product-overlay">
				<h2 class="tb-product-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
				<div class="woocommerce">
					<?php do_action( 'woocommerce_template_single_rating' ); ?>
					<?php do_action( 'woocommerce_template_single_price' ); ?>
					<div class="tb_content">
						<?php echo wp_trim_words( get_the_content(), 48, '.'); ?>
					</div>
				</div>
            </div>
			<div class="tb-product-overlay-outer">
				<div class="tb-actions">
					<div class="tb_meta_top">
						<?php 
							echo do_shortcode('[yith_wcwl_add_to_wishlist]');
							tb_add_compare_link();
							tb_add_quick_view_button();
						?>
					</div>
					<div class="tb_meta_bottom">
						<?php wc_get_template( 'loop/add-to-cart.php' ); ?>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
