<?php
/*
Plugin Name: Divi Custom Mixpanel Button
Description: A custom module for Divi that adds a Mixpanel tracking button.
Version: 1.0
Author: Your Name
*/

function divi_custom_mixpanel_button_module() {
    if ( ! class_exists( 'ET_Builder_Module' ) ) {
        return;
    }

    class ET_Builder_Module_Mixpanel_Button extends ET_Builder_Module {
        public $slug       = 'et_pb_mixpanel_button';
        public $vb_support = 'on';

        public function init() {
            $this->name = esc_html__( 'Mixpanel Button', 'et_builder' );
        }

        public function get_fields() {
            $fields = array(
                'button_text' => array(
                    'label'           => esc_html__( 'Button Text', 'et_builder' ),
                    'type'            => 'text',
                    'option_category' => 'basic_option',
                    'description'     => esc_html__( 'Enter the text for your button.', 'et_builder' ),
                    'toggle_slug'     => 'main_content',
                ),
                'mixpanel_event' => array(
                    'label'           => esc_html__( 'Mixpanel Event', 'et_builder' ),
                    'type'            => 'text',
                    'option_category' => 'basic_option',
                    'description'     => esc_html__( 'Enter the Mixpanel event name to track.', 'et_builder' ),
                    'toggle_slug'     => 'main_content',
                ),
            );
            return $fields;
        }

        public function render( $attrs, $content = null, $render_slug ) {
            $button_text = $this->props['button_text'];
            $mixpanel_event = $this->props['mixpanel_event'];

            $output = sprintf(
                '<button class="et_pb_button et_pb_custom_mixpanel_button" data-mixpanel-event="%1$s">%2$s</button>',
                esc_attr( $mixpanel_event ),
                esc_html( $button_text )
            );

            // Enqueue Mixpanel script
            wp_enqueue_script( 'mixpanel', 'https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js', array(), null, true );

            // Enqueue custom script for the Mixpanel button
            wp_register_script( 'et_pb_mixpanel_button', plugin_dir_url( __FILE__ ) . 'mixpanel-button.js', array( 'jquery' ), '1.0', true );
            wp_enqueue_script( 'et_pb_mixpanel_button' );

            return $output;
        }
    }

    new ET_Builder_Module_Mixpanel_Button;
}

add_action( 'et_builder_ready', 'divi_custom_mixpanel_button_module' );
