<div class="tb-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
	<?php $posts = $atts['posts'];
	while($posts->have_posts()) :
		$posts->the_post();
		$post_meta = tb_post_meta_data();
		?>
		<div class="tb-testimonial-item">
			<div class="tb-testimonial-body">
				<div class="tb-testimonial-media">
					<?php if(has_post_thumbnail()) : ?>
						<?php 
						// the_post_thumbnail( 'thumbnail' ); 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $posts->ID ), 'full' );
						
						/*
						* Icon polygon
						*/
						echo do_shortcode ( '[tb_polygon type="image" image="'. $thumb[0] .'" color="#FFF" width="120px" height="120px"]' );
						?>
					<?php endif ?>
				</div>
				<div class="tb-testimonial-content tb_extra_font3"><?php the_content(); ?></div>
				<div class="tb-testimonial-info">
					<h2 class="tb-testimonial-title"><?php the_title();?></h2>
				</div>
			</div>
		</div>
	<?php endwhile;
	wp_reset_postdata();
	?>
</div>
