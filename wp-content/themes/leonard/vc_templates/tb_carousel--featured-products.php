<?php
global $smof_data;
/* Get Categories */
$taxonomy = 'product_cat';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']==''){
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$_data = explode('|',$atts['source']);
$searchword = 'tax_query';
$matches = array();
if($_data):
	foreach($_data as $k=>$v) {
		if(preg_match("/\b$searchword\b/i", $v)) {
			$_data = $v;
			$_data = explode(':',$_data);
			$_category  = explode(',', $_data[1]);
		}
	}
endif;
$atts['categories'] = $_category;
?>
<div class="tb-carousel-wrap">
    <?php if ( $atts['filter'] == "true" && !$atts['loop'] ): ?>
        <div class="tb-carousel-filter">
            <ul>
                <li><a class="active" href="#" data-group="all"><?php _e('All', 'leonard'); ?></a></li>
                <?php foreach ($atts['categories'] as $category): ?>
                    <?php $term = get_term($category, $taxonomy); ?>
                    <li>
						<a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="tb-carousel-filter-hidden" style="display: none"></div>
    <?php endif; ?>
    <div class="tb-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
			$post_id = $posts->ID;
            $post_meta = tb_post_meta_data();
            $groups = array();
            $groups[] = 'tb-carousel-filter-item all';
            foreach (tbGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }
            ?>
            <div class="tb-carousel-item <?php echo implode(' ', $groups);?>">
                <article id="post-<?php the_ID(); ?>" <?php post_class('tb-product'); ?>>
                    <div class="tb-product">
						<?php if(has_post_thumbnail()) : ?>
							<div class="tb-product-image">
								<?php
									$postDate = strtotime( get_the_date('j F Y') );
									$todaysDate = time() - (7 * 86400);// publish < current time 1 week
									if ( $postDate >= $todaysDate) {
										echo '<span class="new">'.esc_html__('New', 'leonard').'</span>';
									} else {
										do_action( 'woocommerce_show_product_loop_sale_flash' );
									}
								?>
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<div class="tb-product-overlay-outer">
							<div class="tb-actions">
								<div class="tb_meta_top">
								<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
								<?php tb_add_compare_link(); ?>
								<a class="btn" href="<?php the_permalink() ?>"><i class="fa fa-search"></i></a>
								</div>
								<div class="tb_meta_bottom">
									<?php wc_get_template( 'loop/add-to-cart.php' );;?>
								</div>
							</div>
						</div>
						<div class="tb-product-overlay">
							<h2 class="tb-product-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
							<div class="woocommerce">
								<?php do_action( 'woocommerce_template_single_rating' ); ?>
								<?php do_action( 'woocommerce_template_single_price' ); ?>
							</div>
						</div>
                    </div>
                </article>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>
