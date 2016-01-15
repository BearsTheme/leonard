<?php
/**
 * The Template for displaying all single posts
 *
 * @package Themebears
 * @subpackage Themebears
 * @since 1.0.0
 */

get_header(); ?>
<div class="<?php tb_main_class(); ?>">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
					
					<div class="row">
						<div class="col-md-9 col-md-offset-1">
							<div class="tb-single-bottom">
								<div class="tb-tags">
									<?php the_tags( '<i class="fa fa-tags"></i>', '', '' ); ?> 
									<?php tb_social_share() ?>
								</div>

								<?php tb_post_nav(); ?>

								<?php comments_template( '', true ); ?>
							</div>
						</div>
					</div>
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <!--div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <?php get_sidebar(); ?>
        </div-->
    </div>
</div>
<?php get_footer(); ?>