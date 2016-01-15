<?php
if( ! function_exists( 'tb_custom_masonry_size' ) ) {
    /**
     * Get Masonry Item size
     *
     * @return array(width,height)
     */
    function tb_custom_masonry_size($html_id, $index) {
        $result = get_option( $html_id.$index, false );
        if( $result ) {
            return json_decode($result, true);
        }
        return array(
            'width' 	=> 1,
            'height' 	=> 1
        );
    }
}

if( ! function_exists( 'fb_masonry_switch_layout_inner' ) ) {
	
	/**
	 * fb_masonry_switch_layout_inner
	 * 
	 * @param string $style
	 * @param array $atts
	 *
	 * @return HTML
	 */
	function fb_masonry_switch_layout_inner( $style, $atts ) {
		extract( $atts );
		$html_result = array();

		switch( $style ) {
			case 'polygon':
				/*
				* Icon polygon
				*/
				array_push( $html_result, do_shortcode ( '[tb_polygon type="image" image="http://theme.themebears.com/leonard/wp-content/uploads/2015/10/sale_of1.png" color="#FFF" width="160px" height="160px"]' ) );

				/* 
				 * Title
				 */
				if( ! empty( $title ) )
					array_push( $html_result, 
						'<div class="tb-fancy-box-content-title">
							<h3 class="tb-fancy-box-title">' . apply_filters('the_title', $title) . '</h3>
						</div>' );

				/*
				 * Button link
				 */
				if( ! empty( $button_link ) ) :
					$ex_link = explode( ':', $button_link );
					if( count( $ex_link ) >= 2 ) :
						$link_href = $ex_link[0];
						$link_title = $ex_link[1];
					else :
						$link_href = $ex_link[0];
						$link_title = $ex_link[0];
					endif;

					array_push( $html_result, 
					'<a class="btn btn-primary" href="' . $link_href . '">' . $link_title . '</a>' );
				endif;

				break;

			default: /* texttop & textbottom & textcenter */
				$info = '';
				
				/* Desction */
				if( ! empty( $content ) )
					$info .= '
						<div class="tb-fancy-box-content-description">
							<p>' . $content . '</p>
						</div>';
				
				/* Title */
				if( ! empty( $title ) )
					$info .= '
						<div class="tb-fancy-box-content-title">
							<h3 class="tb-fancy-box-title">' . apply_filters('the_title', $title) . '</h3>
						</div>';
						
				array_push( $html_result, $info );
			
				break;
		}

		return  implode( '', $html_result );
	}
}

$uqid = uniqid();
$class_link = 'tb-fancyboxes-' . $uqid;
$atts['item_class'] = "tb-masonry-item";
$class = isset($atts['class'])?$atts['class']:'';
$atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' '. $class;
$atts['post_id'] = get_the_ID();
$html_id = $atts['html_id'];
//Masonry Settings
global $tb_masonry;
$tb_masonry[$html_id] = array(
	'post_id' => get_the_ID(),
	'grid_margin' => 30,
	'grid_ratio' => 1,
	'grid_cols_lg' => 4,
	'grid_ratio' => 1,
);

wp_localize_script('tb-masonry', "tbMasonry", $tb_masonry);
wp_enqueue_script('tb-masonry');

if( current_user_can( 'manage_options' )  ) {
	wp_enqueue_script('jquery-ui-resizable');
	wp_enqueue_style('tb-jquery-ui');
	wp_enqueue_script('tb-masonry-admin');
}
?>
<div class="tb-masonry-wrapper <?php echo esc_attr($atts['template']); echo esc_attr(' '.$class_link); ?>" id="<?php echo esc_attr($html_id);?>">
    <div class="row tb-masonry">
        <?php // print_r( $atts );
        for( $i = 1; $i <= 4; $i++ ) :

        	$html_item 		= array();
			$icon 			= isset( $atts['icon' . $i] ) 			? $atts['icon' . $i] 			: '';
			$content 		= isset( $atts['description' . $i] ) 	? $atts['description' . $i] 	: '';
			$image  		= isset( $atts['image' . $i] ) 			? $atts['image' . $i] 			: '';
			$title  		= isset( $atts['title' . $i] ) 			? $atts['title' . $i] 			: '';
			$button_link 	= isset( $atts['button_link' . $i] ) 	? $atts['button_link' . $i] 	: '';
			$tb_styles  	= isset( $atts['tb_styles_' . $i] ) 	? $atts['tb_styles_' . $i] 		: 'textcenter';
			$size  			= tb_custom_masonry_size( $html_id , $i );
			$image_url  	= '';

			if( ! empty( $image ) ) {
				$attachment_image 	= wp_get_attachment_image_src( $image, 'full' );
				$image_url 			= $attachment_image[0];
			} 

			/**
			* OPEN tag
			*/
			array_push( $html_item, sprintf(
				'<div class="tb-masonry-item layout-%s item-w%s item-h%s" data-index="%s" data-id="%s">
				<div class="tb-masonry-inner" style="background-image: url(%s)">',
				$tb_styles,
				$size['width'],
				$size['height'],
				$i,
				$html_id . $i,
				$image_url
				) );

			/**
			* START Body
			*/
			$params = array(
				'title' 		=> $title,
				'content'		=> $content,
				'image'			=> $image,
				'icon'			=> $icon,
				'button_link'	=> $button_link,
				);
			$content_inner = '<div class="fc-item-info">' . fb_masonry_switch_layout_inner( $tb_styles, $params ) . '</div>';	
			array_push( $html_item, $content_inner );
			/**
			* END Body
			*/

			/**
			 * CLOSE tag
			 */
			array_push( $html_item, '</div></div>' );

			_e( implode( '', $html_item ) );
            
		endfor;
		?>
    </div>
</div>