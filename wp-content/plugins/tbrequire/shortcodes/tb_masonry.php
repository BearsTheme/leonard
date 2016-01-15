<?php
vc_map(
	array(
		"name" => __("TB Masonry", TB_NAME),
	    "base" => "tb_masonry",
	    "class" => "vc-tb-masonry",
	    "category" => __("ThemeBears Shortcodes", TB_NAME),
	    "params" => array(
	    	array(
	            "type" => "loop",
	            "heading" => __("Source",TB_NAME),
	            "param_name" => "source",
	            'settings' => array(
	                'size' => array('hidden' => false, 'value' => 10),
	                'order_by' => array('value' => 'date')
	            ),
	            "group" => __("Source Settings", TB_NAME),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns XS Devices",TB_NAME),
	            "param_name" => "col_xs",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 1,
	            "group" => __("Grid Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns SM Devices",TB_NAME),
	            "param_name" => "col_sm",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 2,
	            "group" => __("Grid Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns MD Devices",TB_NAME),
	            "param_name" => "col_md",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 3,
	            "group" => __("Grid Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns LG Devices",TB_NAME),
	            "param_name" => "col_lg",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 4,
	            "group" => __("Grid Settings", TB_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Filter on Masonry",TB_NAME),
	            "param_name" => "filter",
	            "value" => array(
                    "Disable" => 0,
	            	"Enable" => 1
	            ),
	            "group" => __("Grid Settings", TB_NAME)
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Grid item margin",TB_NAME),
                "param_name" => "margin",
                "value" => 0,
                "group" => __("Grid Settings", TB_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __("Aspect ratio",TB_NAME),
                "description" => __("The ratio of width to height",TB_NAME),
                "param_name" => "ratio",
                "value" => 0.5,
                "group" => __("Grid Settings", TB_NAME)
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",TB_NAME),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",TB_NAME),
	            "group" => __("Template", TB_NAME)
	        ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Size", TB_NAME),
                "param_name" => "tb_title_size",
                "value" => array(
                    "H2" => "h2",
                    "H3" => "h3",
                    "H4" => "h4",
                    "H5" => "h5",
                    "H6" => "h6"
                ),
                "group" => __("Template", TB_NAME),
            ),
	    	array(
	            "type" => "tb_template",
	            "param_name" => "tb_template",
	            "shortcode" => "tb_masonry",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",TB_NAME),
	            "group" => __("Template", TB_NAME),
	        )
	    )
	)
);
//Masonry settings global
global $tb_masonry;
$tb_masonry = array();
class WPBakeryShortCode_tb_masonry extends TbShortcode{
	protected function content($atts, $content = null){
        $html_id = tbHtmlID('tb-masonry');
        $source = $atts['source'];
        list($args, $wp_query) = vc_build_loop_query($source);
        $atts['cat'] = isset($args['cat']) ? $args['cat']: '';
        /* get posts */
        $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

        if($paged > 1){
            $args['paged'] = $paged;
            $wp_query = new WP_Query($args);
        }

        $atts['posts'] = $wp_query;

        $grid = shortcode_atts(array(
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'layout' => 'basic',
            'margin' => 0,
            'ratio' => 0.5
        ), $atts);

        $atts['item_class'] = "tb-masonry-item";

        $class = isset($atts['class'])?$atts['class']:'';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' '. $class;
        $atts['post_id'] = get_the_ID();
        $atts['html_id'] = $html_id;
        //Masonry Settings
        global $tb_masonry;
        $tb_masonry[$html_id] = array(
            'post_id' => get_the_ID(),
            'grid_margin' => (int)$atts['margin'],
            'grid_ratio' => (float)$atts['ratio'],
            'grid_cols_xs' => (int)$grid['col_xs'],
            'grid_cols_sm' => (int)$grid['col_sm'],
            'grid_cols_md' => (int)$grid['col_md'],
            'grid_cols_lg' => (int)$grid['col_lg'],
        );

        wp_localize_script('tb-masonry', "tbMasonry", $tb_masonry);
        wp_enqueue_script('tb-masonry');

        if( current_user_can( 'manage_options' )  ) {
            wp_enqueue_script('jquery-ui-resizable');
            wp_enqueue_style('tb-jquery-ui');
            wp_enqueue_script('tb-masonry-admin');
        }
		return parent::content($atts, $content);
	}
}

if( !function_exists('tb_masonry_callback') ) {
    /**
     * Masonry Callback Function
     * Using for save item size
     */
    function tb_masonry_callback()
    {

        $postID = $_POST['pid'];
        $id = str_replace('-', '_', $_POST['id']);
        $item = $_POST['item'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        $data = json_encode(array(
            'item' => $item,
            'width' => $width,
            'height' => $height
        ));
		if(is_numeric($postID)):
			$result = get_post_meta($postID, '_tb_masonry_' . $id . $item, true);
			if ($result == '') {
				delete_post_meta($postID, '_tb_masonry_' . $id . $item);
				add_post_meta($postID, '_tb_masonry_' . $id . $item, $data);
			} else {
				update_post_meta($postID, '_tb_masonry_' . $id . $item, $data);
			}
			echo 'masonry';
		else:
			$result = get_option($postID, false);
			if ($result != false) {
				delete_option( $postID );
			}
			add_option( $postID, $data );
			/* echo ($data)."\n";
			echo ($postID)."\n";
			echo get_option($postID); */
		endif;
        die();
    }
}
add_action('wp_ajax_tb_masonry_save', 'tb_masonry_callback');


if( !function_exists('tb_masonry_size') ) {
    /**
     * Get Masonry Item size
     *
     * @return array(width,height)
     */
    function tb_masonry_size($postID, $id, $item) {
        $id = str_replace('-', '_', $id);
        $result = get_post_meta($postID , '_tb_masonry_' . $id  . $item, true);
        if( $result ) {
            return json_decode($result, true);
        }
        return array(
            'width' => 1,
            'height' => 1
        );
    }
}
