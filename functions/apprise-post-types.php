<?php
/**
 * Apprise functions and definitions
 *
 * @package Apprise
 */
 // Register custom post types
add_action('init', 'apprise_portfolio_init');
function apprise_portfolio_init() {
	global $data;
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Portfolio'
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			'can_export' => true,
			'show_in_menu' => true,
			'show_ui' => true,
			'show_in_admin_bar' => true,
			'menu_icon' => 'dashicons-portfolio',
		)
	);
	
		register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'query_var' => true, 'rewrite' => true));
		register_taxonomy('portfolio_skills', 'portfolio', array('hierarchical' => true, 'label' => 'Skills', 'query_var' => true, 'rewrite' => true));
}
