<?php
global $tb_options;
    /* Get Categories */
        $taxonomy = 'team-category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']=='' && taxonomy_exists($taxonomy)){
            $terms = get_terms($taxonomy);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
?>
<div class="tb-grid-wrapper tb-grid-team tb-team-layout-1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter']== 1 && $atts['layout']=='masonry'):?>
        <div class="tb-grid-filter">
            <ul>
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, 'category' );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(tbGetCategoriesByPostID(get_the_ID()) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            $team_meta = tb_post_meta_data();
            $tb_title_size = isset( $atts['tb_title_size'] ) ? $atts['tb_title_size'] : 'h2';
            ?>
            <div class="tb-team-wrap <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="tb-team-inner">
                    <?php if(has_post_thumbnail()) : ?>
                    <div class="tb-team-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php endif ?>
                    <div class="tb-team-overlay">
                        <div class="tb-team-info">
                            <<?php echo esc_attr($tb_title_size); ?> class="tb-team-title"><?php the_title(); ?></<?php echo esc_attr($tb_title_size); ?>>
                            <div class="tb-team-position">
                                <span><?php echo do_shortcode($team_meta->_tb_team_position); ?></span>
                            </div>
							<?php if(isset($team_meta->_tb_socials) && !empty($team_meta->_tb_socials)): ?>
								<div class="tb-team-socials">
									<ul class="tb-social">
										<?php
										$socials = json_decode($team_meta->_tb_socials);
										if($socials):
											foreach($socials as $key => $item): ?>
												<li>
													<a href="<?php echo esc_url($item->link);?>" data-original-title="<?php echo esc_attr($item->title);?>" data-placement="bottom" data-rel="tooltip" target="_blank">
														<i class="fa <?php echo esc_attr($item->icon);?>"></i>
													</a>
												</li>
											<?php endforeach;
										endif;
										?>
									</ul>
								</div>
							<?php endif;?>
                        </div>
                        
                    </div>
                </div>

            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>