<?php
/* get categories */
$taxonomy = 'categories-pricing';
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

<div class="tb-grid-wrapper tb-grid-pricing tb-grid-pricing-layout-1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="tb-grid <?php echo esc_attr($atts['grid_class']);?> tb-gird-pricing-item-wrap">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()) :
            $posts->the_post();
            $pricing_meta = tb_post_meta_data();
            $tb_title_size = isset( $atts['tb_title_size'] ) ? $atts['tb_title_size'] : 'h2';

        ?>
            <div class="tb-pricing-item <?php echo esc_attr($atts['item_class']);?> <?php echo ( $pricing_meta->_tb_is_feature == 1 ) ? ' pricing-feature-item' : '' ?> ">
                <div class="tb-pricing-inner">
                    <<?php echo esc_attr($tb_title_size); ?> class="tb-pricing-title">
                        <?php the_title();?>
                    </<?php echo esc_attr($tb_title_size); ?>>

                    <div class="tb-pricing-meta-wrap">
                        <?php
                        for ($i=1; $i <= 9 ; $i++) {
                            $pricing_option = $pricing_meta->{"_tb_option".$i};
                            $pricing_option_feature =  $pricing_meta->{"_tb_option".$i . "_feature"};
                            $pricing_icon = $pricing_option_feature == 1 ? '<i class="fa fa-check"></i>' : '';
                            if ( !empty( $pricing_option ) ) echo '<div class="option-item">'. esc_attr($pricing_option) . do_shortcode($pricing_icon) .'</div>';
                        }
                        ?>
                    </div>

                    <div class="tb-pricing-price-wrap">
                        <sup><?php _e('$', 'leonard'); ?></sup>
                        <span class="price"><?php echo esc_attr($pricing_meta->_tb_price); ?></span>
                        <sub><?php echo esc_attr($pricing_meta->_tb_value) ?></sub>
                    </div>

                    <div class="tb-pricing-button text-center">
                        <?php echo '<a class="btn btn-pricing" href=" '. esc_url($pricing_meta->_tb_button_url) .' ">'. esc_attr($pricing_meta->_tb_button_text) .'</a>'; ?>
                    </div>
                </div>
             </div>
        <?php
        endwhile;
    wp_reset_postdata();
    ?>
</div>
</div>