<?php 
	$randId = rand( 1, 99999 );
?>
<div class="leonad-svg <?php esc_attr_e( $el_class, 'leonard' ); ?>" 
	data-type="extrapolygon" 
	data-radian="0.25" 
	data-stroke-color="<?php esc_attr_e( $color, 'leonard' ); ?>"
	data-fill-image-id="#image-<?php esc_attr_e( $randId, 'leonard' ); ?>"
	style="width: <?php esc_attr_e( $width, 'leonard' ); ?>; height: <?php esc_attr_e( $height, 'leonard' ); ?>;">

	<svg width="0" height="0">
		<defs>
		    <pattern id="image-<?php esc_attr_e( $randId, 'leonard' ); ?>" patternUnits="userSpaceOnUse" height="<?php esc_attr_e( (int) $height, 'leonard' ); ?>" width="<?php esc_attr_e( (int) $width, 'leonard' ); ?>">
		      	<image x="0" y="0" height="<?php esc_attr_e( (int) $height, 'leonard' ); ?>" width="<?php esc_attr_e( (int) $width, 'leonard' ); ?>" xlink:href="<?php esc_attr_e( $image, 'leonard' ) ?>"></image>
		    </pattern>
  		</defs>
	</svg>
	<?php _e( $content ); ?>
</div>