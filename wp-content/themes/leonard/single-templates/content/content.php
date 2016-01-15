<?php
/**
 * The default template for displaying content
 *
 *
 * @package Themebears
 * @subpackage Themebears
 * @since 1.0.0
 */
?>
<?php
global $template;
if( basename($template) === 'blog-classic.php') {
    $tb_image_size = 'full';
} else {
    $tb_image_size = 'tb-blog-medium';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <?php if(has_post_thumbnail()) : ?>
    <div class="tb-blog-image">
        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail( $tb_image_size ); ?></a>
    </div>
    <?php endif ?>

    <div class="tb-blog-detail">
        <h2 class="tb-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
        <div class="tb-blog-meta"><?php tb_archive_detail(); ?></div>
        <div class="tb-blog-content">
            <?php
            if(get_post_type( get_the_ID() ) != 'page'):
                the_excerpt();
            endif;
			wp_link_pages( array(
				'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'leonard' ) . '</span>',
				'after'       => '</p>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'leonard' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
        </div>
        <a class="btn-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More ', 'leonard') ?> <i class="fa fa-long-arrow-right"></i></a>
    </div>
</article>
