<div class="tb-counter-wraper tb-counter-layout-default <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
	<?php if($atts['title']!=''):?> 
        <div class="tb-counter-head">
            <div class="tb-counter-title">
                <?php echo apply_filters('the_title',$atts['title']);?>
            </div>
            <div class="tb-counter-description">
                <?php echo apply_filters('the_content',$atts['description']);?>
            </div>
        </div>
    <?php endif;?>
    <div class="row tb-counter-body">
        <?php
            $columns = (int)$atts['tb_cols'];
            $item_class = "";
            switch($columns){
                    case "1 Column":
                        $item_class = "";
                        break;
                    case "2 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-6";
                        break;
                    case "3 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
                        break;
                    case "4 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-3";
                        break;
                    case "6 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-2";
                        break;

                    default:
                        $item_class = "";
                        break;
                }
            for($i=1;$i<=$columns;$i++){ ?>
                <?php if($i!=5):?>
                    <?php
                    $title = isset($atts['title'.$i])?$atts['title'.$i]:'';
                    $icon = isset($atts['icon'.$i])?$atts['icon'.$i]:'';
                    $type = isset($atts['type'.$i])?$atts['type'.$i]:'';
                    $suffix = isset($atts['suffix'.$i])?$atts['suffix'.$i]:'';
                    $prefix = isset($atts['prefix'.$i])?$atts['prefix'.$i]:'';
                    $digit = isset($atts['digit'.$i])?$atts['digit'.$i]:'60';
                    $grouping = isset($atts['grouping'])?$atts['grouping']:'false';
                    $separator = isset($atts['separator'])?$atts['separator']:',';
                    $description = isset($atts['description'.$i])?$atts['description'.$i]:'';
                    ?>
                    <div class="<?php echo esc_attr($item_class);?>">
                        <?php if( $icon ): ?>
        					<span class="tb-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></span>
        				<?php endif; ?>
        				<div id="counter_<?php echo esc_attr($atts['html_id'].'_item_'.$i);?>" class="tb-counter <?php echo esc_attr(strtolower($type));?>" data-suffix="<?php echo esc_attr($suffix);?>" data-type="<?php echo esc_attr(strtolower($type));?>" data-digit="<?php echo esc_attr($digit);?>" data-grouping="<?php echo esc_attr($grouping);?>" data-separator="<?php echo esc_attr($separator);?>">
        				</div>
                        <?php if($title):?>
                            <h3><?php echo apply_filters('the_title',$title);?></h3>
                        <?php endif;?>
                        <?php if($description):?>
                            <div class="tb-counter-description"><?php echo apply_filters('the_content',$description);?></div>
                        <?php endif;?>
        			</div>
                <?php endif;?>
            <?php }
        ?>
    </div>
</div>