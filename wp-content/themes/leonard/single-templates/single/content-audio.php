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
    <div class="tb-blog-image tb-blog-audio">
        <?php echo tb_archive_audio(); ?>
    </div>

    <div class="tb-blog-detail">
        <h2 class="tb-blog-title"><?php the_title(); ?></h2>
        <div class="tb-blog-meta"><?php tb_archive_detail(); ?></div>
        <div class="tb-blog-content">
            <?php
            if(tb_archive_audio()) {
                echo apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[audio(.*)](.*)\[\/audio\]/'), '', get_the_content(), 1));
            } else {
                the_excerpt();
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
