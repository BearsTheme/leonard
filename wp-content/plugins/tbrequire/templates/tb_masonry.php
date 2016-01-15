<?php 
    /* get categories */
    $taxonomy = 'category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxonomy);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
?>
<div class="tb-masonry-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 ) :?>
        <div class="tb-masonry-filter">
            <ul class="tb-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxonomy );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo __($term->name, TB_NAME);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row tb-masonry">
        <?php
        $posts = $atts['posts'];
        $i = 0;
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(tbGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            /**
             * Get Masonry Size
             * It's require, don't remove it
             * tb_masonry_size()
             */
            $size = tb_masonry_size($atts['post_id'] , $atts['html_id'], $i);
            ?>
            <div class="tb-masonry-item item-w<?php echo esc_attr($size['width']); ?> item-h<?php echo esc_attr($size['height']); ?>"
                     data-groups='[<?php echo implode(',', $groups);?>]' data-index="<?php echo esc_attr($i); ?>" data-id="<?php echo esc_attr($atts['post_id']); ?>">
                <?php 
                    if(has_post_thumbnail()):
                        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $thumbnail = $thumbnail[0];
                    else:
                        $thumbnail = TB_IMAGES.'no-image.jpg';
                    endif;

                ?>
                <div class="tb-masonry-inner" style="background-image: url('<?php echo esc_url($thumbnail); ?>')">
                    <div class="tb-masonry-title">
                        <?php the_title();?>
                    </div>
                    <div class="tb-masonry-time">
                        <?php the_time('l, F jS, Y');?>
                    </div>
                    <div class="tb-masonry-categories">
                        <?php echo get_the_term_list( get_the_ID(), $taxonomy, 'Category: ', ', ', '' ); ?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>