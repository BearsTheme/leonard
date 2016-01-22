<?php
/**
 * Page title template
 * @since 1.0.0
 * @author Themebears
 */
/* Set Variable For Scss */
function tb_setvariablescss($var, $output, $var_default, $var_empty = null) {
	if(trim($var_empty) == null || trim($var_empty) == '') $var_empty = $var_default;
    $var = isset($var) ? (empty($var) ? $var_empty : esc_attr($var)) : $var_default;
    echo do_shortcode($output . ':' . $var . ';'). "\n";
}
function tb_page_title(){
    global $tb_options, $tb_meta;
    if(is_page() && isset($tb_meta->_tb_page_title) && $tb_meta->_tb_page_title){
        if(isset($tb_meta->_tb_page_title_type)){
			/* Page title for page */
			tb_page_title_content($tb_meta->_tb_page_title_type);
        }
    } else {
		/* Page title content */
		tb_page_title_content($tb_options['page_title_layout']);
	}
}

function tb_page_title_content($page_title_layout){
	global $tb_base, $tb_options;
	if($page_title_layout){
        $page_title_before = '<div id="page-title" class="page-title">
            <div class="container">
            <div class="row">';
        $page_title_after = '</div></div></div><!-- #page-title -->';

        $breadcrumb_before = '<div id="breadcrumb" class="breadcrumb">
            <div class="container-fluid">
            <div class="row">';
        $breadcrumb_after = '</div></div></div><!-- #breadcrumb -->';
        $pa_class = '';
        $pa_data = '';
        $pa_style = '';
        if( isset($tb_options['page_title_parallax']) && (int)$tb_options['page_title_parallax'] == 1) {
            $pa_class = "tb_header_parallax";
            $pa_style = 'style="background-position: 50% 0;background-attachment:fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"';
        }
        ?>
        <div id="tb-page-element-wrap"
             class="<?php echo esc_attr($pa_class); ?>" <?php echo do_shortcode($pa_style); ?>>
        <?php switch ($page_title_layout){
            case '1':
                ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $tb_base->getPageTitle(); ?></h1><?php tb_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $tb_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php
                break;
            case '2':
                ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $tb_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $tb_base->getPageTitle(); ?></h1><?php tb_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php
                break;
            case '3':
                ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $tb_base->getPageTitle(); ?></h1><?php tb_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $tb_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php
                break;
            case '4':
                ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $tb_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $tb_base->getPageTitle(); ?></h1><?php tb_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php
                break;
            case '5':
                ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $tb_base->getPageTitle(); ?></h1><?php tb_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php
                break;
            case '6':
                ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $tb_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php
                break;
        } ?>
        </div><!-- #tb-page-element-wrap-->
    <?php
    }
}

/**
 * Get sub page title.
 *
 * @author Themebears
 */
function tb_page_sub_title(){
    global $tb_meta, $post;

    if(!empty($tb_meta->_tb_page_title_sub_text)){
        echo '<div class="page-sub-title">'.esc_attr($tb_meta->_tb_page_title_sub_text).'</div>';
    } elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)){
        echo '<div class="page-sub-title">'.esc_attr(get_post_meta($post->ID, 'post_subtitle', true)).'</div>';
    }
}

/**
 * Get Header Layout.
 *
 * @author Themebears
 */
function tb_header(){
    global $tb_options, $tb_meta;
    /* header for page */
    if(isset($tb_meta->_tb_header) && $tb_meta->_tb_header){
        if(isset($tb_meta->_tb_header_layout)){
            $tb_options['header_layout'] = $tb_meta->_tb_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $tb_options['header_layout']);
}

/**
 * Get Main Logo.
 * 
 * @author Themebears
 */
function tb_page_logo(){
    global $tb_options, $tb_meta;
    /* header for page */
	$main_logo = isset($tb_options['main_logo']['url'])?$tb_options['main_logo']['url']:get_template_directory().'/assets/images/logo.png';
    if(isset($tb_meta->_tb_page_logo) && $tb_meta->_tb_page_logo){
		$main_logo = wp_get_attachment_url($tb_meta->_tb_page_logo);
    }
    return $main_logo;
}
/**
 * Get menu location ID.
 *
 * @param string $option
 * @return NULL
 */
function tb_menu_location($option = '_tb_primary'){
    global $tb_meta;
    /* get menu id from page setting */
    return (isset($tb_meta->$option) && $tb_meta->$option) ? $tb_meta->$option : null ;
}

function tb_get_page_loading() {
    global $tb_options;

    if($tb_options['enable_page_loadding']){
        echo '<div id="tb-loadding">';
        switch ($tb_options['page_loadding_style']){
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div class="loader"></div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Add page class
 *
 * @author Themebears
 * @since 1.0.0
 */
function tb_page_class(){
    global $tb_options;

    $page_class = '';
    /* check boxed layout */
    if($tb_options['body_layout']){
        $page_class = 'tb-boxed';
    } else {
        $page_class = 'tb-wide';
    }

    echo apply_filters('tb_page_class', $page_class);
}

/**
 * Add main class
 *
 * @author Themebears
 * @since 1.0.0
 */
function tb_main_class(){
    global $tb_meta;

    $main_class = '';
    /* chect content full width */
    if(is_page() && isset($tb_meta->_tb_full_width) && $tb_meta->_tb_full_width){
        /* full width */
        $main_class = "container-fluid";
    } else {
        /* boxed */
        $main_class = "container";
    }

    echo apply_filters('tb_main_class', $main_class);
}

/**
 * Show post like.
 *
 * @since 1.0.0
 */
function tb_get_post_like(){

    $likes = get_post_meta(get_the_ID() , '_tb_post_likes', true);

    if(!$likes) $likes = 0;

    ?>
    <i class="<?php echo !isset($_COOKIE['tb_post_like_'. get_the_ID()]) ? 'fa fa-heart-o' : 'fa fa-heart' ; ?>"></i><span class="tb-post-like" data-id="<?php the_ID(); ?>"><?php echo esc_attr($likes); ?></span>
<?php
}

/**
 * Archive detail
 *
 * @author Themebears
 * @since 1.0.0
 */
function tb_archive_detail(){
    ?>
    <div class="author vcard"><?php _e('By', 'leonard'); ?> <?php the_author_posts_link(); ?></div>
    <ul>
        <li class="tb-blog-like"><?php echo tb_get_post_like(); ?></li>
        <li class="tb-blog-comment"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a></li>
        <li class="tb-blog-views"><i class="fa fa-eye"></i> <?php echo tb_get_count_view(); ?></li>
        <?php if(has_category()): ?>
            <li class="tb-blog-category"><?php the_terms( get_the_ID(), 'category', '<i class="fa fa-bookmark-o"></i>', ' / ' ); ?></li>
        <?php endif; ?>
        <?php if(has_tag()): ?>
            <li class="tb-blog-tag"><?php the_tags('<i class="fa fa-tags"></i>', ' / ' ); ?></li>
        <?php endif; ?>
        <li class="tb-blog-date">
            <span class="day"><?php echo get_the_date("d"); ?></span>
            <span class="month"><?php echo get_the_date("M"); ?></span>
        </li>
    </ul>
<?php
}
function tb_archive_detail_col_left(){
    ?>
    <ul class="tb-share-date">
		<li class="tb-blog-date">
			<span class="day"><?php echo get_the_date("d"); ?></span>
			<span class="month"><?php echo get_the_date("M"); ?></span>
		</li>
        <li class="tb-blog-like"><?php echo tb_get_post_like(); ?></li>
        <li class="tb-blog-comment"><i class="fa fa-comments-o"></i><span><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a></span></li>
        <li class="tb-blog-views"><i class="fa fa-eye"></i><span><?php echo tb_get_count_view(); ?></span></li>
    </ul>
<?php
}
function tb_archive_detail_col_right(){
    ?>
   
    <ul>
		<li class="author vcard"><?php _e('By', 'leonard'); ?> <?php the_author_posts_link(); ?></li>
        <?php if(has_category()): ?>
            <li class="tb-blog-category"><?php the_terms( get_the_ID(), 'category', 'Categories: ', ' / ' ); ?></li>
        <?php endif; ?>
        <?php if(has_tag()): ?>
            <li class="tb-blog-tag"><?php the_tags('Tags: ', ' / ' ); ?></li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * Archive readmore
 *
 * @author Themebears
 * @since 1.0.0
 */
function tb_archive_readmore(){
    echo '<a class="btn btn-default" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.__('Continue Reading', 'leonard').'</a>';
}

/**
 * Media Audio.
 *
 * @param string $before
 * @param string $after
 * @return bool|string
 */
function tb_archive_audio() {
    global $tb_base, $tb_options;
    /* get shortcode audio. */
    $shortcode = $tb_base->getShortcodeFromContent('audio', get_the_content());

    if($shortcode){
        return do_shortcode($shortcode);
    }
    return false;
}

/**
 * Media Video.
 * @return bool|string
 */
function tb_archive_video() {

    global $wp_embed, $tb_base, $tb_options;
    /* Get Local Video */
    $local_video = $tb_base->getShortcodeFromContent('video', get_the_content());

    /* Get Youtobe or Vimeo */
    $remote_video = $tb_base->getShortcodeFromContent('embed', get_the_content());

    if($local_video){
        /* view local. */
        return do_shortcode($local_video);

    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        return do_shortcode($wp_embed->run_shortcode($remote_video));;

    }
    return false;
}

/**
 * Gallerry Images
 *
 * @author Themebears
 * @since 1.0.0
 * @param string $image_size
 * @return bool|string
 */
function tb_archive_gallery($image_size = 'full'){
    global $tb_base, $tb_options;
    /* get shortcode gallery. */
    $shortcode = $tb_base->getShortcodeFromContent('gallery', get_the_content());
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if(!empty($ids)){

            $array_id = explode(",", $ids[1]);
            ob_start();
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, $image_size, false);
                        if($attachment_image[0] != ''):?>
                            <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                                <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                            </div>
                            <?php $i++; endif; ?>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php

            return ob_get_clean();

        } else {
            return false;
        }
    }elseif( has_post_thumbnail()) {
        return get_the_post_thumbnail($image_size);
    }
    return false;
}

/**
 * Quote Text.
 *
 * @author Themebears
 * @since 1.0.0
 */
function tb_archive_quote() {
    global $tb_options;
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if(!empty($blockquote[0])){
        return do_shortcode($blockquote[0]);
    }
    return false;
}

/**
 * Post link
 *
 * @author Themebears
 * @since 1.0.0
 */
function tb_archive_link() {
    /* get text. */
    preg_match("/<a(.*)href=\"(.*)\"(.*)<\/a>/", get_the_content(), $link);
    if(!empty($link[0])){
        return do_shortcode($link[0]);
    }
    return false;
}

/**
 * Get icon from post format.
 *
 * @return multitype:string Ambigous <string, mixed>
 * @author Themebears
 * @since 1.0.0
 */
function tb_archive_post_icon() {
    $post_icon = array('icon'=>'fa fa-file-text-o','text'=>__('STANDARD', 'leonard'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-camera-retro';
            $post_icon['text'] = __('GALLERY', 'leonard');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = __('LINK', 'leonard');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = __('QUOTE', 'leonard');
            break;
        case 'video':
            $post_icon['icon'] = 'fa fa-youtube-play';
            $post_icon['text'] = __('VIDEO', 'leonard');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-volume-up';
            $post_icon['text'] = __('AUDIO', 'leonard');
            break;
        default:
            $post_icon['icon'] = 'fa fa-image';
            $post_icon['text'] = __('STANDARD', 'leonard');
            break;
    }
    echo do_shortcode('<i class="'.$post_icon['icon'].'"></i>');
}

/**
 * Get social share link
 *
 * @return string
 * @author Themebears
 * @since 1.0.0
 */

function tb_social_share() {
    ?>
    <ul class="social-list">
        <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
        <li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
        <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
        <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
    </ul>
<?php
}

/**
 * Load a template part into a template
 *
 * Makes it easy for a theme to reuse sections of code in a easy to overload way
 * for child themes.
 *
 * Includes the named template part for a theme or if a name is specified then a
 * specialised part will be included. If the theme contains no {slug}.php file
 * then no template will be included.
 *
 * The template is included using require, not require_once, so you may include the
 * same template part multiple times.
 *
 * For the $name parameter, if the file is called "{slug}-special.php" then specify
 * "special".
 *
 * For the var parameter, simple create an array of variables you want to access in the template
 * and then access them e.g.
 *
 * array("var1=>"Something","var2"=>"Another One","var3"=>"heres a third";
 *
 * becomes
 *
 * $var1, $var2, $var3 within the template file.
 *
 * @since 3.0.0
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 * @param array $vars The list of variables to carry over to the template
 * @author Eugene Agyeman zmastaa.com
 */
function tb_get_template_part( $slug, $name = null, $atts = null ) {
    /**
     * Fires before the specified template part file is loaded.
     *
     * The dynamic portion of the hook name, `$slug`, refers to the slug name
     * for the generic template part.
     *
     * @since 3.0.0
     *
     * @param string $slug The slug name for the generic template.
     * @param string $name The name of the specialized template.
     * @param array $vars The list of variables to carry over to the template
     */
    do_action( "get_template_part_{$slug}", $slug, $name );

    $templates = array();
    $name = (string) $name;
    if ( '' !== $name )
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    foreach ($templates as $template){
        locate_template($template, true, false);
    }
}
function tb_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'leonard' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'leonard' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
/* Filter Products */
add_action( 'wp_ajax_nopriv_tb_listener', 'tb_listener' );
add_action( 'wp_ajax_tb_listener', 'tb_listener' );
/**
 * Widget ajax listener
 */
function tb_listener(){
	global $wp_query, $wp_rewrite;
	add_filter( 'post_class', 'add_product_class' );
	add_filter( 'woocommerce_pagination_args', 'pagination_args' );

	$args = apply_filters( 'tb_listener_wp_query_args', array() );

	if( ! isset($args['post__in']) ) {
		$args['post__in'] = array();
	}
	$woocommerce_hide_out_of_stock_items = BeRocket_AAPF_Widget::woocommerce_hide_out_of_stock_items();
	if( $woocommerce_hide_out_of_stock_items == 'yes' ) {
		$args['post__in'] = BeRocket_AAPF::remove_out_of_stock( $args['post__in'] );
	}
	$args['post__in'] = BeRocket_AAPF::remove_hidden( $args['post__in'] );

	$args['post__in'] = BeRocket_AAPF::limits_filter( $args['post__in'] );
	$args['post__in'] = BeRocket_AAPF::price_filter( $args['post__in'] );
	$args['post_status'] = 'publish';
	$args['post_type'] = 'product';
	$args['post__in'] = BeRocket_AAPF::price_filter( $args['post__in'] );
	$default_posts_per_page = get_option( 'posts_per_page' );
	$args['posts_per_page'] = apply_filters( 'loop_shop_per_page', $default_posts_per_page );
	unset( $default_posts_per_page );

	$wp_query = new WP_Query( $args );

	// here we get max products to know if current page is not too big
	if ( $wp_rewrite->using_permalinks() and preg_match( "~/page/([0-9]+)~", $_POST['location'], $mathces ) or preg_match( "~paged?=([0-9]+)~", $_POST['location'], $mathces ) ) {
		$args['paged'] = min( $mathces[1], $wp_query->max_num_pages );
		$wp_query = new WP_Query( $args );
	}
	unset( $args );
	ob_start();

	if ( $wp_query->have_posts() ) {

		do_action('woocommerce_before_shop_loop');

		woocommerce_product_loop_start();
		woocommerce_product_subcategories();

		while ( have_posts() ) {
			the_post();
			wc_get_template_part( 'content', 'product' );
		}

		woocommerce_product_loop_end();

		do_action('woocommerce_after_shop_loop');

		wp_reset_postdata();

		$_RESPONSE['products'] = ob_get_contents();
	} else {
		wc_get_template( 'loop/no-products-found.php' );

		$_RESPONSE['no_products'] = ob_get_contents();
	}
	ob_end_clean();

	echo json_encode( $_RESPONSE );

	die();
}