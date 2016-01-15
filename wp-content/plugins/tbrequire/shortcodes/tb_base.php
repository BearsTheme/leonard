<?php

/**
 * Base shortcode for all LessTheme Shortcodes
 */

class TbShortcode extends WPBakeryShortCode {

    protected function loadTemplate($atts, $content = null) {
        $output = '';
        $tb_template = isset($atts['tb_template']) ? $atts['tb_template'] : $this->shortcode.'.php';
        $files = $this->findShortcodeTemplates();
        if ($tb_template && isset($files[$tb_template])) {
            $this->setTemplate($files[$tb_template]->uri);
        } else {
            $this->findShortcodeTemplate();
        }
        if (!is_null($content))
            $content = apply_filters('vc_shortcode_content_filter', $content, $this->shortcode);
        if ($this->html_template) {
            ob_start();
            include( $this->html_template );
            $output = ob_get_contents();
            ob_end_clean();
        } else {
            trigger_error(sprintf(__('Template file is missing for `%s` shortcode. Make sure you have `%s` file in your theme folder.', 'js_composer'), $this->shortcode, 'wp-content/themes/your_theme/vc_templates/' . $this->shortcode . '.php'));
        }
        return apply_filters('vc_shortcode_content_filter_after', $output, $this->shortcode);
    }

    /**
     * 
     * @return Array(): array of all avaiable templates
     */
    protected function findShortcodeTemplates() {
        $theme_dir = get_template_directory() . '/vc_templates';
        $reg = "/^({$this->shortcode}\.php|{$this->shortcode}--.*\.php)/";
        $files = tbFileScanDirectory($theme_dir, $reg);
        $files = array_merge(tbFileScanDirectory(TB_TEMPLATES, $reg), $files);
        return $files;
    }

}
