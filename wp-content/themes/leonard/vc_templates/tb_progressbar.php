<div class="tb-progress-wraper tb-progress-layout-default <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <div class="tb-progress-body">
        <?php
        $item_class = 'tb-progress-item-wrap';
        $item_title = $atts['item_title'];
        $icon = $atts['icon'];
        $show_value = $atts['show_value'];
        $value = $atts['value'];
        $value_suffix = $atts['value_suffix'];
        $bg_color = $atts['bg_color'];
        $color = $atts['color'];
        $width = $atts['width'];
        $height = $atts['height'];
        $border_radius = $atts['border_radius'];
        $vertical = ($atts['mode'] == 'vertical') ? true : false;
        $striped = ($atts['striped'] == 'yes') ? true : false;
        $tb_progress_custom_icon = isset($atts['tb_progress_custom_icon']) ? $atts['tb_progress_custom_icon'] : NULL ;
        $tb_progress_icon_color = isset($atts['tb_progress_icon_color']) ? $atts['tb_progress_icon_color'] : 'inherit';
        $tb_progress_icon_font_size = isset($atts['tb_progress_icon_font_size']) ? $atts['tb_progress_icon_font_size'] : 'inherit';
        $uqid = uniqid();
        ?>
        <div id="tb-progress-<?php echo esc_attr($uqid); ?>" class="<?php echo esc_attr($item_class); ?>">
            <style type="text/css">
                #tb-progress-<?php echo esc_attr(uqid); ?> .tb-progress-main .tb-progress .progress-bar span:before {
                    border-color: <?php echo esc_attr($color);?> transparent transparent;
                }
            </style>
            <div class="tb-progress-main <?php if ($tb_progress_custom_icon) {
                echo 'bar-icon';
            } ?> <?php if ($icon) {
                echo 'bar-icon';
            } ?>">
                <?php if ($tb_progress_custom_icon): ?>
                    <div class="tb-progress-icon">
                        <i class="fa <?php echo esc_attr($tb_progress_custom_icon); ?>"
                           style="color: <?php echo esc_attr($tb_progress_icon_color); ?>;
                               font-size: <?php echo esc_attr($tb_progress_icon_font_size); ?>">
                        </i>
                    </div>
                <?php elseif ($icon): ?>
                    <div class="tb-progress-icon"><i
                            style="color: <?php echo esc_attr($tb_progress_icon_color); ?>;
                                font-size: <?php echo esc_attr($tb_progress_icon_font_size); ?>"
                            class="fa <?php echo esc_attr($icon); ?>"></i></div>
                <?php endif; ?>
                <div class="tb-progress progress <?php if ($vertical) {
                    echo ' vertical bottom';
                } ?> <?php if ($striped) {
                    echo ' progress-striped';
                } ?>"
                     style="background-color:<?php echo esc_attr($bg_color); ?>;
                         width:<?php echo esc_attr($width); ?>;
                         height:<?php echo esc_attr($height); ?>;
                         border-radius:<?php echo esc_attr($border_radius); ?>;
                         border-color: <?php echo esc_attr($color); ?>;">
                    <?php if ($item_title): ?>
                        <div class="tb-progress-title">
                            <?php echo apply_filters('the_title', $item_title); ?>
                        </div>
                    <?php endif; ?>
                    <div id="item-<?php echo esc_attr($atts['html_id']); ?>" class="progress-bar" role="progressbar"
                         data-valuetransitiongoal="<?php echo esc_attr($value); ?>"
                         style="background-color:<?php echo esc_attr($color); ?>; line-height:<?php echo esc_attr($height); ?>;">
                        <?php if ($show_value): ?>
                            <span style="background-color:<?php echo esc_attr($color); ?>;">
                                <strong class="tb-process-bar-counter"><?php echo esc_attr($value);?></strong>
                                <?php echo esc_attr($value_suffix);?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>