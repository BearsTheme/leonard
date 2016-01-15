<?php
add_shortcode_param('tb_template_img', 'tb_shortcode_template_img');

function tb_shortcode_template_img($settings, $value) {
    $shortcode = $settings['shortcode'];
    $theme_dir = get_template_directory() . '/vc_templates';
    $reg = "/^({$shortcode}\.php|{$shortcode}--.*\.php)/";
    $files = tbFileScanDirectory($theme_dir, $reg);
    $files = array_merge(tbFileScanDirectory(TB_TEMPLATES, $reg), $files);
    $output = "";
    $output .= "<select style=\"display:none;\" id=\"".$shortcode."-select-param\" name=\"" . esc_attr($settings['param_name']) . "\" class=\"wpb_vc_param_value\">";
    foreach ($files as $key => $file) {
        if ($key == esc_attr($value)) {
            $output .= "<option value=\"{$key}\" selected>{$key}</option>";
        } else {
            $output .= "<option value=\"{$key}\">{$key}</option>";
        }
    }
    $output .= "</select>";
    $output .= "<div id=\"".$shortcode."-tb-img-select\">";
    foreach ($files as $key => $file) {
        $img = get_template_directory_uri().'/vc_params/'.$shortcode.'/'.basename($key,'.php').'.jpg';
        if ($key == esc_attr($value)) {
            $output .= "<img src=\"".$img."\" data-value=\"".$key."\" class=\"tb-img-select selected\" />";
        } else {
            $output .= "<img src=\"".$img."\" data-value=\"".$key."\" class=\"tb-img-select\" />";
        }
    }
    $output .= "</div>";
    $script = '
    <script type="text/javascript">
        jQuery(\'button.vc_panel-btn-save[data-save=true]\').click(function(){
            jQuery(\'.tb_custom_param.vc_dependent-hidden\').remove();
        });
        jQuery(document).ready(function($){
            $("#'.$shortcode.'-tb-img-select").find("img.tb-img-select").click(function(){
                var $this = $(this);
                $("#'.$shortcode.'-tb-img-select").find("img.tb-img-select").removeClass("selected");
                $this.addClass("selected");console.log($(":hidden#'.$shortcode.'-select-param"));
                $(":hidden#'.$shortcode.'-select-param").val($this.data("value")).change();
            });
        });
    </script>';
    return $output.$script;
}
?>