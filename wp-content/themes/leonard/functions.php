<?php
/**
 * Themebears functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package Themebears
 * @subpackage Themebears
 * @since 1.0.0
 */

/**
 * Add global values.
 */
global $tb_options, $tb_meta, $tb_base;
define( 'THEMENAME', 'leonard' );
define( 'THEMEPATH', get_template_directory() );
define( 'THEMEURI', get_template_directory_uri() );


/* Add base functions */
require( get_template_directory() . '/inc/base.class.php' );

if(class_exists("TB_Base")){
    $tb_base = new TB_Base();
}
/* Add ReduxFramework. */
if(!class_exists('ReduxFramework')){
    require( get_template_directory() . '/inc/ReduxCore/framework.php' );
}

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );
/* Add custom vc params. */
if(class_exists('Vc_Manager')){

    /* Add theme elements */
    add_action('vc_after_init', 'tb_vc_params');
    function tb_vc_params() {
        require( get_template_directory() . '/vc_params/vc_rows.php' );
        require( get_template_directory() . '/vc_params/vc_column.php' );
        require( get_template_directory() . '/vc_params/vc_btn.php' );
        require( get_template_directory() . '/vc_params/vc_separator.php' );
        require( get_template_directory() . '/vc_params/vc_tabs.php' );
        require( get_template_directory() . '/vc_params/vc_pie.php' );
        require( get_template_directory() . '/vc_params/vc_images_carousel.php' );
    }
	
	/* Add theme mini shortcodes */
	add_action('vc_before_init', 'tb_mini_shortcodes');
	function tb_mini_shortcodes() {
		require( get_template_directory() . '/inc/minishortcodes/minishortcodes.class.php' );
	}
}
/* Remove Element VC */
if(class_exists('Vc_Manager')){
	vc_remove_element( "vc_button" );
	vc_remove_element( "vc_cta_button" );
	vc_remove_element( "vc_cta_button2" );
}
/* Add SCSS */
if(!class_exists('scssc')){
    require( get_template_directory() . '/inc/ReduxCore/inc/scssphp/scss.inc.php' );
}

/* Add Meta Core Options */
if(is_admin()){

    if(!class_exists('TbCoreControl')){
        /* add mete core */
        require( get_template_directory() . '/inc/metacore/core.options.php' );
        /* add meta options */
        require( get_template_directory() . '/inc/options/meta.options.php' );
    }
    /* add presets */
    require( THEMEPATH . '/inc/options/presets.php' );	

    /* tmp plugins. */
    require( get_template_directory() . '/inc/options/require.plugins.php' );
}

/* Add Template functions */
require( get_template_directory() . '/inc/template.functions.php' );

/* Dynamic css*/
require( get_template_directory() . '/inc/dynamic/dynamic.css.php' );

/* Add mega menu */
if(isset($tb_options['menu_mega']) && $tb_options['menu_mega'] && !class_exists('HeroMenuWalker')){
    require( get_template_directory() . '/inc/megamenu/mega-menu.php' );
}

/* Add widgets */
require( get_template_directory() . '/inc/widgets/cart_search.php' );
require( get_template_directory() . '/inc/widgets/instagram.php' );
require( get_template_directory() . '/inc/widgets/social.php' );
require( get_template_directory() . '/inc/widgets/recent-posts-widget-with-thumbnails.php' );
require( get_template_directory() . '/inc/widgets/flickr-badges-widget.php' );

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;
/*
 * Limit Words
 */
if (!function_exists('tb_limit_words')) {
    function tb_limit_words($string, $word_limit) {
        $words = explode(' ', strip_tags($string), ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return apply_filters('the_excerpt', implode(' ', $words));
    }
}
/**
 * Tb Leonard setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Tb Leonard supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Tb Leonard 1.0
 */
function tb_setup() {
	/*
	 * Makes Tb Leonard available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Tb Leonard, use a find and replace
	 * to change 'tb-tb_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'leonard', get_template_directory() . '/languages' );

	// Adds title tag
	add_theme_support( "title-tag" );
	
	// Add woocommerce
	add_theme_support( 'woocommerce' );
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'link', 'quote',) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'leonard' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size('tb-blog-medium', 480, 330, true);
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'tb_setup' );

/**
 * Add Image Size to Media
 *
 * @param $sizes
 * @return array
 */
function tb_media_image_sizes($sizes) {
    return array_merge( $sizes, array(
        'tb-blog-medium' => 'Image Size 480x330',
    ));
}
add_filter( 'image_size_names_choose', 'tb_media_image_sizes' );


/**
 * Get meta data.
 * @author Themebears
 * @return mixed|NULL
 */
function tb_meta_data(){
    global $post, $tb_meta;

    if(!isset($post->ID)) return ;

    $tb_meta = json_decode(get_post_meta($post->ID, '_tb_meta_data', true));

    if(empty($tb_meta)) return ;

    foreach ($tb_meta as $key => $meta){
        $tb_meta->$key = rawurldecode($meta);
    }
}
add_action('wp', 'tb_meta_data');

/**
 * Get post meta data.
 * @author Themebears
 * @return mixed|NULL
 */
function tb_post_meta_data(){
    global $post;

    if(!isset($post->ID)) return null;

    $post_meta = json_decode(get_post_meta($post->ID, '_tb_meta_data', true));

    if(empty($post_meta)) return null;

    foreach ($post_meta as $key => $meta){
        $post_meta->$key = rawurldecode($meta);
    }

    return $post_meta;
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Themebears
 * @since TB SuperHeroes 1.0
 */
function tb_scripts_styles() {
    
	global $tb_options, $wp_styles, $wp_scripts, $tb_meta, $wp_query, $wp, $sitepress;
	
	/** theme options. */
	$script_options = array(
	    'menu_sticky'=> $tb_options['menu_sticky'],
	    'menu_sticky_tablets'=> $tb_options['menu_sticky_tablets'],
	    'menu_sticky_mobile'=> $tb_options['menu_sticky_mobile'],
	    'paralax' => $tb_options['paralax'],
	    'back_to_top'=> $tb_options['footer_botton_back_to_top'],
	    'page_title_parallax'=> $tb_options['page_title_parallax'],
	);

	/*------------------------------------- JavaScript ---------------------------------------*/
	
	
	/** --------------------------libs--------------------------------- */

	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('tbtheme-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.2');
	
	/* Add parallax plugin. */
	if($tb_options['paralax']){
	   wp_enqueue_script('tbtheme-parallax', get_template_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js', array( 'jquery' ), '1.1.3', true);
	}
	/* Add smoothscroll plugin */
	if($tb_options['smoothscroll']){
	   wp_enqueue_script('tbtheme-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '1.0.0', true);
	}

    /* Fancy box */
    wp_register_script('tbtheme-fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '2.1.5', true);
    wp_register_style('tbtheme-fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.css');
	/* Elevatezoom Master */
	wp_enqueue_script( 'tbtheme-elevatezoom', get_template_directory_uri() . '/assets/libs/elevatezoom-master/jquery.elevatezoom.js', array('jquery'), '', true );
	/* Nice scroll */
	wp_register_script('tbtheme-nice-scroll', get_template_directory_uri() . '/assets/libs/nice-scroll/jquery.nicescroll.min.js', array( 'jquery' ), '3.0.6', true);
    
	/* Malihu custom scrollbar */
	wp_register_script('tbtheme-malihu-custom-scrollbar', get_template_directory_uri() . '/assets/libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js', array( 'jquery' ), '3.0.9', true);
    wp_register_style('tbtheme-malihu-custom-scrollbar', get_template_directory_uri() . '/assets/libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css');
    /* Slick Slider */
    wp_register_script('tb-slick-js', get_template_directory_uri(). '/assets/js/slick.min.js', array('jquery'), '1.5.7', true);
    wp_register_style('tb-slick-css', get_template_directory_uri(). '/assets/css/slick.css');
	/** --------------------------custom------------------------------- */
	
	/* Add main.js */
	wp_register_script('tbtheme-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery'), '1.0.0', true);
	/* ajax products */
	if(class_exists('BeRocket_AAPF')):
		wp_enqueue_script( 'berocket_aapf_widget-script', get_template_directory_uri() . '/assets/js/widget.min.js', array( 'jquery' ) );
		$br_options = apply_filters( 'berocket_aapf_listener_br_options', get_option('br_filters_options') );
		$wp_query_product_cat = '-1';
		if ( @ $wp_query->query['product_cat'] ) {
			$wp_query_product_cat = explode( "/", $wp_query->query['product_cat'] );
			$wp_query_product_cat = $wp_query_product_cat[ count( $wp_query_product_cat ) - 1 ];
		}

		if ( ! $br_options['products_holder_id'] ) $br_options['products_holder_id'] = 'ul.products';

		$post_temrs = "[]";
		if ( @ $_POST['terms'] ) {
			$post_temrs = @ json_encode( $_POST['terms'] );
		}

		if ( method_exists($sitepress, 'get_current_language') ) {
			$current_language = $sitepress->get_current_language();
		} else {
			$current_language = '';
		}
		wp_localize_script(
			'berocket_aapf_widget-script',
			'the_ajax_script',
			array(
				'version'                              => BeRocket_AJAX_filters_version,
				'current_language'                     => $current_language,
				'current_page_url'                     => preg_replace( "~paged?/[0-9]+/?~", "", home_url( $wp->request ) ),
				'ajaxurl'                              => admin_url( 'admin-ajax.php' ),
				'product_cat'                          => $wp_query_product_cat,
				'products_holder_id'                   => @ $br_options['products_holder_id'],
				'control_sorting'                      => @ $br_options['control_sorting'],
				'seo_friendly_urls'                    => @ $br_options['seo_friendly_urls'],
				'berocket_aapf_widget_product_filters' => $post_temrs,
				'user_func'                            => apply_filters( 'berocket_aapf_user_func', @ $br_options['user_func'] ),
				'default_sorting'                      => get_option('woocommerce_default_catalog_orderby'),
				'first_page'                           => @ $br_options['first_page_jump'],
				'scroll_shop_top'                      => @ $br_options['scroll_shop_top'],
				'hide_sel_value'                       => @ $br_options['hide_value']['sel'],
				'ajax_request_load'                    => @ $br_options['ajax_request_load'],
			)
		);
	endif;
	wp_localize_script('tbtheme-main', 'TBOptions', $script_options);
	wp_enqueue_script('tbtheme-main');
	/* Add menu.js */
    wp_enqueue_script('tbtheme-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true);
    /* VC Pie Custom JS */
    wp_register_script('progressCircle', get_template_directory_uri() . '/assets/js/process_cycle.js', array( 'jquery' ), '1.0.0', true);
    wp_register_script('vc_pie_custom', get_template_directory_uri() . '/assets/js/vc_pie_custom.js', array( 'jquery' ), '1.0.0', true);
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	// check for plugin using plugin name
	if ( is_plugin_active( 'timetable/timetable.php' ) ) {
		wp_dequeue_script('timetable_main');
		wp_enqueue_script('timetable_custom', get_template_directory_uri() . '/assets/js/timetable.js', array( 'jquery' ), '1.0.0', true);
	}
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    /*------------------------------------- Stylesheet ---------------------------------------*/
	
	/** --------------------------libs--------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('tbtheme-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('tbtheme-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads Font Ionicons. */
	wp_enqueue_style('tbtheme-font-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '2.0.1');

	/* Loads Pe Icon. */
	wp_enqueue_style('tbtheme-pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');
	
	/** --------------------------custom------------------------------- */
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'tbtheme-style', get_stylesheet_uri(), array( 'tbtheme-bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'tb_theme-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'tbtheme-style' ), '20121010' );
	$wp_styles->add_data( 'tb_theme-ie', 'conditional', 'lt IE 9' );
	/* Load widgets scripts*/		
	wp_enqueue_script('tb_widget_scripts', get_template_directory_uri() . '/inc/widgets/widgets.js');
	wp_enqueue_style('tb_widget_scripts', get_template_directory_uri() . '/inc/widgets/widgets.css');
	/* Load static css*/
	$presets = isset($tb_options['presets_color'])? $tb_options['presets_color']: '';
	/* Load static css*/
	if(isset($tb_meta->_tb_presets_color) && $tb_meta->_tb_presets_color){
		$presets = $tb_meta->_tb_presets_color;
	}
	if($presets){
		wp_enqueue_style('tbtheme-static', THEMEURI . '/assets/css/presets-'.$presets.'.css', array( 'tbtheme-style' ), '1.0.0');		
	}else{
		wp_enqueue_style('tbtheme-static', THEMEURI . '/assets/css/static.css', array( 'tbtheme-style' ), '1.0.0');
	}

    /**
     * IE Fallbacks
     */
    wp_register_script( 'ie_html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.min.js', array(), false, '3.7.2' );
    wp_enqueue_script( 'ie_html5shiv');
    $wp_scripts->add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );

    wp_register_script( 'ie_respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), false, '1.4.2' );
    wp_enqueue_script( 'ie_respond');
    $wp_scripts->add_data( 'ie_respond', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'tb_scripts_styles' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Themebears
 */
function tb_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'leonard' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'leonard' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title"><span>',
		'after_title' => '</span></h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Top Left', 'leonard' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Header with a page set as Header top left', 'leonard' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Top Right', 'leonard' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Header with a page set as Header top right', 'leonard' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Menu Right', 'leonard' ),
    	'id' => 'sidebar-4',
    	'description' => __( 'Appears when using the optional Menu with a page set as Menu right', 'leonard' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'End Content', 'leonard' ),
    	'id' => 'sidebar-end-content',
    	'description' => __( 'Appears when using the optional Content with a page set as end of Content', 'leonard' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebars( 5,array(
    	'name' => __( 'Footer Top %d', 'leonard' ),
    	'id' => 'footer-top',
    	'description' => __( 'Appears on Footer Top', 'leonard' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => __( 'Footer Bottom', 'leonard' ),
    	'id' => 'footer-bottom',
    	'description' => __( 'Appears on Footer Bottom', 'leonard' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
    register_sidebar( array(
        'name' => __( 'Shop Menu Sidebar', 'leonard' ),
        'id' => 'sidebar-11',
        'description' => __( 'Appears when using the optional Shop with Menu attach Widget', 'leonard' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Shop Sidebar', 'leonard' ),
        'id' => 'sidebar-12',
        'description' => __( 'Appears when using the optional Shop with a page set as Shop page', 'leonard' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Header Right', 'leonard' ),
        'id' => 'header-right',
        'description' => __( 'Appears when using the optional Cart & Search', 'leonard' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Header Right Menu', 'leonard' ),
        'id' => 'header-right-menu',
        'description' => __( 'Appears on right of navigation', 'leonard' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
    ) );
}
add_action( 'widgets_init', 'tb_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function tb_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'tb_page_menu_args' );

/**
 * Add field subtitle to post.
 * 
 * @since 1.0.0
 */
function tb_add_subtitle_field(){
    global $post, $tb_meta;
    
    /* get current_screen. */
    $screen = get_current_screen();
    
    /* show field in post. */
    if(in_array($screen->id, array('post'))){
        
        /* get value. */
        $value = get_post_meta($post->ID, 'post_subtitle', true);
        
        /* html. */
        echo '<div class="subtitle"><input type="text" name="post_subtitle" value="'.esc_attr($value).'" id="subtitle" placeholder = "'.__('Subtitle', 'leonard').'" style="width: 100%;margin-top: 4px;"></div>';
    }
}

//add_action( 'edit_form_after_title', 'tb_add_subtitle_field' );

/**
 * Save custom theme meta. 
 * 
 * @since 1.0.0
 */
function tb_save_meta_boxes($post_id) {
    
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    /* update field subtitle */
    if(isset($_POST['post_subtitle'])){
        update_post_meta($post_id, 'post_subtitle', $_POST['post_subtitle']);
    }
}

add_action('save_post', 'tb_save_meta_boxes');
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 * @param null $query
 */
function tb_paging_nav($query = null) {
    // Don't print empty markup if there's only one page.
	if($query){
		$tb_query = $query;
	}else{
		$tb_query = $GLOBALS['wp_query'];		
	}
	if ( $tb_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $tb_query->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<i class="fa fa-long-arrow-left"></i>', 'leonard' ),
			'next_text' => __( '<i class="fa fa-long-arrow-right"></i>', 'leonard' ),
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
			<div class="pagination loop-pagination">
				<?php echo do_shortcode($links); ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function tb_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			  <a class="post-prev left" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>"><i class="fa fa-long-arrow-left"></i><?php echo esc_attr($prev_post->post_title); ?></a>
			<?php endif; ?>
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) : ?>
			  <a class="post-next right" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo get_the_title( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?><i class="fa fa-long-arrow-right"></i></a>
            <?php endif; ?>
        </div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/* Add Custom Comment */
function tb_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
<<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
<?php endif; ?>
<div class="comment-author-image vcard">
	<?php echo get_avatar( $comment, 109 ); ?>
</div>
<div class="comment-main">
    <div class="comment-header">
        <?php printf( __( '<span class="comment-author">%s</span>', 'leonard' ), get_comment_author_link() ); ?>
        <span class="comment-date">
            <?php echo get_comment_time('d.m.Y') .' '. __('at', 'leonard') .' ' . get_comment_time('H:i'); ?>
        </span>
        <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' , 'leonard'); ?></em>
        <?php endif; ?>
    </div>
	<div class="comment-content">
		<?php comment_text(); ?>
	</div>
    <div class="reply">
       <?php comment_reply_link(
           array_merge( $args, array(
               'add_below' => $add_below,
               'depth' => $depth,
               'max_depth' => $args['max_depth'] )
           )
       ); ?>
        <i class="fa fa-mail-forward"></i>
    </div>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php
}
/* End Custom Comment */

/* Custom excerpt*/
function tb_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'tb_excerpt_more');
/* End Custom excerpt length */


/**
 * Ajax post like.
 *
 * @since 1.0.0
 */
function tb_post_like_callback(){

    $post_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $likes = null;

    if($post_id && !isset($_COOKIE['tb_post_like_'. $post_id])){

        /* get old like. */
        $likes = get_post_meta($post_id , '_tb_post_likes', true);

        /* check old like. */
        $likes = $likes ? $likes : 0 ;

        $likes++;

        /* update */
        update_post_meta($post_id, '_tb_post_likes' , $likes);

        /* set cookie. */
        setcookie('tb_post_like_'. $post_id, $post_id, time() * 20, '/');
    }

    echo esc_attr($likes);

    die();
}

add_action('wp_ajax_tb_post_like', 'tb_post_like_callback');
add_action('wp_ajax_nopriv_tb_post_like', 'tb_post_like_callback');

/**
 * Load ajax url.
 */
function tb_ajax_url_head() {
    echo '<script type="text/javascript"> var ajaxurl = "'.admin_url('admin-ajax.php').'"; </script>';
}
add_action( 'wp_head', 'tb_ajax_url_head');

/**
 * Count post view.
 *
 * @since 1.0.0
 */
function tb_set_count_view(){
    global $post;

    if(is_single() && !empty($post->ID) && !isset($_COOKIE['tb_post_view_'. $post->ID])){

        $views = get_post_meta($post->ID , '_tb_post_views', true);

        $views = $views ? $views : 0 ;

        $views++;

        update_post_meta($post->ID, '_tb_post_views' , $views);

        /* set cookie. */
        setcookie('tb_post_view_'. $post->ID, $post->ID, time() * 20, '/');
    }
}

add_action( 'wp', 'tb_set_count_view' );

/**
 * Get Post view
 * @return int|mixed
 */
function tb_get_count_view() {
    global $post;

    $views = get_post_meta($post->ID , '_tb_post_views', true);

    $views = $views ? $views : 0 ;
    return $views;
}

/**
 * Image Resize
 *
 * @param $attachment_id
 * @param int $w
 * @param int $h
 * @return bool|mixed|string
 */
function tb_image_resize($attachment_id, $w = 300, $h = 300){
	$attachment_url = wp_get_attachment_url( $attachment_id );
	$attachment_file = str_replace( home_url('/'), ABSPATH, $attachment_url );
	if(is_file($attachment_file)):
		$img = wp_get_image_editor( $attachment_file );
		if ( ! is_wp_error( $img ) ) {
			$img->resize( $w, $h, true );
			$img = $img->save();
			$attachment_url = str_replace( ABSPATH, home_url('/'), $img['path'] );
		}
	endif;
	return $attachment_url;
}

/**
 * Get list image sizes
 * @return array
 */
function tb_image_sizes() {
    $sizes = tb_get_image_sizes();
    $images = array();
    foreach($sizes as $key => $size) {
        $images["$key {$size['width']}x{$size['height']}"] = $key;
    }
    $images["FULL"] = 'full';
    return $images;
}

/**
 * List available image sizes with width and height following
 *
 * @param string $size
 * @return array|bool
 */
function tb_get_image_sizes( $size = '' ) {

    global $_wp_additional_image_sizes;

    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();

    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {

        if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

            $sizes[ $_size ] = array(
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );

        }

    }
    // Get only 1 size if found
    if ( $size ) {

        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }

    }

    return $sizes;
}

/**
 * Get list custom post type using for custom background header in theme options.
 *
 * @return array
 */
function tb_list_post_types() {
    $types = array();
    /*
     * Add Product Post Type of WooCommerce
     */
    if( class_exists( 'WooCommerce' ) ) {
        $types['product'] = __('Products', 'leonard');
    }
    /*
     * Get list custom post type CPT
     */
    $post_types = get_option( 'cptui_post_types' , array());
    foreach( $post_types as $type ) {
        $types[$type['name']] = $type['label'];
    }

    return $types;
}

/**
 * Add Fancybox into a post type
 */
function tb_add_fancybox() {
	if( is_singular('portfolio') ) {
		wp_enqueue_script('tbtheme-fancybox');
		wp_enqueue_style('tbtheme-fancybox');
		wp_enqueue_script('tb-slick-js');
		wp_enqueue_style('tb-slick-css');
	}
}
add_action( 'wp_enqueue_scripts', 'tb_add_fancybox' );

/**
 * Add Elevatezoom Master into a post type
 */
function tb_add_elevatezoom() {
	if( is_singular('product') ) {
		wp_enqueue_script('tbtheme-elevatezoom');
		wp_enqueue_script('tbtheme-malihu-custom-scrollbar');
		wp_enqueue_style('tbtheme-malihu-custom-scrollbar');
		wp_enqueue_script('tbtheme-nice-scroll');
	}
}
add_action( 'wp_enqueue_scripts', 'tb_add_elevatezoom' );

/* Woo support */
if(class_exists('Woocommerce')){
    //item per page
    require get_template_directory() . '/woocommerce/wc-template-functions.php';
    require get_template_directory() . '/woocommerce/wc-template-hooks.php';
}

/* Filter Search results */
function tb_searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post','team','portfolio','testimonial','pricing'));
    }
	return $query;
}
add_filter('pre_get_posts','tb_searchfilter');

/* Filter style loader tag, add attribute property */
add_filter('style_loader_tag', 'tb_slick_style_loader_tag');
function tb_slick_style_loader_tag($tag){  
  return preg_replace("/id='tb-slick-css-css'/", "property='stylesheet' id='tb-slick-css-css'", $tag);
}

add_filter('style_loader_tag', 'tb_wp_mediaelement_style_loader_tag');
function tb_wp_mediaelement_style_loader_tag($tag){  
  return preg_replace("/id='wp-mediaelement-css'/", "property='stylesheet' id='wp-mediaelement-css'", $tag);
}

add_filter('style_loader_tag', 'tb_mediaelement_style_loader_tag');
function tb_mediaelement_style_loader_tag($tag){  
  return preg_replace("/id='mediaelement-css'/", "property='stylesheet' id='mediaelement-css'", $tag);
}

add_filter('style_loader_tag', 'tb_prettyphoto_style_loader_tag');
function tb_prettyphoto_style_loader_tag($tag){  
  return preg_replace("/id='prettyphoto-css'/", "property='stylesheet' id='prettyphoto-css'", $tag);
}

add_filter('style_loader_tag', 'tb_carousel_style_loader_tag');
function tb_carousel_style_loader_tag($tag){  
  return preg_replace("/id='vc_carousel_css-css'/", "property='stylesheet' id='vc_carousel_css-css'", $tag);
}

add_filter('style_loader_tag', 'tb_font_awesome_style_loader_tag');
function tb_font_awesome_style_loader_tag($tag){  
  return preg_replace("/id='font-awesome-css'/", "property='stylesheet' id='font-awesome-css'", $tag);
}

add_filter( 'widget_text', 'do_shortcode' );