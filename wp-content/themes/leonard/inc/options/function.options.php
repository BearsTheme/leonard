<?php
global $tb_base;
/* get local fonts. */
$local_fonts = is_admin() ? $tb_base->getListLocalFontsName() : array() ;
/**
 * Home Options
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Main Options', 'leonard'),
    'icon' => 'el-icon-dashboard',
    'fields' => array(
        array(
            'id' => 'intro_product',
            'type' => 'intro_product',
        )
    )
);
/* Start Dummy Data*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$msg = $disabled = '';
if (!class_exists('WPBakeryVisualComposerAbstract') or !class_exists('ThemebearsCore') or !function_exists('cptui_create_custom_post_types')){
    $disabled = ' disabled ';
    $msg='You should be install visual composer, Themebears and Custom Post Type UI plugins to import data.';
}
$this->sections[] = array(
    'icon' => 'el-icon-briefcase',
    'title' => __('Demo Content', 'leonard'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => '<input type=\'button\' name=\'sample\' id=\'dummy-data\' '.$disabled.' value=\'Import Now\' /><div class=\'tb-dummy-process\'><div  class=\'tb-dummy-process-bar\'></div></div><div id=\'tb-msg\'><span class="tb-status"></span>'.$msg.'</div>',
            'id' => 'theme',
            'icon' => true,
            'default' => 'leonard',
            'options' => array(
                'leonard' => get_template_directory_uri().'/assets/images/dummy/leonard.png'
            ),
            'type' => 'image_select',
            'title' => 'Select Theme'
        )
    )
);
/* End Dummy Data*/
/**
 * Header Options
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Header', 'leonard'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => __('Layouts', 'leonard'),
            'subtitle' => __('select a layout for header', 'leonard'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
            )
        ),
        array(
            'id'       => 'header_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Header Height', 'leonard'),
            'output' => array('#tb-header .tb-header-logo-wrap'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
        ),
        array(
            'id' => 'header_margin',
            'title' => __('Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #tb-header'),
            'default' => array(
                'margin-top'     => '100px',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_padding',
            'title' => __('Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #tb-header'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => __('enable transparent mode for header.', 'leonard'),
            'id' => 'menu_transparent',
            'type' => 'switch',
            'title' => __('Transparent Header', 'leonard'),
            'default' => true,
        ),
        array(
            'subtitle' => __('enable sticky mode for menu.', 'leonard'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Sticky Header', 'leonard'),
            'default' => false,
        ),
        array(
            'id'       => 'menu_sticky_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Header Height', 'leonard'),
            'width' => false,
            'default'  => array(
                'height'  => '100px'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_margin',
            'title' => __('Sticky Header Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #tb-header.header-fixed'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_padding',
            'title' => __('Sticky Header Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #tb-header.header-fixed'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Tablets.', 'leonard'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', 'leonard'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Mobile.', 'leonard'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', 'leonard'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/* Header Top */

$this->sections[] = array(
    'title' => __('Header Top', 'leonard'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable header top.', 'leonard'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => __('Enable Header Top', 'leonard'),
            'default' => false,
        ),
        array(
            'id' => 'header_top_margin',
            'title' => __('Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #tb-header-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'header_top_padding',
            'title' => __('Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #tb-header-top'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* Logo */
$this->sections[] = array(
    'title' => __('Logo', 'leonard'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => __('Select Logo', 'leonard'),
            'subtitle' => __('Select an image file for your logo.', 'leonard'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.png'
            )
        ),
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Logo Height', 'leonard'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
        ),
        array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Logo Height', 'leonard'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
        ),
    )
);

/* Menu */
$this->sections[] = array(
    'title' => __('Menu', 'leonard'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Menu position.',
            'id' => 'menu_position',
            'options' => array(
                '' => 'Initial',
                'left' => 'Menu Left',
                'right' => 'Menu Right',
                'center' => 'Menu Center',
            ),
            'type' => 'select',
            'title' => __('Menu Position', 'leonard'),
            'default' => '2'
        ),
        array(
            'id' => 'menu_margin_first_level',
            'title' => __('Menu Margin - First Level', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('#tb-header-navigation .main-navigation .menu-main-menu > li > a',
                '#tb-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '9px',
                'margin-bottom'  => '30px',
                'margin-left'    => '9px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_padding_first_level',
            'title' => __('Menu Padding - First Level', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('#tb-header-navigation .main-navigation .menu-main-menu > li > a',
                '#tb-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '30px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Menu Font Size - First Level', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#tb-header-navigation .main-navigation .menu-main-menu > li > a',
                '#tb-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
        array(
            'id' => 'menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Menu Font Size - Sub Level', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#tb-header-navigation .main-navigation .menu-main-menu > li ul a',
                '#tb-header-navigation .main-navigation .menu-main-menu > ul > li ul a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '11px',
            )
        ),
        array(
            'subtitle' => __('enable sub menu border bottom.', 'leonard'),
            'id' => 'menu_border_color_bottom',
            'type' => 'switch',
            'title' => __('Border Bottom Menu Item Sub Level', 'leonard'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Enable mega menu.', 'leonard'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', 'leonard'),
            'default' => true,
        ),
        array(
            'subtitle' => __('Enable menu first level uppercase.', 'leonard'),
            'id' => 'menu_first_level_uppercase',
            'type' => 'switch',
            'title' => __('Menu First Level Uppercase', 'leonard'),
            'default' => false,
        ),
        array(
            'id' => 'menu_icon_font_size',
            'type' => 'typography',
            'title' => __('Menu Icon Font Size', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#tb-header.tb-main-header .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
    )
);

/* Stick Menu */
$this->sections[] = array(
    'title' => __('Stick Menu', 'leonard'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'stick_menu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Stick Menu Font Size - First Level', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#tb-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li > a',
                '#tb-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'id' => 'sticky_menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Sticky Menu Font Size - Sub Level', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#tb-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li ul li a',
                '#tb-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > ul > li ul li a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'id' => 'sticky_menu_icon_font_size',
            'type' => 'typography',
            'title' => __('Sticky Menu Icon Font Size', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#tb-header.tb-main-header.header-fixed .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),

    )
);

/**
 * Page Title
 *
 * @author Themebears
 */

/**
 * Page title settings
 *
 */
$page_title = array(
    array(
        'id' => 'page_title_layout',
        'title' => __('Layouts', 'leonard'),
        'subtitle' => __('select a layout for page title', 'leonard'),
        'default' => '5',
        'type' => 'image_select',
        'options' => array(
            '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
            '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
            '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
            '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
            '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
            '5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
            '6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
        )
    ),
    array(
        'id'       => 'page_title_background',
        'type'     => 'background',
        'title'    => __( 'Background', 'leonard' ),
        'subtitle' => __( 'page title background with image, color, etc.', 'leonard' ),
        'output'   => array('#tb-page-element-wrap'),
        'default'   => array(
            'background-color'=>'#ffffff',
            'background-image'=> get_template_directory_uri().'/assets/images/pagetitle.jpg',
            'background-repeat'=>'',
            'background-size'=>'cover',
            'background-attachment'=>'',
            'background-position'=>'center center'
        )
    ),
    array(
        'id' => 'page_title_margin',
        'title' => __('Margin', 'leonard'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'margin',
        'output' => array('#tb-page-element-wrap'),
        'default' => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '80px',
            'margin-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_padding',
        'title' => __('Padding', 'leonard'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'padding',
        'output' => array('#tb-page-element-wrap'),
        'default' => array(
            'padding-top'     => '340px',
            'padding-right'   => '0',
            'padding-bottom'  => '260px',
            'padding-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_parallax',
        'title' => __('Enable Header Parallax', 'leonard'),
        'type' => 'switch',
        'default' => false
    ),
    array(
        'id' => 'page_title_custom_post',
        'title' => __('Custom Background For Post Type', 'leonard'),
        'type' => 'switch',
        'default' => false
    ),
);
/**
 * add custom background for post type
 */
$post_types = tb_list_post_types();
foreach( $post_types as $type => $name) {
    $page_title[] = array(
        'id'       => 'page_title_custom_post_' . $type,
        'type'     => 'background',
        'title'    => sprintf( __( 'Background For %s' , 'leonard'), $name),
        'subtitle' => sprintf( __( 'Custom background image for post type %s', 'leonard' ), $name),
        'output'   => array('.single-'.$type.' #tb-page-element-wrap'),
        'background-color' => false,
        'background-repeat' => false,
        'background-size' => false,
        'background-attachment' => false,
        'background-position' => false,
        'default'   => array(
            'background-image'=> '',
        ),
        'required' => array( 'page_title_custom_post', '=', 1 )
    );
}
/**
 * Section settings
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', 'leonard'),
    'icon' => 'el-icon-map-marker',
    'fields' => $page_title
);

/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => __('Page Title', 'leonard'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => __('Typography', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'leonard'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '48px',
                'line-height' => '60px',
                'text-align' => 'center'
            )
        ),
        array(
            'id' => 'page_sub_title_typography',
            'type' => 'typography',
            'title' => __('Sub Title', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text .page-sub-title'),
            'units' => 'px',
            'subtitle' => __('Typography option with sub title text.', 'leonard'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '36px',
                'text-align' => 'center'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => __('Breadcrumb', 'leonard'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('The text before the breadcrumb home.', 'leonard'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Home Prefix', 'leonard'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Typography', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#breadcrumb #breadcrumb-text .breadcrumbs','#breadcrumb #breadcrumb-text ul li a'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'leonard'),
            'default' => array(
                'color' => '',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '12px',
                'line-height' => '12px',
                'text-align' => 'center'
            )
        ),
    )
);

/**
 * Body
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Body', 'leonard'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => __('Set layout boxed default(Wide).', 'leonard'),
            'id' => 'body_layout',
            'type' => 'switch',
            'title' => __('Boxed Layout', 'leonard'),
            'default' => false,
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'leonard' ),
            'subtitle' => __( 'body background with image, color, etc.', 'leonard' ),
            'output'   => array('body'),
        ),
        array(
            'id' => 'body_margin',
            'title' => __('Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'body_padding',
            'title' => __('Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
);

/**
 * Content
 *
 * Archive, Pages, Single, 404, Search, Category, Tags ....
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Content', 'leonard'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'leonard' ),
            'subtitle' => __( 'Container background with image, color, etc.', 'leonard' ),
            'output'   => array('#main'),
        ),
        array(
            'id' => 'container_margin',
            'title' => __('Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page #main'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'container_padding',
            'title' => __('Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page #main'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);

/**
 * Page Loadding
 *
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Page Loadding', 'leonard'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable page loadding.', 'leonard'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => __('Enable Page Loadding', 'leonard'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Select Style Page Loadding.', 'leonard'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => __('Page Loadding Style', 'leonard'),
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )
    )
);

/**
 * Footer
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Footer', 'leonard'),
    'icon' => 'el-icon-credit-card',
);

/* Footer top */
$this->sections[] = array(
    'title' => __('Footer Top', 'leonard'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer top.', 'leonard'),
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => __('Enable Footer Top', 'leonard'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'leonard' ),
            'subtitle' => __( 'footer background with image, color, etc.', 'leonard' ),
            'output'   => array('#tb-footer'),
            'default'   => array(
                'background-image'=> get_template_directory_uri().'/images/bg_footer.jpg',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_margin',
            'title' => __('Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #tb-footer-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_padding',
            'title' => __('Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #tb-footer-top'),
            'default' => array(
                'padding-top'     => '80px',
                'padding-right'   => '0',
                'padding-bottom'  => '40px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* footer botton */
$this->sections[] = array(
    'title' => __('Footer Bottom', 'leonard'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer bottom.', 'leonard'),
            'id' => 'enable_footer_bottom',
            'type' => 'switch',
            'title' => __('Enable Footer Bottom', 'leonard'),
            'default' => false,
        ),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'leonard' ),
            'subtitle' => __( 'background with image, color, etc.', 'leonard' ),
            'output'   => array('footer #tb-footer-bottom'),
            'default'   => array(
                'background-color'=>'#202020'
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_margin',
            'title' => __('Margin', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #tb-footer-bottom #tb-footer-bottom-inner'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_padding',
            'title' => __('Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #tb-footer-bottom #tb-footer-bottom-inner'),
            'default' => array(
                'padding-top'     => '20px',
                'padding-right'   => '0',
                'padding-bottom'  => '20px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable button back to top.', 'leonard'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', 'leonard'),
            'default' => true,
        )
    )
);

/**
 * Button Option
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Button', 'leonard'),
    'icon' => 'el el-bold',
    'fields' => array(
        array(
            'id' => 'button_font_size',
            'type' => 'typography',
            'title' => __('Button Font Size', 'leonard'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3 , .button, .btn, input[type="submit"]'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'subtitle' => __('Enable button uppercase.', 'leonard'),
            'id' => 'button_text_uppercase',
            'type' => 'switch',
            'title' => __('Button Text Uppercase', 'leonard'),
            'default' => true,
        ),
    )
);

/* Button Default */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => __('Button Default', 'leonard'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_default_padding',
            'title' => __('Button Default - Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.btn, .vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .button, .btn, input[type="submit"]'),
            'default' => array(
                'padding-top'     => '15px',
                'padding-right'   => '35px',
                'padding-bottom'  => '15px',
                'padding-left'    => '35px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'btn_default_border',
            'type'     => 'border',
            'title'    => __('Button Default - Border', 'leonard'),
            'output'   => array('.btn, .vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .button, .btn, input[type="submit"]'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#f0ba00',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_default_border_hover',
            'type'     => 'border',
            'title'    => __('Button Default - Border Hover', 'leonard'),
            'output'   => array('.btn, .vc_general.vc_btn3.btn:hover, button.vc_general.vc_btn3:hover, a.vc_general.vc_btn3:hover, .button:hover, .btn:hover, input[type="submit"]:hover, .vc_general.vc_btn3.btn:focus, button.vc_general.vc_btn3:focus, a.vc_general.vc_btn3:focus, .button:focus, .btn:focus, input[type="submit"]:focus'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#f0ba00',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_default_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Button Default - Border Radius', 'leonard'),
            'width' => false,
            'default'  => array(
                'height'  => '0'
            ),
        ),
    )
);

/* Button Primary */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => __('Button Primary', 'leonard'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_primary_padding',
            'title' => __('Button Primary - Padding', 'leonard'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.btn.btn-primary, .vc_general.btn.btn-primary'),
            'default' => array(
                'padding-top'     => '15px',
                'padding-right'   => '35px',
                'padding-bottom'  => '15px',
                'padding-left'    => '35px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'btn_primary_border',
            'type'     => 'border',
            'title'    => __('Button Primary - Border', 'leonard'),
            'output'   => array('.btn.btn-primary, .vc_general.vc_btn3.btn.btn-primary'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#fcc403',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_primary_border_hover',
            'type'     => 'border',
            'title'    => __('Button Primary - Border Hover', 'leonard'),
            'output'   => array('.btn.btn-primary, .vc_general.vc_btn3.btn.btn-primary:hover, .vc_general.vc_btn3.btn.btn-primary:focus'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#fcc403',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_primary_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Button Primary - Border Radius', 'leonard'),
            'width' => false,
            'default'  => array(
                'height'  => '0'
            ),
        ),
    )
);
/**
 * Styling
 *
 * css color.
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Styling', 'leonard'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
		array(
			'subtitle' => __('select presets color.', 'appmove'),
			'id' => 'presets_color',
			'type' => 'image_select',
			'title' => __('Presets Color', 'appmove'),
			'default' => '0',
			'options' => array(
				'' => THEMEURI.'/inc/options/images/presets/pr-c-1.jpg',
				'1' => THEMEURI.'/inc/options/images/presets/pr-c-2.jpg',
				'2' => THEMEURI.'/inc/options/images/presets/pr-c-3.jpg',
				'3' => THEMEURI.'/inc/options/images/presets/pr-c-4.jpg',
				'4' => THEMEURI.'/inc/options/images/presets/pr-c-5.jpg',
			)
		),
        array(
            'subtitle' => __('set color main color.', 'leonard'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'leonard'),
            'default' => '#e54e5d'
        ),
        array(
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => __('Secondary Color', 'leonard'),
            'default' => '#cd3342'
        ),
        array(
            'id' => 'tertiary_color',
            'type' => 'color',
            'title' => __('Tertiary Color', 'leonard'),
            'default' => '#f5f8fa'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'leonard'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => __('Link Color', 'leonard'),
            'output'  => array('a'),
            'default' => array(
				'regular'  => '#707070',
				'hover'    => '#e54e5d',
			)
        ),
    )
);

/** Header Top Color **/
$this->sections[] = array(
    'title' => __('Header Top Color', 'leonard'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set background color header top.', 'leonard'),
            'id' => 'bg_header_top_color',
            'type' => 'background',
            'output'  => array('body #tb-header-top'),
            'title' => __('Background Color', 'leonard'),
            'default' => array(
				'background-color' => '#ececec',
			)
        ),
        array(
            'subtitle' => __('Set color header top.', 'leonard'),
            'id' => 'header_top_color',
            'type' => 'color',
            'output'  => array('body #tb-header-top'),
            'title' => __('Font Color', 'leonard'),
            'default' => ''
        )
    )
);

/** Header Main Color **/
$this->sections[] = array(
    'title' => __('Header Main Color', 'leonard'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for header background color.', 'leonard'),
            'id' => 'bg_header',
            'type' => 'color_rgba',
            'title' => __('Header Background Color', 'leonard'),
            'default'   => array(
                'alpha'     => 0
            )
        )
    )
);

/** Sticky Header Color **/
$this->sections[] = array(
    'title' => __('Sticky Header', 'leonard'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for sticky header.', 'leonard'),
            'id' => 'bg_sticky_header',
            'type' => 'color_rgba',
            'title' => __('Sticky Background Color', 'leonard'),
            'default'   => array(
                'alpha'     => 0
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/** Menu Color **/

$this->sections[] = array(
    'title' => __('Menu Color', 'leonard'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the text color of first level menu items.', 'leonard'),
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color - First Level', 'leonard'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'leonard'),
            'id' => 'menu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - First Level', 'leonard'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'leonard'),
            'id' => 'menu_color_active_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Active - First Level', 'leonard'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'leonard'),
            'id' => 'menu_color_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color - Sub Level', 'leonard'),
            'default' => '#909090'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'leonard'),
            'id' => 'menu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - Sub Level', 'leonard'),
            'default' => '#e54e5d'
        ),
        array(
            'subtitle' => __('Controls the border color of sub level menu items.', 'leonard'),
            'id' => 'menu_item_border_color',
            'type' => 'color',
            'title' => __('Border Color - Sub Level', 'leonard'),
            'default' => '',
            'required' => array( 0 => 'menu_border_color_bottom', 1 => '=', 2 => 1 )
        )
    )
);

/** Button Color **/

$this->sections[] = array(
    'title' => __('Button Color', 'leonard'),
    'icon' => 'el el-bold',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the button text color.', 'leonard'),
            'id' => 'btn_default_color',
            'type' => 'color',
            'title' => __('Button Default - Font Color', 'leonard'),
            'default' => '#000000'
        ),
        array(
            'subtitle' => __('Controls the button text hover color.', 'leonard'),
            'id' => 'btn_default_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Font Color Hover', 'leonard'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'leonard'),
            'id' => 'btn_default_bg_color',
            'type' => 'color',
            'title' => __('Button Default - Background Color', 'leonard'),
            'default' => 'transparent'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'leonard'),
            'id' => 'btn_default_bg_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Background Color Hover', 'leonard'),
            'default' => '#f0ba00'
        ),
        array(
            'subtitle' => __('Controls the button text color.', 'leonard'),
            'id' => 'btn_primary_color',
            'type' => 'color',
            'title' => __('Button Primary - Font Color', 'leonard'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button text hover color.', 'leonard'),
            'id' => 'btn_primary_color_hover',
            'type' => 'color',
            'title' => __('Button Primary - Font Color Hover', 'leonard'),
            'default' => '#fcc403'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'leonard'),
            'id' => 'btn_primary_bg_color',
            'type' => 'color',
            'title' => __('Button Primary - Background Color', 'leonard'),
            'default' => '#fcc403'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'leonard'),
            'id' => 'btn_primary_bg_color_hover',
            'type' => 'color',
            'title' => __('Button Primary - Background Color Hover', 'leonard'),
            'default' => 'transparent'
        ),
    )
);

/** Footer Top Color **/
$this->sections[] = array(
    'title' => __('Footer Top Color', 'leonard'),
    'icon' => 'el-icon-chevron-up',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'leonard'),
            'id' => 'footer_top_color',
            'type' => 'color',
            'output' => array('#tb-footer-top'),
            'title' => __('Footer Top Color', 'leonard'),
            'default' => '#636363'
        ),
        array(
            'subtitle' => __('Set title color footer top.', 'leonard'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'output' => array('#tb-footer-top h1,#tb-footer-top h2,#tb-footer-top h3,#tb-footer-top h4,#tb-footer-top h5,#tb-footer-top h6'),
            'title' => __('Footer Heading Color', 'leonard'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Set title link color footer top.', 'leonard'),
            'id' => 'footer_top_link_color',
            'type' => 'link_color',
            'output' => array('#tb-footer-top a'),
            'title' => __('Footer Link Color', 'leonard'),
            'default' => '#636363',
            'default' => array(
				'regular'  => '#636363',
				'hover'    => '#fcc403',
			)
        ),
    )
);

/** Footer Bottom Color **/
$this->sections[] = array(
    'title' => __('Footer Bottom Color', 'leonard'),
    'icon' => 'el-icon-chevron-down',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'leonard'),
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'output' => array('#tb-footer-bottom'),
            'title' => __('Footer Bottom Color', 'leonard'),
            'default' => '#3a3a3a'
        )
    )
);

/**
 * Typography
 *
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Typography', 'leonard'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#6f6f6f',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '30px',
                'text-align' => ''
            ),
            'subtitle' => __('Typography option with each property can be called individually.', 'leonard'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '36px',
                'line-height' => '60px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '30px',
                'line-height' => '60px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '60px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '20px',
                'line-height' => '60px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '60px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6', 'leonard'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '60px',
                'text-align' => ''
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', 'leonard'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Font 1', 'leonard'),
            'subtitle' => __('extend class "tb_extra_font1" to using this font', 'leonard'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.tb_extra_font1, .woocommerce-cart .cart-collaterals h2, .woocommerce-checkout .checkout h3'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Font 2', 'leonard'),
            'subtitle' => __('extend class "tb_extra_font2" to using this font', 'leonard'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.tb_extra_font2'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => __('Font 3', 'leonard'),
            'subtitle' => __('extend class "tb_extra_font3" to using this font', 'leonard'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.tb_extra_font3'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
		array(
            'id' => 'google-font-4',
            'type' => 'typography',
            'title' => __('Font 4', 'leonard'),
            'subtitle' => __('extend class "tb_extra_font4" to using this font', 'leonard'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.tb_extra_font4'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => __('Local Fonts', 'leonard'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => __( 'Fonts 1', 'leonard' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'leonard'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'leonard'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => __( 'Fonts 2', 'leonard' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'leonard'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'leonard'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

/**
 * Custom CSS
 *
 * extra css for customer.
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Custom CSS', 'leonard'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', 'leonard'),
            'subtitle' => __('create your css code here.', 'leonard'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Animations', 'leonard'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation mouse scroll...', 'leonard'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => __('Smooth Scroll', 'leonard'),
            'default' => false
        ),
        array(
            'subtitle' => __('Enable animation parallax for images...', 'leonard'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', 'leonard'),
            'default' => true
        ),
    )
);
/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author Themebears
 */
$this->sections[] = array(
    'title' => __('Optimal Core', 'leonard'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', 'leonard'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', 'leonard'),
            'default' => false
        )
    )
);
