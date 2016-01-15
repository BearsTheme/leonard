<?php
/**
 * @name : Default
 * @package : Themebears
 * @author : Themebears
 */
?>
<?php global $tb_options, $tb_meta; ?>
<div id="tb-header" class="tb-main-header header-default <?php if (!$tb_options['menu_sticky']) {
    echo 'no-sticky';
} ?> <?php if ($tb_options['menu_sticky_tablets']) {
    echo 'sticky-tablets';
} ?> <?php if ($tb_options['menu_sticky_mobile']) {
    echo 'sticky-mobile';
} ?> <?php if (!empty($tb_meta->_tb_enable_header_fixed)) {
    echo 'header-fixed-page';
} ?> <?php if (!empty($tb_meta->_tb_enable_header_menu)) {
    echo 'header-menu-custom';
} ?> <?php if ($tb_options['menu_transparent']) {
    echo 'header-transparent';
} ?> <?php if (!empty($tb_meta->_tb_disable_header_transparent)) {
    echo 'header-transparent-disable';
} ?>">
    <div class="tb-header-top-wrap">
		<div class="row">
			<div class="container">
				<div id="tb-header-top-left" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<?php if (is_active_sidebar('sidebar-2')) dynamic_sidebar('sidebar-2'); ?>
				</div>
				<div id="tb-header-top-right" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
					<?php if (is_active_sidebar('sidebar-3')) dynamic_sidebar('sidebar-3'); ?>
				</div>
			</div>
		</div>
    </div>
    <div class="tb-header-logo-wrap">
		<div class="row">
			<div class="container same_height_cols">
				<div id="tb-header-logo" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo esc_url(tb_page_logo()); ?>"></a>
				</div>
				<div id="tb-header-right" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div id="tb-menu-mobile" class="collapse navbar-collapse"><i class="pe-7s-menu"></i></div>
					<?php if (is_active_sidebar('header-right')) dynamic_sidebar('header-right'); ?>
				</div>
			</div>
		</div>
    </div>
    <div class="tb-header-bottom-wrap">
    	<div class="row">
	        <div class="container tb-vmiddle">
		        <div id="tb-header-navigation" class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
		            <nav id="site-navigation" class="main-navigation">
		                <?php
		                $attr = array(
		                    'menu' => tb_menu_location(),
		                    'menu_class' => 'nav-menu menu-main-menu',
		                );
		
		                $menu_locations = get_nav_menu_locations();
		
		                if (!empty($menu_locations['primary'])) {
		                    $attr['theme_location'] = 'primary';
		                }
		
		                /* enable mega menu. */
		                if (class_exists('HeroMenuWalker')) {
		                    $attr['walker'] = new HeroMenuWalker();
		                }
		
		                /* main nav. */
		                wp_nav_menu($attr); ?>
		            </nav>
		        </div><!--
				--><div id="tb-header-right-menu" class="hidden-xs hidden-sm hidden-md col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<?php if (is_active_sidebar('header-right-menu')) dynamic_sidebar('header-right-menu'); ?>
				</div>
	        </div>
    	</div>
    </div>
    <!-- #site-navigation -->
</div>
<!--#tb-header-->
