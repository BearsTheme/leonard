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
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <div class="tb-blog-image tb-blog-gallery">
        <?php echo tb_archive_gallery( 'full' ); ?>
    </div>

    <div class="tb-blog-detail">
        <h2 class="tb-blog-title"><?php the_title(); ?></h2>
        <div class="tb-blog-meta"><?php tb_archive_detail(); ?></div>
        <div class="tb-blog-content">
            <?php
            if(tb_archive_gallery()){
                echo apply_filters('the_content', preg_replace('/\[gallery.*ids=.(.*).\]/', '', get_the_content()));
            } else {
                the_content();
            }
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
    </div>
</article>
