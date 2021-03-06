<?php
vc_map(
	array(
		"name" => __("TB Grid", TB_NAME),
	    "base" => "tb_grid",
	    "class" => "vc-tb-grid",
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
	            "heading" => __("Layout Type",TB_NAME),
	            "param_name" => "layout",
	            "value" => array(
	            	"Basic" => "basic",
	            	"Masonry" => "masonry",
	            	),
	            "group" => __("Grid Settings", TB_NAME)
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
	            "dependency" => array(
	            	"element" => "layout",
	            	"value" => "masonry"
                ),
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
	            "type" => "tb_template",
	            "param_name" => "tb_template",
	            "shortcode" => "tb_grid",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",TB_NAME),
	            "group" => __("Template", TB_NAME),
	        )
	    )
	)
);
class WPBakeryShortCode_tb_grid extends TbShortcode{
	protected function content($atts, $content = null){
		wp_enqueue_script('tb-grid-pagination',TB_JS.'tbgrid.pagination.js',array('jquery'),'1.0.0',true);
        $html_id = tbHtmlID('tb-grid');
        $source = $atts['source'];
        list($args, $wp_query) = vc_build_loop_query($source);

        $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

	    if($paged > 1){
	    	$args['paged'] = $paged;
	    	$wp_query = new WP_Query($args);
	    }
        $atts['cat'] = isset($args['cat'])?$args['cat']:'';
        /* get posts */
        $atts['posts'] = $wp_query;
        $grid = shortcode_atts(array(
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'layout' => 'basic',
                ), $atts);
        $col_lg = 12 / $grid['col_lg'];
        $col_md = 12 / $grid['col_md'];
        $col_sm = 12 / $grid['col_sm'];
        $col_xs = 12 / $grid['col_xs'];
        $atts['item_class'] = "tb-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "tb-grid";
        $class = isset($atts['class'])?$atts['class']:'';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['tb_template']). ' '. $class;
        if ($grid['layout'] == 'masonry') {
            wp_enqueue_script('tb-jquery-shuffle');
            $atts['grid_class'] .= " tb-grid-{$grid['layout']}";
        }
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>