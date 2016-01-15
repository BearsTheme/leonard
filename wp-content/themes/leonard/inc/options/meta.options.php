<?php
/**
 * Meta options
 * 
 * @author Themebears
 * @since 1.0.0
 */
class TBMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }
    /* add script */
    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
            
            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }
    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', __('Setting', 'leonard'), 'page');
        $this->add_meta_box('testimonial_options', __('Testimonial about', 'leonard'), 'testimonial');
        $this->add_meta_box('pricing_options', __('Pricing Option', 'leonard'), 'pricing');
        $this->add_meta_box('team_options', __('Team About', 'leonard'), 'team');
        $this->add_meta_box('portfolio_options', __('Portfolio About', 'leonard'), 'portfolio');
    }
    
    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_tb_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }
    /* --------------------- PAGE ---------------------- */
    function template_page_options() {
        global $tb_options;
        ?>
        <div class="tab-container clearfix">
	        <ul class='etabs clearfix'>
	           <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('General', 'leonard'); ?></a></li>
	           <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php _e('Page Title', 'leonard'); ?></a></li>
	           <li class="tab"><a href="#tabs-shop"><i class="fa fa-connectdevelop"></i><?php _e('Shop', 'leonard'); ?></a></li>
	        </ul>
	        <div class='panel-container'>
                <div id="tabs-general">
                <?php
                tb_options(array(
                    'id' => 'full_width',
                    'label' => __('Full Width','leonard'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                ));
				tb_options(array(
					'id' => 'page_logo',
					'label' => __('Logo page','luxary-resort'),
					'type' => 'image'
				));
				tb_options(array(
					'id' => 'presets_color',
					'label' => __('Presets Color','appmove'),
					'type' => 'imegesselect',
					'options' => array(
						'' => THEMEURI.'/inc/options/images/presets/pr-c-1.jpg',
						'1' => THEMEURI.'/inc/options/images/presets/pr-c-2.jpg',
						'2' => THEMEURI.'/inc/options/images/presets/pr-c-3.jpg',
						'3' => THEMEURI.'/inc/options/images/presets/pr-c-4.jpg',
						'4' => THEMEURI.'/inc/options/images/presets/pr-c-5.jpg',
					)
				));
                tb_options(array(
                    'id' => 'primary_color',
                    'label' => __('Primary Color', 'leonard'),
                    'type' => 'color',
                    'default' => ''
                ));
                tb_options(array(
                    'id' => 'secondary_color',
                    'label' => __('Secondary Color', 'leonard'),
                    'type' => 'color',
                    'default' => ''
                ));
                tb_options(array(
                    'id' => 'tertiary_color',
                    'label' => __('Tertiary Color', 'leonard'),
                    'type' => 'color',
                    'default' => ''
                ));
                ?>
                </div>
                <div id="tabs-page-title">
                <?php
                /* page title. */
                tb_options(array(
                    'id' => 'page_title',
                    'label' => __('Page Title','leonard'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_title_enable'))
                ));
                ?> 
				<div id="page_title_enable"><?php
					tb_options(array(
						'id' => 'page_title_text',
						'label' => __('Title','leonard'),
						'type' => 'text',
					));
					tb_options(array(
						'id' => 'page_title_sub_text',
						'label' => __('Sub Title','leonard'),
						'type' => 'text',
					));
					tb_options(array(
						'id' => 'page_title_margin',
						'label' => __('Page Title Margin','leonard'),
						'type' => 'text',
					));
					tb_options(array(
						'id' => 'page_title_background',
						'label' => __('Page Title Background','leonard'),
						'type' => 'image',
					));
					tb_options(array(
						'id' => 'page_title_type',
						'label' => __('Layout','leonard'),
						'type' => 'imegesselect',
						'options' => array(
							'' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
							'1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
							'2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
							'3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
							'4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
							'5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
							'6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
						)
					));
					?>
                </div>
                </div>
				<div id="tabs-shop"><?php
					tb_options(array(
						'id' => 'product_category',
						'label' => __('Product Category','leonard'),
						'type' => 'text',
					));
					?>
                </div>
                </div>
            </div>
        </div>
        <?php
    }
    /* RATING TESTIMONIAL */
    function testimonial_options(){
        ?>
        <div class="testimonial-rating">
            <?php
                tb_options(array(
                    'id' => 'testimonial_position',
                    'label' => __('Client Position','leonard'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- PRICING ---------------------- */

    function pricing_options() {
        ?>
        <div class="pricing-option-wrap">
            <table class="wp-list-table widefat fixed">
                <tr>
                    <td>
                        <?php
						tb_options(array(
                            'id' => 'background',
                            'label' => __('Background Title','leonard'),
                            'type' => 'image',
                        ));
						tb_options(array(
                            'id' => 'subtitle',
                            'label' => __('Sub Title','leonard'),
                            'type' => 'text',
                        ));
                        tb_options(array(
                            'id' => 'price',
                            'label' => __('Price','leonard'),
                            'type' => 'text',
                        ));
						
						tb_options(array(
                            'id' => 'hot',
                            'label' => __('Hot','leonard'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        ));

                        tb_options(array(
                            'id' => 'value',
                            'label' => __('Value','leonard'),
                            'type' => 'select',
                            'options' => array(
                                'Monthly' => 'Monthly',
                                'Year' => 'Year'
                            )
                        ));

                        tb_options(array(
                            'id' => 'icon_font',
                            'label' => __('Icon Font','leonard'),
                            'type' => 'icon'
                        ));

                        tb_options(array(
                            'id' => 'icon_image',
                            'label' => __('Icon Image','leonard'),
                            'type' => 'image'
                        ));

                        tb_options(array(
                            'id' => 'button_url',
                            'label' => __('Button Url','leonard'),
                            'type' => 'text',
                        ));

                        tb_options(array(
                            'id' => 'button_text',
                            'label' => __('Button Text','leonard'),
                            'type' => 'text',
                        ));

                        tb_options(array(
                            'id' => 'is_feature',
                            'label' => __('Is feature','leonard'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        )); ?>
                    </td>
                    <td>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option1',
                                'label' => __('Option 1','leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option1_feature',
                                'label' => __('Option 1 Feature','leonard'),
                                'type' => 'switch',
                                'options' => array('on'=>'1','off'=>''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option2',
                                'label' => __('Option 2', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option2_feature',
                                'label' => __('Option 2 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option3',
                                'label' => __('Option 3', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option3_feature',
                                'label' => __('Option 3 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option4',
                                'label' => __('Option 4', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option4_feature',
                                'label' => __('Option 4 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option5',
                                'label' => __('Option 5', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option5_feature',
                                'label' => __('Option 5 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option6',
                                'label' => __('Option 6', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option6_feature',
                                'label' => __('Option 6 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option7',
                                'label' => __('Option 7', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option7_feature',
                                'label' => __('Option 7 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option8',
                                'label' => __('Option 8', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option8_feature',
                                'label' => __('Option 8 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="tb_metabox_group">
                            <?php
                            tb_options(array(
                                'id' => 'option9',
                                'label' => __('Option 9', 'leonard'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            tb_options(array(
                                'id' => 'option9_feature',
                                'label' => __('Option 9 Feature', 'leonard'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    <?php
    }
    /* --------------------- PRICING ---------------------- */

    /*-----------------------TEAM-------------------------*/
    function team_options() {
        ?>

            <div class="tab-container clearfix">
                <ul class='etabs clearfix'>
                    <li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php _e('Position', 'leonard'); ?></a></li>
                   <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('General', 'leonard'); ?></a></li>
                </ul>
                <div class='panel-container'>
                    <div id="tabs-position">
                        <?php
                        tb_options(array(
                            'id' => 'team_position',
                            'label' => __('Position', 'leonard'),
                            'type' => 'text',
                            'placeholder' => '',
                        ));
                        ?>
                    </div>
                    <div id="tabs-general">
                        <?php
                        tb_options(array(
                            'id' => 'socials',
                            'label' => __('Socials of team','leonard'),
                            'type' => 'social',
                        ));
                        ?>
                    </div>
                </div>
            </div>
        <?php
    }
    /*-----------------------Portfolio-------------------------*/
    function portfolio_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-about"><i class="fa fa-server"></i><?php _e('About', 'leonard'); ?></a></li>
                <li class="tab"><a href="#tabs-layout"><i class="fa fa-server"></i><?php _e('Layout', 'leonard'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-about">
                    <?php
                    tb_options(array(
                        'id' => 'portfolio_client',
                        'label' => __('Client', 'leonard'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    tb_options(array(
                        'id' => 'portfolio_date',
                        'label' => __('Date', 'leonard'),
                        'type' => 'date',
                        'placeholder' => '',
                    ));
                    tb_options(array(
                        'id' => 'portfolio_skills',
                        'label' => __('Skills', 'leonard'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    tb_options(array(
                        'id' => 'portfolio_url',
                        'label' => __('URL', 'leonard'),
                        'type' => 'text',
                        'value' => '#',
                    ));
                    tb_options(array(
                        'id' => 'portfolio_images',
                        'label' => __('Gallery', 'leonard'),
                        'type' => 'images',
                    ));
                    ?>
                </div>
                <div id="tabs-layout">
                    <?php
                    tb_options(array(
                        'id' => 'portfolio_layout',
                        'label' => __('Layout', 'leonard'),
                        'type' => 'select',
                        'options' => array(
                            '' => 'Default',
                            'gallery' => 'Gallery'
                        )
                    ));
                    ?>
                </div>
            </div>
        </div>


        <?php
    }
}

new TBMetaOptions();