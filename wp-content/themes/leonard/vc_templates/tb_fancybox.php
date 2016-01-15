<?php
$uqid = uniqid();
$class_link = 'tb-fancyboxes-' . $uqid;
?>
<div class="<?php echo esc_attr($class_link); ?> tb-fancyboxes-wraper tb-fancybox-layout-default <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php if ($atts['title'] != ''): ?>
        <div class="tb-fancyboxes-head">
            <div class="tb-fancyboxes-title">
                <?php echo apply_filters('the_title', $atts['title']); ?>
            </div>
            <div class="tb-fancyboxes-description">
                <?php echo apply_filters('the_content', $atts['description']); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="tb-fancyboxes-body">
        <div class="row">
            <?php
            $columns = ((int)$atts['tb_cols']) ? (int)$atts['tb_cols'] : 1;
            $class_bootstrap = "";
            switch ($columns) {
                case "1 Column":
                    $class_bootstrap = "";
                    break;
                case "2 Columns":
                    $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-6";
                    break;
                case "3 Columns":
                    $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
                    break;
                case "4 Columns":
                    $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-3";
                    break;
                case "6 Columns":
                    $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-2";
                    break;

                default:
                    $class_bootstrap = "";
                    break;
            }

            $tb_title_size = isset($atts['tb_title_size']) ? $atts['tb_title_size'] : 'h2';
            $text_more_info = isset($atts['text_more_info']) ? $atts['text_more_info'] : '';
            $text_more_info_color = isset($atts['text_more_info_color']) ? $atts['text_more_info_color'] : '';
            $text_more_info_color_hover = isset($atts['text_more_info_color_hover']) ? $atts['text_more_info_color_hover'] : '';
            $button_more_info = isset($atts['button_more_info']) ? $atts['button_more_info'] : '';
            $button_more_info_border_color = isset($atts['button_more_info_border_color']) ? $atts['button_more_info_border_color'] : '';
            $button_more_info_border_color_hover = isset($atts['button_more_info_border_color_hover']) ? $atts['button_more_info_border_color_hover'] : '';
            $button_more_info_bg_color = isset($atts['button_more_info_bg_color']) ? $atts['button_more_info_bg_color'] : '';
            $button_more_info_bg_color_hover = isset($atts['button_more_info_bg_color_hover']) ? $atts['button_more_info_bg_color_hover'] : '';
            $tb_fancybox_icon_color = isset($atts['tb_fancybox_icon_color']) ? $atts['tb_fancybox_icon_color'] : '';
            $tb_fancybox_title_color = isset($atts['tb_fancybox_title_color']) ? $atts['tb_fancybox_title_color'] : '';
            $tb_fancybox_content_color = isset($atts['tb_fancybox_content_color']) ? $atts['tb_fancybox_content_color'] : '';

            $item_class = 'tb-fancy-box-item ' . $class_bootstrap;

            for ($i = 1; $i <= $columns; $i++) : ?>
                <?php if ($i != 5):
                $icon = isset($atts['icon' . $i]) ? $atts['icon' . $i] : '';
                $content = isset($atts['description' . $i]) ? $atts['description' . $i] : '';
                $image = isset($atts['image' . $i]) ? $atts['image' . $i] : '';
                $title = isset($atts['title' . $i]) ? $atts['title' . $i] : '';
                $button_link = isset($atts['button_link' . $i]) ? $atts['button_link' . $i] : '';
                $image_url = '';
                if (!empty($image)) {
                    $attachment_image = wp_get_attachment_image_src($image, 'full');
                    $image_url = $attachment_image[0];
                }

                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="tb-fancybox-inner">
                        <?php if ($image_url): ?>
                            <div class="tb-fancy-box-image">
                                  <span>
                                    <img src="<?php echo esc_attr($image_url); ?>" alt=""/>
                                  </span>
                            </div>
                        <?php else: ?>
                            <div class="tb-fancy-box-content-icon">
                                <i class="<?php echo esc_attr($icon); ?>" style="color: <?php echo esc_attr($tb_fancybox_icon_color); ?>;"></i>
                            </div>
                        <?php endif; ?>

                        <?php if ($title): ?>
                            <div class="tb-fancy-box-content-title">
                                <<?php echo esc_attr($tb_title_size); ?> class="tb-fancy-box-title" style="color: <?php echo esc_attr($tb_fancybox_title_color); ?>;"> <?php echo apply_filters('the_title', $title); ?></<?php echo esc_attr($tb_title_size); ?>>
                            </div>
                        <?php endif; ?>
                        <?php if( $content) : ?>
                            <div class="tb-fancy-box-content" style="color: <?php echo esc_attr($tb_fancybox_content_color); ?>;">
                                <?php echo apply_filters('the_content', $content); ?>
                            </div>
                        <?php endif ;?>

                        <?php if ($atts['button_text'] != ''): ?>
                            <div class="tb-fancyboxes-readmore">
                                <?php
                                $class_btn = ($atts['button_type'] == 'button') ? 'btn btn-large' : '';
                                $text_button_color = '';
                                $text_button_color_hover = '';
                                $btn_border_color = '';
                                $btn_bg_color = '';
                                $btn_border_color_hover = '';
                                $btn_bg_color_hover = '';
                                if (($atts['button_type'] == 'text') && $text_more_info == 'yes') {
                                    $text_button_color = $text_more_info_color;
                                    $text_button_color_hover = $text_more_info_color_hover;
                                }
                                if (($atts['button_type'] == 'button') && $button_more_info == 'yes') {
                                    $btn_border_color = $button_more_info_border_color;
                                    $btn_bg_color = $button_more_info_bg_color;
                                    $btn_border_color_hover = $button_more_info_border_color_hover;
                                    $btn_bg_color_hover = $button_more_info_bg_color_hover;
                                }
                                ?>
                                <a style="background-color: <?php echo esc_attr($btn_bg_color); ?>; border-color: <?php echo esc_attr($btn_border_color); ?>; color: <?php echo esc_attr($text_button_color); ?>" href="<?php echo esc_url($button_link); ?>" class="<?php echo esc_attr($class_btn); ?>"><?php echo esc_attr($atts['button_text']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>
<style type="text/css">
    .<?php echo esc_attr($class_link); ?>.tb-fancybox-layout-default .tb-fancyboxes-readmore a:hover {
        color: <?php echo esc_attr($text_button_color_hover); ?> !important;
        border-color: <?php echo esc_attr($btn_border_color_hover); ?> !important;
        background-color: <?php echo esc_attr($btn_bg_color_hover); ?> !important;
    }
</style>