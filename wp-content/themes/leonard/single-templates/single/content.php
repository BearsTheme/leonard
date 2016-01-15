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
    <?php if(has_post_thumbnail()) : ?>
    <div class="tb-blog-image">
        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail( 'full' ); ?></a>
    </div>
    <?php endif ?>
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<div class="col-left">
				<?php tb_archive_detail_col_left(); ?>
			</div>
			<div class="col-right">
				<div class="tb-blog-detail">
					<h2 class="tb-blog-title"><?php the_title(); ?></h2>
					<div class="tb-blog-meta"><?php tb_archive_detail_col_right(); ?></div>
					<div class="tb-blog-content">
						<?php the_content();
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
			</div>
		</div>
    </div>
</article>
