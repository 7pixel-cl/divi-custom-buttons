<?php
/*
Plugin Name: Divi Custom Mixpanel Button
Description: A custom module for Divi that adds a Mixpanel tracking button.
Version: 1.0
Author: Your Name
*/

if ( ! function_exists( 'divi_custom_mixpanel_button_init' ) ) :
    function divi_custom_mixpanel_button_init() {
        if ( class_exists( 'ET_Builder_Module' ) ) {
            require_once( plugin_dir_path( __FILE__ ) . 'includes/modules/MixpanelButton/MixpanelButton.php' );
        }
    }
    add_action( 'divi_extensions_init', 'divi_custom_mixpanel_button_init' );
endif;
