<?php
/* Get Categories */
$taxonomy = 'portfolio-category';
$_category = array();
if( !isset($atts['cat']) || $atts['cat']==''){
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
?>
<div class="tb-carousel-wrap">
    <?php if ( $atts['filter'] == "true" && !$atts['loop'] ): ?>
        <div class="tb-carousel-filter">
            <ul>
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach ($atts['categories'] as $category): ?>
                    <?php $term = get_term($category, $taxonomy); ?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="tb-carousel-filter-hidden" style="display: none"></div>
    <?php endif; ?>
    <div class="tb-carousel tb-team-default <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $team_meta = tb_post_meta_data();
            $groups = array();
            $groups[] = 'tb-carousel-filter-item all';
            foreach (tbGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }

            ?>
            <div class="tb-carousel-item tb-team-wrap <?php echo implode(' ', $groups);?>">
                <div class="tb-team-inner">
                    <?php if(has_post_thumbnail()) : ?>
                        <div class="tb-team-image">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php endif ?>
                    <div class="tb-team-overlay">
                        <h2 class="tb-team-title"><?php the_title(); ?></h2>
                        <div class="tb-team-position">
                            <span><?php echo do_shortcode($team_meta->_tb_team_position); ?></span>
                        </div>
                        <?php if(isset($team_meta->_tb_socials) && !empty($team_meta->_tb_socials)): ?>
                            <ul class="tb-team-socials">
                                <?php
                                $socials = json_decode($team_meta->_tb_socials);
                                if($socials):
                                    foreach($socials as $key => $item): ?>
                                        <li>
                                            <a href="<?php echo do_shortcode($item->link);?>" target="_blank">
                                                <i class="fa <?php echo do_shortcode($item->icon);?>"></i>
                                            </a>
                                        </li>
                                    <?php endforeach;
                                endif;
                                ?>
                            </ul>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>
