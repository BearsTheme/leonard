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
						<?php the_post_thumbnail( 'thumbnail' ); ?>
					<?php endif ?>
				</div>
				<div class="tb-testimonial-content tb_extra_font3"><?php the_content(); ?></div>
				<div class="tb-testimonial-info">
					<h2 class="tb-testimonial-title"><?php the_title();?></h2>
					<div class="tb-team-position">
						<span><?php echo do_shortcode($post_meta->_tb_testimonial_position); ?></span>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile;
	wp_reset_postdata();
	?>
</div>
