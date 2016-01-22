<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//Get layout on page reload
if  (isset($_GET['tb_layout'])) :
	$tb_layout = $_GET['tb_layout'];
else:
	$tb_layout = 3;
endif;
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<select name="tb_sortby" id="tb_sortby" class="tb_sortby" onchange="this.form.submit()">
		<?php		 
		//Get products on page reload
		if  (isset($_GET['tb_sortby'])) :
			$numberOfProductsPerPage = $_GET['tb_sortby'];
		else:
			$numberOfProductsPerPage = 9;
		endif;
		$shopCatalog_orderby = apply_filters('tb_woocommerce_sortby_page', array(
			'9' 		=> __('Item On Page 9', 'woocommerce'),
			'12' 		=> __('Item On Page 12', 'woocommerce'),
			'15' 		=> __('Item On Page 15', 'woocommerce'),
			'18' 		=> __('Item On Page 18', 'woocommerce'),
			'-1' 		=> __('All', 'woocommerce'),
		));
		foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
			echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
		?>
	</select>
	
	<div class="woocommerce-result-count">
		<span class="tb-action <?php if($tb_layout == 3) echo 'active'; ?>"><input type="radio" name="tb_layout" value="3" <?php if($tb_layout == 3) echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-th"></i></span>
		<span class="tb-action <?php if($tb_layout == 1) echo 'active'; ?>"><input type="radio" name="tb_layout" value="1" <?php if($tb_layout == 1) echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-list"></i></span>
	</div>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key  || 'tb_sortby' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			} else if($key != 'tb_layout'){
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>
