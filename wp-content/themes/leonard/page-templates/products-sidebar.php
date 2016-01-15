<?php
/**
 * Template Name: Products Right Sidebar
 *
 * @package Themebears
 * @subpackage Themebears
 * @since 1.0.0
 * @author Themebears
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $breadcrumb, $pagetitle;
echo get_query_var('foo');
get_header( 'shop' ); ?>
<section id="primary" class="content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb'; }; ?> <?php if(!$pagetitle){ echo ' no_page_title'; }; ?>">
    <main id="main" class="site-main" role="main">    
        <div class="<?php echo get_post_meta(get_the_ID(), 'tb_layout', true) ? 'container-fluid' : 'container'; ?>">
            <div class="row">
                <div class="<?php echo (is_active_sidebar('sidebar-12')) ? 'col-xs-12 col-sm-9 col-md-9 col-lg-9' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12'; ?>">
                	<?php
                		/**
                		 * woocommerce_before_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                		 * @hooked woocommerce_breadcrumb - 20
                		 */ 
                        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
                		do_action( 'woocommerce_before_main_content' );
                	?>

                		<?php do_action( 'woocommerce_archive_description' ); ?>
                
                		<?php if ( have_posts() ) : ?>
                
                			<?php
                				/**
                				 * woocommerce_before_shop_loop hook
                				 *
                				 * @hooked woocommerce_result_count - 20
                				 * @hooked woocommerce_catalog_ordering - 30
                				 */
								//include_once( THEMEPATH .'/woocommerce/loop/orderby.php' );
								//include_once( THEMEPATH .'/woocommerce/loop/result-count.php' );
                				do_action( 'woocommerce_before_shop_loop' );
                			?>
                
                			<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'single-templates/content', 'page' ); ?>
							<?php comments_template( '', true ); ?>
							<?php endwhile; // end of the loop. ?>
                
                			<?php
                				/**
                				 * woocommerce_after_shop_loop hook
                				 *
                				 * @hooked woocommerce_pagination - 10
                				 */
                				do_action( 'woocommerce_after_shop_loop' );
                			?>
                
                		<?php endif; ?>
                
                	<?php
                		/**
                		 * woocommerce_after_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                		 */
                		do_action( 'woocommerce_after_main_content' );
                	?>
                </div>
                <?php if ( is_active_sidebar( 'sidebar-12' ) ) : ?>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div id="secondary" class="secondary widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar-12' ); ?>
                        </div><!-- #secondary -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
<?php get_footer( 'shop' ); ?>