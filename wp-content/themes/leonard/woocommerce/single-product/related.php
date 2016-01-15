<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

$posts_per_page = 5;

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array($product->id)
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= $columns;

ob_start();
$date = time() . '_' . uniqid(true);


wp_register_script('owl-carousel', TB_JS . 'owl.carousel.js', 'jquery', '1.0', TRUE);
wp_register_script('owl-carousel-tb', TB_JS . 'owl.carousel.tb.js', 'owl-carousel', '1.0', TRUE);
wp_enqueue_style('owl-carousel-tb', TB_CSS . 'owl.carousel.css');
wp_enqueue_script('owl-carousel');
$tb_carousel['related-product-carousel'] = array(
    'loop' => false,
    'margin' => 30,
    'mouseDrag' => true,
    'nav' => true,
    'dots' => false,
    'autoplay' => true,
    'autoplayTimeout' => 2000,
    'autoplayHoverPause' => false,
    'navText' => array(''),
    'responsive' => array(
        0 => array(
            "items" => 1,
        ),
        768 => array(
            "items" => 2,
        ),
        992 => array(
            "items" => 3,
        ),
        1200 => array(
            "items" => 4,
        )
    )
);
wp_localize_script('owl-carousel-tb', "tbcarousel", $tb_carousel);
wp_enqueue_script('owl-carousel-tb');

$products = new WP_Query($args);

if ($products->have_posts()) :
    ?>
    <div id="tb_carousel_product<?php echo esc_attr($date); ?>" class="clear tb-related-products">
		<h2><?php _e('Related products', 'wocommerce'); ?></h2>
        <div class="tb-content-related-items">
            <div class="tb-carousel-list">
                <div id="related-product-carousel" class="tb-carousel">

                <?php while ($products->have_posts()) : $products->the_post(); ?>
                        <?php
                        global $product, $woocommerce_loop;

                        // Store loop count we're currently on
                        if (empty($woocommerce_loop['loop']))
                            $woocommerce_loop['loop'] = 0;

                        // Store column count for displaying the grid
                        $woocommerce_loop['columns'] = $columns;

                        // Ensure visibility
                        if (!$product || !$product->is_visible())
                            return;
                        ?>
                        <div <?php post_class(); ?>>
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
										</div>
									</div>
									<div class="tb-product-overlay-outer">
										<div class="tb-actions">
											<div class="tb_meta_top">
											<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
											<?php tb_add_compare_link(); ?>
											<a class="btn" href="<?php the_permalink() ?>"><i class="fa fa-search"></i></a>
											</div>
											<div class="tb_meta_bottom">
												<?php wc_get_template( 'loop/add-to-cart.php' );;?>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    <?php endwhile; // end of the loop.   ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
wp_reset_postdata();
