<?php

/**
 * Array presets.
 * 
 * @return multitype:multitype:string
 * @author Fox
 */
function tb_presets()
{
    return array(
        'primary_color',
        'secondary_color',
        'tertiary_color',
    );
}

/**
 * Load presets script.
 */
add_action('admin_enqueue_scripts', 'tb_presets_scripts');

function tb_presets_scripts()
{
    if (isset($_REQUEST['page']) && $_REQUEST['page'] == '_options') {
        wp_register_script('tb-presets', get_template_directory_uri() . '/inc/options/js/presets.js', 'jquery', '1.0.0', TRUE);
        wp_localize_script('tb-presets', 'data_presets', tb_presets());
        wp_enqueue_script('tb-presets');
    }
}

/**
 * Redux saved.
 * Save options generate presets.
 *
 * @author Fox
 */

add_action("redux/options/tb_options/saved", 'tb_preset_save_options');

function tb_preset_save_options()
{
    global $tb_options;
    
    $theme_info = wp_get_theme();
    
    if (isset($tb_options['presets_color'])) {
        $tb_options['presets_color'] = apply_filters( 'zo_presets_color', $tb_options['presets_color'] );
        $preset_name = "_" . 'appmove' . "_preset_" . do_shortcode($tb_options['presets_color']);
        
        $preset_data = array();
        
        $preset_items = zo_presets();
        foreach ($preset_items as $value) {
            $preset_data[$value] = $tb_options[$value];
        }
        
        $preset_data = json_encode($preset_data);
        
        /* update options. */
        update_option($preset_name, $preset_data);
    }
}

/**
 * Ajax get preset options.
 *
 * @author Fox
 */

add_action('wp_ajax_tb_get_preset_options', 'tb_get_preset_options_callback');

function tb_get_preset_options_callback()
{
    header('Content-Type: application/json');
    
    $preset = ! empty($_REQUEST['preset']) ? $_REQUEST['preset'] : '0';
    
    $theme_info = wp_get_theme();
    
    $preset = get_option("_" . do_shortcode($theme_info->get("TextDomain")) . "_preset_" . do_shortcode($preset), null);
    
    die($preset);
}