<?php
if( !function_exists('tb_woo_share') ) {

    /**
     * WooCommerce Share Hook
     */
    function tb_woo_share() {
        global $post;
?>
        <ul class="tb-share-social-list">
            <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
            <li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
            <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
            <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
            <li class="box"><a href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-pinterest"></i></a></li>
        </ul>
<?php
    }
}
add_action('woocommerce_share', 'tb_woo_share');

/**
 * Add Cart Clear Cart Function
 */
add_action('init', 'tb_woo_clear_cart_url');
function tb_woo_clear_cart_url() {
    global $woocommerce;
    if( isset($_REQUEST['clear_cart']) ) {
        $woocommerce->cart->empty_cart();
    }
}

/**
 * Add quick view button in wc product loop
 */
function tb_add_quick_view_button() {

	global $product;

	echo '<a href="#" class="btn yith-wcqv-button" data-product_id="' . $product->id . '"><i class="fa fa-search"></i></a>';
}
