<?php

// Adding Resources to the Theme (CSS & JS)
function theme_resources() {
	// Adding style.css
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_resources');



// Get Top Ancestor
function get_top_ancestor_id() {
	global $post;
	if($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}

// Does page have children?
function has_children() {
	global $post;
	$pages = get_pages('child_of='.$post->ID);
	return count($pages);
}



// Adding Functionalities to the Theme
function theme_setup() {

	// Navigation Menus
	/*
		These functions include in the wordpress admin console the option to select the links you want to each menu!
	*/
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu')
	));

	// Feature Image Support
	/*
		This functions adds the option to select a Featured Image from the 'Edit Post' console.
	*/
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');