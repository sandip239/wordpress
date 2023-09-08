<?php

/*
Plugin Name: My Elementor Widget
Description: Custom Elementor widget example.
Version: 1.0
Author: Your Name
*/


    // Register your widget here


    
function register_hello_world_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widget-my-custom-widget.php' );

	$widgets_manager->register( new \My_Custom_Widget() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );
