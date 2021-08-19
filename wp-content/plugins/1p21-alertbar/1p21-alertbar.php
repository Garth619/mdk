<?php
/*
Plugin Name: iLawyer Alert Bar
Plugin URI: https://www.ilawyermarketing.com/
Description: iLawyer Alert Bar positioned at the top of pages sitewide
Version: 1.0.9
Author: Randy Savage, Derrick Tran, Michael Sorenson & Ruggy
*/


if(is_admin()){
    include 'admin/updater.php';

    $updater = new My_Updater(__FILE__);

    $updater->set_username('1point21interactive');
    $updater->set_repository('1p21-alertbar');
    $updater->authorize('60a32f5e4c9f5834f1a25ba2b4336aa59c57b85f');
    $updater->initialize();
}

/* Check if ACF Pro is installed */
register_activation_hook( __FILE__, 'onep21_alertbar_activate' );
function onep21_alertbar_activate(){

    // Require parent plugin
    if ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) and current_user_can( 'activate_plugins' ) ) {
        // Stop activation redirect and show error
        wp_die('Sorry, but this plugin requires Advanced Custom Fields PRO to be installed and active. Visit plugin page <a href="https://www.advancedcustomfields.com/" target="_blank">here</a>. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }
}

/* Alert Options Admin CSS */
add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
   wp_register_style( '1p21-admin-alertbar', plugin_dir_url( __FILE__ ) . 'css/1p21-alertbar-admin.css' );
   wp_enqueue_style( '1p21-admin-alertbar' );
}

/* Alert Bar CSS/JS Scripts */
add_action('wp_enqueue_scripts', 'onep21_alertbar_scripts');
function onep21_alertbar_scripts() {
    if( get_field('onep21_preset_styles','options') == 'ilawyer' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-ilawyer.css' );
        wp_enqueue_style( '1p21-alertbar' );
    elseif( get_field('onep21_preset_styles','options') == 'canyon' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-canyon.css' );
        wp_enqueue_style( '1p21-alertbar' );
    elseif( get_field('onep21_preset_styles','options') == 'electric' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-electric.css' );
        wp_enqueue_style( '1p21-alertbar' );
    elseif( get_field('onep21_preset_styles','options') == 'graytemper' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-graytempered.css' );
        wp_enqueue_style( '1p21-alertbar' );
    elseif( get_field('onep21_preset_styles','options') == 'irishgold' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-irishgold.css' );
        wp_enqueue_style( '1p21-alertbar' );
    elseif( get_field('onep21_preset_styles','options') == 'fine' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-fine.css' );
        wp_enqueue_style( '1p21-alertbar' );
    elseif( get_field('onep21_preset_styles','options') == 'sospicy' ) :
        wp_register_style( '1p21-alertbar', plugin_dir_url( __FILE__ ) . 'css/alertbar-sospicy.css' );
        wp_enqueue_style( '1p21-alertbar' );
    endif;
    if( get_field('onep21_cookie_to_footer','option') == true):
        wp_enqueue_script( 'js-cookies', plugin_dir_url( __FILE__ ) . 'js/js.cookie.min.js', null, null, true);
    else:
        wp_enqueue_script( 'js-cookies', plugin_dir_url( __FILE__ ) . 'js/js.cookie.min.js', array('jquery'), null, true );
    endif;
}

/* Alert Bar Theme Code */
add_action( 'wp_footer', 'onep21_alertbar' );
function onep21_alertbar() {    
    if( get_field('onep21_enable_alert_bar','option') == true ): 

    /* Custom Alert Bar Styles */ 
    if( get_field('onep21_preset_styles','options') == 'custom'): ?>
    <style type="text/css">
        #onep21-alertbar {
            display: none;
            z-index: 99999;            
            <?php if( get_field('onep21_use_dynamic_height','option') == true && get_field('onep21_dynamic_height','option')): ?>
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            <?php else: ?>
            position: relative;
            <?php endif; ?>
            background: <?php if( have_rows('onep21_alertbar','options') ): while ( have_rows('onep21_alertbar','options') ) : the_row(); ?>
            <?php if ( get_sub_field('background_color')): ?><?php the_sub_field('background_color');?><?php else: ?>#052159<?php endif; ?>
            <?php endwhile; else: endif; ?>;
            color: <?php if( have_rows('onep21_alertbar','options') ): while ( have_rows('onep21_alertbar','options') ) : the_row(); ?>
            <?php if ( get_sub_field('text_color')): ?><?php the_sub_field('text_color');?><?php else: ?>#ffffff<?php endif; ?>
            <?php endwhile; else: endif; ?>;
            <?php /* Display Close Icon */ if( get_field('onep21_close_btn_style','options') == 'icon' ) { ?>padding: 15px 40px 5px 20px;<?php } ?>
            <?php /* Display Close Icon */ if( get_field('onep21_close_btn_style','options') == 'text' ) { ?>padding: 15px 20px 5px;<?php } ?>              
        }

        #onep21-alertbar p {
            text-align: center;
            font-weight: normal;
            line-height: 1.5em;
            margin: 0 0 10px 0;
            padding: 0;
            color: <?php if( have_rows('onep21_alertbar','options') ): while ( have_rows('onep21_alertbar','options') ) : the_row(); ?>
            <?php if ( get_sub_field('text_color')): ?><?php the_sub_field('text_color');?><?php else: ?>#ffffff<?php endif; ?>
            <?php endwhile; else: endif; ?>;
        }

        #onep21-alertbar a {
            text-decoration: underline;
            color: <?php if( have_rows('onep21_alertbar','options') ): while ( have_rows('onep21_alertbar','options') ) : the_row(); ?>
            <?php if ( get_sub_field('hyperlink_color')): ?><?php the_sub_field('hyperlink_color');?><?php else: ?>#4687e6<?php endif; ?>
            <?php endwhile; else: endif; ?>;
        }

        <?php if( get_field('onep21_close_btn_style','options') == 'text' ) { ?>
        #onep21-alertbar .onep21-alertbar-btn {
            display: inline-block;
            padding: 7px 10px;
            text-decoration: none;
            margin: 0 0 0 10px;
            font-size: 0.8em;
            border: <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('border_width')): ?><?php the_sub_field('border_width');?>px solid <?php if ( get_sub_field('border_color')): ?><?php the_sub_field('border_color'); else: ?>#2572ee<?php endif; ?><?php else: ?>none<?php endif; ?>
            <?php endwhile; else: endif; ?>;
            background: <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('background_color')): ?><?php the_sub_field('background_color');?><?php else: ?>#2572ee<?php endif; ?>
            <?php endwhile; else: endif; ?>;            
            color: <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('text_color')): ?><?php the_sub_field('text_color');?><?php else: ?>#ffffff<?php endif; ?>
            <?php endwhile; else: endif; ?>;
            <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('border_radius')): ?>
            -webkit-border-radius: <?php the_sub_field('border_radius');?>px; 
            -moz-border-radius: <?php the_sub_field('border_radius');?>px; 
            border-radius: <?php the_sub_field('border_radius');?>px; 
            <?php endif; endwhile; else: endif; ?>
        }        

        #onep21-alertbar .onep21-alertbar-btn:hover {
            background: <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('background_hover_color')): ?><?php the_sub_field('background_hover_color');?><?php else: ?>none<?php endif; ?>
            <?php endwhile; else: endif; ?>;
            color: <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('hover_text')): ?><?php the_sub_field('hover_text');?><?php else: ?>#ffffff<?php endif; ?>
            <?php endwhile; else: endif; ?>;
            border: <?php if( have_rows('onep21_close_btn','options') ): while ( have_rows('onep21_close_btn','options') ) : the_row(); ?>
            <?php if ( get_sub_field('border_width')): ?><?php the_sub_field('border_width');?>px solid <?php if ( get_sub_field('border_hover_color')): ?><?php the_sub_field('border_hover_color'); else: ?>#2572ee<?php endif; ?><?php else: ?>none<?php endif; ?>
            <?php endwhile; else: endif; ?>;
        }<?php } ?>        

        @media (max-width:700px) {
            <?php /* Display Close Icon */ if( get_field('onep21_close_btn_style','options') == 'icon' ) { ?>
            #onep21-alertbar {
                padding: 15px 40px 5px 20px;
            }
            #onep21-alertbar p {
                text-align: left;
            }
            <?php } ?>  
            <?php if( get_field('onep21_close_btn_style','options') == 'text' ) { ?>
            #onep21-alertbar .onep21-alertbar-btn {
                margin: 10px auto 0;
                display: table;
            }<?php } ?>
        }

        <?php /* Display Close Icon */ if( get_field('onep21_close_btn_style','options') == 'icon' ) { ?>
        #onep21-alertbar .onep21-close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
        }
        #onep21-alertbar .onep21-close-icon svg path {
            fill: <?php if( have_rows('onep21_icon_styles','options') ): while ( have_rows('onep21_icon_styles','options') ) : the_row(); ?>
            <?php if ( get_sub_field('color')): ?><?php the_sub_field('color');?><?php else: ?>#2572ee<?php endif; ?>
            <?php endwhile; else: endif; ?>;
        }
        #onep21-alertbar .onep21-close-icon:hover svg path {
            fill: <?php if( have_rows('onep21_icon_styles','options') ): while ( have_rows('onep21_icon_styles','options') ) : the_row(); ?>
            <?php if ( get_sub_field('hover_color')): ?><?php the_sub_field('hover_color');?><?php else: ?>#FFFFFF<?php endif; ?>
            <?php endwhile; else: endif; ?>;
        }
        <?php } ?>      
    </style>
    <?php else: ?>
    <?php /* Position Absolute if Using Dynamic Height */
        if( get_field('onep21_use_dynamic_height','option') == true && get_field('onep21_dynamic_height','option')): ?>
        <style type="text/css">
            #onep21-alertbar {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        </style>
        <?php endif; ?>        
    <?php endif; ?>

    <?php /* Fixed Bar at Bottom on Mobile */
    if( get_field('onep21_fixed_bottom_mobile','options') == true ) : ?>
        <style type="text/css">
        @media (max-width:1024px) {            
            #onep21-alertbar {
                position: fixed;
                bottom: 0;
                top: unset !important;
                width: 100%;
                z-index: 99999999;
            }
        }
        </style>
    <?php endif; ?>  
    

    <?php if( get_field('onep21_custom_css','options') ): ?>
    <style type="text/css">
        <?php the_field('onep21_custom_css','options'); ?>
    </style>
    <?php endif; ?>

    <!-- Alert Bar Start -->
    <div class="onep21-alertbar" id="onep21-alertbar">
        <p><?php echo get_field('onep21_alertbar_text','option') ?>
           
            <?php // Display Close Button w/Text
            if( get_field('onep21_preset_styles','options') == 'custom' && get_field('onep21_close_btn_style','options') == 'text' ||
                get_field('onep21_preset_styles','options') == 'ilawyer' ||
                get_field('onep21_preset_styles','options') == 'canyon' ||
                get_field('onep21_preset_styles','options') == 'electric' ||
                get_field('onep21_preset_styles','options') == 'graytemper' ||
                get_field('onep21_preset_styles','options') == 'irishgold' ||
                get_field('onep21_preset_styles','options') == 'fine' ||
                get_field('onep21_preset_styles','options') == 'irishgold'): ?>                
                <a href="#" class="onep21-alertbar-btn" id="onep21-close"><?php if ( get_field('onep21_close_text','option')): ?><?php the_field('onep21_close_text','option');?><?php else: ?>Close<?php endif; ?></a>
            <?php endif; ?>

        </p>
        <?php /* Display Close Icon */ 
        if( get_field('onep21_preset_styles','options') == 'custom' && get_field('onep21_close_btn_style','options') == 'icon' || 
            get_field('onep21_preset_styles','options') == 'sospicy'): ?>
            <a href="#" class="onep21-close-icon" id="onep21-close"><svg id="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.1 13.97"><path d="M13.63,1.71,12.29.37,7,5.66,1.71.37.37,1.71,5.66,7,.37,12.29l1.34,1.34L7,8.34l5.29,5.29,1.34-1.34L8.34,7Z"/></svg></a>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function() {
                        
            jQuery(function ($) { 

                $( "#onep21-alertbar" ).prependTo("<?php if ( get_field('onep21_prepend','option')): ?><?php the_field('onep21_prepend','option');?><?php else: ?>body<?php endif; ?>");

                if (!Cookies.get("onep21-alert")) {
                $("#onep21-alertbar").css("display", "block");

                $(window).on("resize", function () {
                    
                    if($('#onep21-alertbar').height() > 60) {
                        $(".onep21-alertbar-btn").css({
                            "display": "table",
                            "margin": "10px auto 0"
                        });
                    }

                    <?php if( get_field('onep21_fixed_bottom_mobile','options') == true && get_field('onep21_use_dynamic_height','option') == true) : ?>
                    if( $(window).width() < 1024) {
                        $("<?php the_field('onep21_dynamic_height','option');?>").removeAttr('style');
                    } else {
                    <?php if( get_field('onep21_use_dynamic_height','option') == true && get_field('onep21_dynamic_height','option')): ?>
                        var divHeight = $('#onep21-alertbar').height(); 
                        $("<?php the_field('onep21_dynamic_height','option');?>").css('margin-top', 20 + divHeight+'px');
                        <?php endif; ?>
                    }
                    <?php else: ?>
                    <?php if( get_field('onep21_use_dynamic_height','option') == true && get_field('onep21_dynamic_height','option')): ?>
                        var divHeight = $('#onep21-alertbar').height(); 
                        $("<?php the_field('onep21_dynamic_height','option');?>").css('margin-top', 20 + divHeight+'px');
                        <?php endif; ?>
                    <?php endif; ?>  

                }).resize();        


                $("#onep21-close").click(function () {
                    Cookies.set('onep21-alert', false, { expires: <?php if ( get_field('onep21_cookie_expiration','option')): ?><?php the_field('onep21_cookie_expiration','option');?><?php else: ?>1<?php endif; ?> })
                    $("#onep21-alertbar").slideUp("slow");
                    <?php if( get_field('onep21_use_dynamic_height','option') == true && get_field('onep21_dynamic_height','option')): ?>
                    $("<?php the_field('onep21_dynamic_height','option');?>").removeAttr('style');
                    <?php endif; ?>
                  });
                }            
            });
            
        });
    </script>
     <!-- Alert Bar End -->

    <?php endif; 
 }

/* Setup ACF Fields for Top Bar */
add_action( 'after_setup_theme', 'onep21_alertbar_after_theme_setup' );

function onep21_alertbar_after_theme_setup() {


    /* Add ACF Alert Bar Options */
    include( plugin_dir_path( __FILE__ ) . 'includes/1p21-alertbar-acf.php');
    
    if( function_exists('acf_add_options_page') ) {
         acf_add_options_page(array(
            'page_title'    => 'iLawyer Alert Bar',
            'menu_title'    => 'iLawyer<br>Alert Bar ',
            'menu_slug'     => 'alertbar-settings',
            'capability'    => 'edit_posts',
            'icon_url'      => 'dashicons-megaphone',
            'redirect'      => false
        ));
    }

}


