<?php
/*
Plugin Name: Divi Custom Buttons
Plugin URI: https://example.com/divi-custom-buttons
Description: Adds custom buttons to the Divi Visual Builder and triggers Mixpanel tracking events.
Version: 1.0
Author: Your Name
Author URI: https://example.com
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

class Divi_Custom_Buttons
{
    public function __construct()
    {
        add_action('et_builder_ready', array($this, 'enqueue_assets'));
    }

    public function enqueue_assets()
    {
        wp_enqueue_script('mixpanel', '//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js', array(), null, true);
        wp_enqueue_script('divi-custom-buttons', plugin_dir_url(__FILE__) . 'js/divi-custom-buttons.js', array('jquery', 'mixpanel'), '1.0', true);
        wp_localize_script('divi-custom-buttons', 'DiviCustomButtons', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
    }
}

new Divi_Custom_Buttons();
