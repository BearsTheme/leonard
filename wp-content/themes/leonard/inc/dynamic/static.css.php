<?php
/**
 * Auto create .css file from Theme Options
 * @author Themebears
 * @version 1.0.0
 */
class Themebears_StaticCss
{

    public $scss;

    function __construct()
    {
        global $tb_options;

        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($tb_options['dev_mode']) && $tb_options['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $tb_options, $tb_meta, $post;
        if (! empty($tb_options)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */
            
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644 ) ) {
				_e( 'Error saving file!', 'leonard' );
			}

            /* minimize CSS styles */
            if (!$tb_options['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            
            $css = $this->scss_render();
            
            $file = "static.css";			
			$presets = isset($tb_options['presets_color'])? $tb_options['presets_color']: '';
			/* Load static css*/
			if(isset($tb_meta->_tb_presets_color) && $tb_meta->_tb_presets_color){
				$presets = $tb_meta->_tb_presets_color;
			}
			if($presets){
				$file = "presets-{$presets}.css";	
			}
            /* write static.css file */
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/css/' . $file, $css, 0644) ) {
				_e( 'Error saving file!', 'leonard' );
			}
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $tb_options, $tb_base, $tb_meta;
        ob_start();
        /* local fonts */
        $tb_base->setTypographyLocal($tb_options['local-fonts-1'], $tb_options['local-fonts-selector-1']);
        $tb_base->setTypographyLocal($tb_options['local-fonts-2'], $tb_options['local-fonts-selector-2']);
		$primary_color = isset($tb_options['primary_color'])?$tb_options['primary_color']:'#e54e5d';
		$primary_color = ( isset($tb_meta->_tb_primary_color) && !empty($tb_meta->_tb_primary_color) ) ? $tb_meta->_tb_primary_color : $primary_color;
		$secondary_color = isset($tb_options['secondary_color'])?$tb_options['secondary_color']:'#cd3342';
		$tertiary_color = isset($tb_options['tertiary_color'])?$tb_options['tertiary_color']:'#f5f8fa';
		tb_setvariablescss($primary_color,'$primary_color','#e54e5d');
		tb_setvariablescss($secondary_color,'$secondary_color','#cd3342');
		tb_setvariablescss($tertiary_color,'$tertiary_color','#f5f8fa');
		tb_setvariablescss($tb_options['link_color']['regular'],'$link_color','#707070');
		tb_setvariablescss($tb_options['link_color']['hover'],'$link_color_hover','#e54e5d');
		tb_setvariablescss($tb_options['header_height']['height'],'$header_height','');
		tb_setvariablescss($tb_options['main_logo_height']['height'],'$main_logo_height','');
		tb_setvariablescss($tb_options['menu_sticky_height']['height'],'$menu_sticky_height','');
		tb_setvariablescss($tb_options['sticky_logo_height']['height'],'$sticky_logo_height','');
		tb_setvariablescss($tb_options['menu_color_first_level'], '$menu_color_first_level','');
        /* ==========================================================================
           Start Header
        ========================================================================== */
        /* Header Top */
        if($tb_options['header_margin']){
            echo "body.admin-bar #tb-header.tb-header-1 { margin-top: calc(".esc_attr($tb_options['header_margin']['margin-top'])." + 32px );}";
        }
        /* End Header Top */

        /* Header Main */
        if($tb_options['header_height']){
            echo "#tb-header-logo a { line-height: \$header_height; }";
        };
        if($tb_options['main_logo_height']){
            echo "#tb-header-logo a img { max-height: \$main_logo_height; }";
        }
        if(!empty($tb_options['bg_header']['rgba'])) {
            echo "#tb-header { background-color:".esc_attr($tb_options['bg_header']['rgba'])."; }";
        }
        /* End Header Main */

        /* Sticky Header */
        if(!$tb_options['menu_transparent'] && $tb_options['menu_sticky_height']['height']){
            echo "body.fixed-margin-top {  margin-top: \$menu_sticky_height; }";
        }
        if(!empty($tb_options['bg_sticky_header'])){
            echo "#tb-header.tb-main-header.header-fixed { background-color:".esc_attr($tb_options['bg_sticky_header']['rgba'])."; }";
        }
        if($tb_options['sticky_logo_height']){
            echo "#tb-header.header-fixed #tb-header-logo a img { max-height: \$sticky_logo_height; }";
        }
        if($tb_options['menu_sticky_height']['height']){
            echo "#tb-header.header-fixed #tb-header-logo a,
			#tb-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li { line-height: \$menu_sticky_height; }";
        }
        /* End Sticky Header */
        /* Main Menu */
        echo '@media(min-width: 992px) {';
			if( isset($tb_options['menu_position']) && $tb_options['menu_position'] != '' ) {
				echo "#tb-header-navigation .main-navigation .menu-main-menu,
				#tb-header-navigation .main-navigation div.nav-menu > ul {
					text-align: ".esc_attr($tb_options['menu_position']).";
				}";
			}
			if($tb_options['menu_color_first_level']){
				echo "#tb-header-navigation .main-navigation .menu-main-menu > li > a,
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li > a {
					color:".esc_attr($tb_options['menu_color_first_level']).";
					//line-height: \$header_height;
				}";
			}
			if($tb_options['menu_color_first_level']){
				echo "#tb-header-navigation .main-navigation .menu-main-menu > li.menu-item-has-children > .tb-menu-toggle {
				color:".esc_attr($tb_options['menu_color_first_level']).";
				}";
			}
			if($tb_options['header_height']){
				echo "#tb-header-navigation .main-navigation .menu-main-menu > li, 
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li {
					//line-height: \$header_height;
				}";
			}
			if($tb_options['menu_color_hover_first_level']){
				echo "#tb-header-navigation .main-navigation .menu-main-menu > li > a:hover,
				#tb-header-navigation .main-navigation .menu-main-menu >ul > li > a:hover {
					color:".esc_attr($tb_options['menu_color_hover_first_level']).";
				}";
			}
			if($tb_options['menu_color_active_first_level']){
				echo "#tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
				#tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
				#tb-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
				#tb-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a,
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-item > a,
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-ancestor > a,
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_item > a,
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_ancestor > a {
					color:".esc_attr($tb_options['menu_color_active_first_level']).";
				}";
			}
			if($tb_options['menu_first_level_uppercase']){
				echo "#tb-header-navigation .main-navigation .menu-main-menu > li > a,
				#tb-header-navigation .main-navigation .menu-main-menu > ul > li > a {
					text-transform: uppercase;
				}";
			}
        echo '}';
        /* End Main Menu */

        /* Main Menu Header Fixed Only Page */
        if($tb_options['menu_color_first_level']){
            echo "#tb-header.tb-main-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li > a {
				color:".esc_attr($tb_options['menu_color_first_level']).";
			}";
        }
        if($tb_options['menu_color_hover_first_level']){
            echo "#tb-header.tb-main-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li > a:hover {
				color:".esc_attr($tb_options['menu_color_hover_first_level']).";
			}";
        }
        if($tb_options['menu_color_active_first_level']){
            echo "#tb-header.tb-main-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
			#tb-header.tb-main-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
			#tb-header.tb-main-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
			#tb-header.tb-main-header.header-fixed #tb-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a {
				color:".esc_attr($tb_options['menu_color_active_first_level']).";
			}";
        }
        /* End  Main Menu Header Fixed Only Page */
        /* Sub Menu */
        if(!empty($tb_options['menu_color_sub_level'])){
            echo "#tb-header-navigation .main-navigation .menu-main-menu > li ul li > a,
			#tb-header-navigation .main-navigation .menu-main-menu > ul > li ul li .tb-menu-toggle {
				color:".esc_attr($tb_options['menu_color_sub_level']).";
			}";
        }
        if(!empty($tb_options['menu_border_color_bottom'])){
            echo "#tb-header-navigation .main-navigation li ul li a {
				border-bottom: 1px solid ".esc_attr($tb_options['menu_item_border_color']).";
			}";
        }
        /* End Sub Menu */

        /* ==========================================================================
           End Header
        ========================================================================== */
        /* ==========================================================================
           Start Footer
        ========================================================================== */
        /* Footer Top */
        if($tb_options['footer_heading_color']){
            echo "#tb-footer-top .wg-title:before {
				background-color:".esc_attr($tb_options['footer_heading_color']).";
			}";
        }
        /* End Footer Top */

        /* ==========================================================================
           Start Button
        ========================================================================== */
        /** Button Default **/
        if($tb_options['btn_default_color']){
            echo ".vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .btn, .button, input[type='submit'] {
                    color:".esc_attr($tb_options['btn_default_color']).";
                    background-color:".esc_attr($tb_options['btn_default_bg_color']).";
                    @include border-radius(".esc_attr($tb_options['btn_default_border_radius']['height']).");
                }";
        }
        if($tb_options['btn_default_color_hover']) {
            echo ".vc_general.vc_btn3.btn:hover, button.vc_general.vc_btn3:hover, a.vc_general.vc_btn3:hover, .btn:hover, .button:hover, input[type='submit']:hover,.vc_general.vc_btn3.btn:focus, button.vc_general.vc_btn3:focus, a.vc_general.vc_btn3:focus, .btn:focus, .button:focus, input[type='submit']:focus {
                    color:".esc_attr($tb_options['btn_default_color_hover']).";
                    background-color:".esc_attr($tb_options['btn_default_bg_color_hover']).";
                }";
        }
        /** Button Primary **/
        if($tb_options['btn_primary_color']){
            echo ".vc_general.vc_btn3.btn.btn-primary, .btn.btn-primary {
                    color:".esc_attr($tb_options['btn_primary_color']).";
                    background-color:".esc_attr($tb_options['btn_primary_bg_color']).";
					@include border-radius(".esc_attr($tb_options['btn_primary_border_radius']['height']).");
                }";
        }
        if($tb_options['btn_primary_color_hover']) {
            echo ".vc_general.vc_btn3.btn.btn-primary:hover, .btn.btn-primary:hover,
			.vc_general.vc_btn3.btn.btn-primary:focus, .btn.btn-primary:focus {
				color:".esc_attr($tb_options['btn_primary_color_hover']).";
				background-color:".esc_attr($tb_options['btn_primary_bg_color_hover']).";
			}";
        }
        if($tb_options['button_text_uppercase'] == '1'){
            echo ".btn , button, .button, a.vc_general.vc_btn3, input[type='submit'] {
				text-transform: uppercase;
			}";
        }
        /* ==========================================================================
           End Button
        ========================================================================== */
        return ob_get_clean();
    }
}

new Themebears_StaticCss();