<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Themebears
 * @subpackage Themebears
 * @since 1.0.0
 * @author Themebears
 */

get_header(); ?>
<div id="page-default" class="<?php tb_main_class(); ?>">
	<div id="primary" class="row">
		<div id="content" role="main">
			<?php 
			while ( have_posts() ) : the_post();
				/* Static css. */
				require( THEMEPATH . '/inc/dynamic/static.css.php' );get_template_part( 'single-templates/content', 'page' );
				comments_template( '', true );
			endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>