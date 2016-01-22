<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Themebears
 * @subpackage Themebears
 * @since 1.0.0
 */
global $tb_options, $tb_meta;		
		if ( is_active_sidebar( 'sidebar-end-content' ) ) : ?>
			<div class="tb-sidebar-end-content-wrap">
				<?php dynamic_sidebar( 'sidebar-end-content' ); ?>
			</div>
		<?php endif; ?>
        </div><!-- #main -->
			<footer id="tb-footer">
                <?php if ($tb_options['enable_footer_top'] =='1'): ?>
                <div id="tb-footer-top">
                    <div class="row">
                        <div class="container">
                            <?php if (is_active_sidebar('footer-top')) : ?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-first">
									<?php 
										if ($tb_options['footer_logo']) {
											$footer_logo = $tb_options['footer_logo']['url'];
											if(isset($tb_meta->_tb_page_footer_logo) && $tb_meta->_tb_page_footer_logo){
												$footer_logo = wp_get_attachment_url($tb_meta->_tb_page_footer_logo);
											}
											?>
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tb-footer-logo"><img alt="" src="<?php echo esc_url($footer_logo); ?>"></a>
											<?php
										}
										dynamic_sidebar('footer-top'); 
									?>
								</div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar('footer-top-2')) : ?>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-second"><?php dynamic_sidebar('footer-top-2'); ?></div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar('footer-top-3')) : ?>
                                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 footer-third"><?php dynamic_sidebar('footer-top-3'); ?></div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar('footer-top-4')) : ?>
                                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 footer-four"><?php dynamic_sidebar('footer-top-4'); ?></div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar('footer-top-5')) : ?>
                                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 footer-five"><?php dynamic_sidebar('footer-top-5'); ?></div>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>
                <?php endif;?>
                <?php if ($tb_options['enable_footer_bottom'] =='1'): ?>
                <div id="tb-footer-bottom" class="text-center">
                     <div class="container">
                         <div class="row">
                         	<div id="tb-footer-bottom-inner">
	                             <?php if (is_active_sidebar('footer-bottom')) : ?>
	                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-first"><?php dynamic_sidebar('footer-bottom'); ?></div>
	                             <?php endif; ?>
	                             <div class="clearfix"></div>
                             </div>
                         </div>
                     </div>
                </div>
                <?php endif;?>
		</footer><!-- #site-footer -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>
