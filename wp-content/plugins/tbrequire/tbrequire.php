<?php
/**
*
* Plugin Name: Tbrequire
* Plugin URI: http://themebears.com
* Description: This plugin is package compilation some addons, which is developed by THEMEBEARS Team for Visual Comporser plugin.
* Version: 1.0.5
* Author: Themebears
* Author URI: http://themebears.com
* Copyright 2015 themebears.com. All rights reserved.
*/

define( 'TB_NAME', 'tbtheme' );
define( 'TB_DIR', plugin_dir_path(__FILE__) );
define( 'TB_URL', plugin_dir_url(__FILE__) );
define( 'TB_LIBRARIES', TB_DIR  . "libraries" . DIRECTORY_SEPARATOR );
define( 'TB_LANGUAGES', TB_DIR . "languages" . DIRECTORY_SEPARATOR );
define( 'TB_TEMPLATES', TB_DIR . "templates" . DIRECTORY_SEPARATOR );
define( 'TB_INCLUDES', TB_DIR . "includes" . DIRECTORY_SEPARATOR );

define( 'TB_CSS', TB_URL . "assets/css/" );
define( 'TB_JS', TB_URL . "assets/js/" );
define( 'TB_IMAGES', TB_URL . "assets/images/" );
/**
* Require functions on plugin
*/
require_once TB_INCLUDES . "functions.php";
/**
* Use ThemeBearsCore class
*/
new ThemeBearsCore();
/**
* Themebears Class
* 
*/
class ThemeBearsCore{
	public function __construct(){
		/**
		* Init function, which is run on site init and plugin loaded
		*/
		add_action('plugins_loaded', array( $this, 'tbActionInit'));
		add_filter('style_loader_tag', array( $this, 'tbValidateStylesheet'));
		
		/**
		* Enqueue Scripts on plugin
		*/
		add_action('wp_enqueue_scripts', array( $this, 'tb_register_style'));
		add_action('wp_enqueue_scripts', array( $this, 'tb_register_script'));
		add_action('admin_enqueue_scripts', array( $this, 'tb_admin_script'));
		/**
		* Ajax Dummy Data
		*/
		add_action( 'wp_ajax_tbdummy', array( $this, 'tb_ajax_tbdummy'));
		/**
		* Visual Composer action
		*/
		add_action('vc_before_init', array($this, 'tbShortcodeRegister'));
		add_action('vc_after_init', array($this, 'tbShortcodeAddParams'));
		/**
		* widget text apply shortcode
		*/
		add_filter('widget_text', 'do_shortcode');
	}
	function tbActionInit(){
	    // Localization
	    load_plugin_textdomain(TB_NAME, false, TB_LANGUAGES);
	}
	function tbShortcodeRegister() {
	    //Load required libararies
	    require_once TB_INCLUDES . 'tb_shortcodes.php';
	}

    /**
     * Add Shortcode Params
     *
     * @return none
     */
    function tbShortcodeAddParams(){
        $extra_params_folder = get_template_directory() . '/vc_params';
        $files = tbFileScanDirectory($extra_params_folder,'/^tb_.*\.php/');
        if(!empty($files)){
            foreach($files as $file){
                if(WPBMap::exists($file->name)){
                    include $file->uri;
                    if(isset($params) && is_array($params)){
                        foreach($params as $param){
                            if(is_array($param)){
                                $param['group'] = __('Template', TB_NAME);
                                $param['edit_field_class'] = isset($param['edit_field_class'])? $param['edit_field_class'].' tb_custom_param vc_col-sm-12 vc_column':'tb_custom_param vc_col-sm-12 vc_column';
                                $param['class'] = 'tb-extra-param';
                                if(isset($param['template']) && !empty($param['template'])){
                                    if(!is_array($param['template'])){
                                        $param['template'] = array($param['template']);
                                    }
                                    $param['dependency'] = array("element"=>"tb_template", "value" => $param['template']);

                                }
                                vc_add_param($file->name, $param);
                            }
                        }
                    }
                }
            }
        }
    }
	/**
	* Function register stylesheet on plugin
	*/
	function tb_register_style(){
		wp_enqueue_style('tb-plugin-stylesheet', TB_CSS. 'tb-style.css');
		wp_enqueue_style('tb-custom_vc_layout', TB_CSS. 'custom_vc_layout.css');
		$mobile = (strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'webOS') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad') || wp_is_mobile()) ? true : false;
		if($mobile){
			wp_dequeue_style('js_composer_front');
			wp_deregister_style('js_composer_front');
			wp_enqueue_style( 'tb_js_composer_front',TB_CSS. 'js_composer.css');
		}
	}
	/**
	 * replace rel on stylesheet (Fix validator link style tag attribute)
	 */
	function tbValidateStylesheet($src) {
	    if(strstr($src,'widget_search_modal-css')||strstr($src,'owl-carousel-css') || strstr($src,'vc_google_fonts')){
	        return str_replace('rel', 'property="stylesheet" rel', $src);
	    }
	    else{
	        return $src;
	    }
	}
	/**
	* Function register script on plugin
	*/
	function tb_register_script(){
		wp_register_script('modernizr', TB_JS. 'modernizr.min.js', array('jquery'));
		wp_register_script('waypoints', TB_JS. 'waypoints.min.js', array('jquery'));
		wp_register_script('imagesloaded', TB_JS. 'jquery.imagesloaded.js', array('jquery'));
		wp_register_script('jquery-shuffle', TB_JS . 'jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
		wp_register_script('tb-jquery-shuffle', TB_JS. 'jquery.shuffle.tb.js', array('jquery-shuffle'));
        wp_register_script('tb-masonry', TB_JS. 'tb.masonry.js', array('jquery-shuffle', 'jquery-ui-resizable'));
        wp_register_script('tb-masonry-admin', TB_JS. 'tb.masonry.admin.js', array('tb-masonry'));
        wp_register_style('tb-jquery-ui', TB_CSS . 'jquery-ui.css', array(), '1.2.0');

    }
	function tb_admin_script(){
		wp_register_script('tb-dummy-data', TB_JS. 'dummy.tb.js', array(),'1.0.0',true);
		wp_enqueue_style('tb-dummy-data-css', TB_CSS. 'dummy.tb.css', '','1.0.0','all');
		wp_enqueue_style('tb-custom_vc_layout_admin', TB_CSS. 'custom_vc_layout_admin.css', '','1.0.0','all');
		wp_enqueue_script('tb-dummy-data');
		wp_enqueue_style('tbtheme-font-stroke7', TB_CSS . 'Pe-icon-7-stroke.css', array(), '1.2.0');
	}
	/**
	* Ajax Function Dummy Data
	*/
	function tb_ajax_tbdummy(){
		require_once TB_INCLUDES . 'tb_dummy.php';
    	tbDummyData();
	}
}
?>