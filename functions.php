<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

// Disable plugin auto-update email notification
add_filter('auto_plugin_update_send_email', '__return_false');
 
// Disable theme auto-update email notification
add_filter('auto_theme_update_send_email', '__return_false');

// Disable WordPress core auto-update email notification
add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );
function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
	if ( ! empty( $type ) && $type == 'success' ) {
		return false;
	}
	return true;
}
