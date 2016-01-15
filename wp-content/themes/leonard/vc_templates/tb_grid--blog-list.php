<?php 
    /* get categories */
	$taxo = 'category'; 
	$_category = array();
	if(!isset($atts['cat']) || $atts['cat']==''){
		$terms = get_terms($taxo); 
		foreach ($terms as $cat){
			$_category[] = $cat->term_id;
		}
	} else {
		$_category  = explode(',', $atts['cat']);
	} 
	$atts['categories'] = $_category;
?>
<div class="tb-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="tb-grid-filter">
            <ul class="tb-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php _e('All', 'leonard'); ?></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="tb-grid-inner <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'tb-blog-medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(tbGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="tb-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
				<div class="col-left">
					<?php 
						if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
							$class = ' has-thumbnail';
							$thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
						else:
							$class = ' no-image';
							$thumbnail = '<img src="'.TB_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
						endif;
						echo '<div class="tb-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
					?>
                </div><!--
				--><div class="col-right">
					<div class="tb_grid_content_top">
						<div class="tb_grid_content_top_left">
							<div class="tb-grid-date">
								<?php the_time('d'); ?>
							</div>
							<div class="tb-grid-month">
								<?php the_time('M'); ?>
							</div>
						</div><!--
						--><div class="tb_grid_content_top_right">
							<h3 class="tb-grid-title">
								<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
							</h3>
							<span class="tb_grid_author"><?php _e('By ', 'leonard');the_author_link(); ?></span><span class="tb_grid_comment"><?php comments_number( ' | Comment: 0', ' | Comment: 1', ' | Comment: %' ); ?></span>
						</div>
					</div>
					<div class="tb-grid-content">
						<?php the_excerpt(); ?>
					</div>
					<div class="tb-grid-readmore">
						<a href="<?php the_permalink(); ?>"><?php _e('Read more ','leonard'); ?><i class="fa fa-long-arrow-right"></i></a>
					</div>						
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
	tb_paging_nav($posts);
    wp_reset_postdata();
    ?>
</div>