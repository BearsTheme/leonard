<?php 
	global $tb_options, $tb_base, $tb_meta;
	$primary_color = isset($tb_options['primary_color'])?$tb_options['primary_color']:'#e54e5d';
	$primary_color = ( isset($tb_meta->_tb_primary_color) && !empty($tb_meta->_tb_primary_color) ) ? $tb_meta->_tb_primary_color : $primary_color;
	
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
	
	$rand_id = rand( 9, 9999 );
	$result = array();
	
	if( ! empty( $atts['image'] ) ) :
		
		/*
		 * Polygon layout image
		 * @return SVG
		 */
		 
		$image_url = '';
        if ( ! empty( $atts['image'] ) ) :
            $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
            $image_url = $attachment_image[0];
        endif;
        
		$html_str = '<div class="polygon-image leonad-svg" 
			data-type="extrapolygon" 
			data-radian="0.25" 
			data-stroke-color="#FFF"
			data-fill-image-id="#image-%s"
			style="width: 110px; height: 110px;">
			<svg width="0" height="0">
				<defs>
				    <pattern id="#image-%s" patternUnits="userSpaceOnUse" height="128" width="112">
				      	<image x="0" y="-10" height="130" width="130" xlink:href="%s"></image>
				    </pattern>
		  		</defs>
			</svg>
		</div>';
		
		array_push( $result, sprintf( $html_str, $rand_id, $image_url ) );
	elseif( ! empty( $iconClass ) ) :
	
		/*
		 * Polygon layout icon
		 * @return SVG
		 */
		 
		 $html_str = '<div class="polygon-icon leonad-svg" 
			data-type="polygon2" 
			data-radian="0.26" 
			data-fill-color="'. $primary_color .'" 
			style="width: 102px; height: 78px; text-align: center; line-height: 78px;">
			<i class="%s"></i>
		</div>';
		
		array_push( $result, sprintf( $html_str, $iconClass ) );
	endif;
	
	/*
	 * title check exist & push content
	 */
	if( ! empty( $atts['title_item'] ) ) :
		array_push( $result, sprintf( '<h3>%s</h3>', apply_filters( 'the_title',$atts['title_item'] ) ) );
	endif;
	
	/*
	 * content check exist & push content
	 */
	if( ! empty( $atts['description_item'] ) ) :
		array_push( $result, sprintf( '<div class="fancy-box-content">%s</div>', apply_filters( 'the_content', $atts['description_item'] ) ) );
	endif;
?>

<div class="tb-fancyboxes-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
	<?php _e( implode( '', $result ) ); ?>
</div>