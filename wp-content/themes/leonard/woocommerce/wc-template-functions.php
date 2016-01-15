<?php
if( !function_exists('tb_woo_share') ) {

    /**
     * WooCommerce Share Hook
     */
    function tb_woo_share() {
        global $post;
?>
        <ul class="social-list">
            <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
            <!--li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li-->
            <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
            <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
            <li class="box"><a href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-pinterest"></i></a></li>
        </ul>
<?php
    }
}
add_action('woocommerce_share', 'tb_woo_share');


/*
** Remove tabs from product details page
*/
function tb_woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); // Remove the additional information tab
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'tb_woo_remove_product_tabs', 98 );

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

//add wrap for '(Free)' or '(FREE!)' label text on cart page for Shipping and Handling
function tb_custom_shipping_free_label( $label ) {
    $label =  str_replace( "(Free)", '<span class="amount">Free</span>', $label );
    $label =  str_replace( "(FREE!)", '<span class="amount">FREE!</span>', $label );
    return $label;
}
add_filter( 'woocommerce_cart_shipping_method_full_label' , 'tb_custom_shipping_free_label' );
/* Hook oderby function */
if ( ! function_exists( 'tb_woocommerce_catalog_ordering' ) ) {

	/**
	 * Output the product sorting options.
	 *
	 * @subpackage	Loop
	 */
	function tb_woocommerce_catalog_ordering() {
		global $wp_query;

		if ( woocommerce_products_will_display() ) {
			//return;
		}

		$orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
		$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
		$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
			'menu_order' => __( 'Default sorting', 'woocommerce' ),
			'popularity' => __( 'Sort by popularity', 'woocommerce' ),
			'rating'     => __( 'Sort by average rating', 'woocommerce' ),
			'date'       => __( 'Sort by newness', 'woocommerce' ),
			'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
			'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
		) );

		if ( ! $show_default_orderby ) {
			unset( $catalog_orderby_options['menu_order'] );
		}

		if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
			unset( $catalog_orderby_options['rating'] );
		}

		wc_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby ) );
	}
	
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	add_action( 'woocommerce_before_shop_loop', 'tb_woocommerce_catalog_ordering', 30 );
}
/* hook layout woo */
add_action( 'wp_ajax_tb_hook_woo_columns', 'tb_hook_woo_columns' );
add_action( 'wp_ajax_nopriv_tb_hook_woo_columns', 'tb_hook_woo_columns' );

function tb_hook_woo_columns() {
	global $woocommerce_loop;
	$column = isset($_POST['column'])?$_POST['column']:1;
	$term_id = isset($_POST['term_id'])?$_POST['term_id']:0;
	$woocommerce_loop['columns'] = $column;
	setcookie("loop_shop_columns_".$term_id, $column);
	die($column);
}
/* hook posts_per_page woo */
add_action( 'wp_ajax_tb_hook_posts_per_page', 'tb_hook_posts_per_page' );
add_action( 'wp_ajax_nopriv_tb_hook_posts_per_page', 'tb_hook_posts_per_page' );

function tb_hook_posts_per_page() {
	$tb_sortby = $_POST['tb_sortby'];
	delete_option('posts_per_page');
	add_option('posts_per_page',$tb_sortby);
	die($tb_sortby);
}

add_action( 'product_cat_add_form_fields', 'tb_extra_category_fields' );
function tb_extra_category_fields(){
	?>
	<div class="form-field">
		<label for="display_columns"><?php _e( 'Display columns', 'leonard' ); ?></label>
		<select id="display_columns" name="display_columns" class="postform">
			<option value=""><?php _e( 'Default', 'leonard' ); ?></option>
			<option value="1"><?php _e( '1 Column', 'leonard' ); ?></option>
		</select>
	</div>
	<?php
}
add_action( 'product_cat_edit_form_fields', 'tb_edit_category_fields', 10, 2 );
function tb_edit_category_fields( $term, $taxonomy ){
	$display_columns	= get_woocommerce_term_meta( $term->term_id, 'display_columns', true );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php _e( 'Display columns', 'leonard' ); ?></label></th>
		<td>
			<select id="display_columns" name="display_columns" class="postform">
				<option value="" <?php selected( '', $display_columns ); ?>><?php _e( 'Default', 'leonard' ); ?></option>
				<option value="1" <?php selected( 1, $display_columns ); ?>><?php _e( '1 Column', 'leonard' ); ?></option>
			</select>
		</td>
	</tr>
	<?php
}
add_action( 'created_term', 'tb_save_category_fields', 10, 3 );
add_action( 'edit_term', 'tb_save_category_fields', 10, 3 );
function tb_save_category_fields( $term_id, $tt_id, $taxonomy ) {
	if ( isset( $_POST['display_columns'] ) )
		update_woocommerce_term_meta( $term_id, 'display_columns', esc_attr( $_POST['display_columns'] ) );
}

