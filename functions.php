<?php

// Adding Resources to the Theme (CSS & JS)
function theme_resources() {

	// Adding CSS
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('main', get_template_directory_uri().'/css/dist/main.css');
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Work+Sans:400,300,700');

	// Adding JS
	wp_enqueue_script('main', get_template_directory_uri().'/js/dist/main.js', array(), false, true); // Last argument adds the script in the footer
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

	/* Navigation Menus
		These functions include in the wordpress admin console the option to select the links you want to each menu! */
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu')
	));

	/* Feature Image Support
			This functions adds the option to select a Featured Image from the 'Edit Post' console. */
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');



// Customize Appearence Options
function theme_customize_register($wp_customize) {

	$wp_customize->add_setting('theme_custom_head_html', array(
		'default' => '',
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('theme_custom_body_html', array(
		'default' => '',
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('theme_custom_footer_html', array(
		'default' => '',
		'transport' => 'refresh'
	));


	$wp_customize->add_section('theme_custom_html', array(
		'title' => __('Custom HTML', 'ThemeSlug'),
		'priority' => 30
	));


	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_custom_head_html_control',
		array(
			'label' => __('Head HTML', 'ThemeSlug'),
			'section' => 'theme_custom_html',
			'settings' => 'theme_custom_head_html',
			'type' => 'textarea'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_custom_body_html_control',
		array(
			'label' => __('Body HTML', 'ThemeSlug'),
			'section' => 'theme_custom_html',
			'settings' => 'theme_custom_body_html',
			'type' => 'textarea'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'theme_custom_footer_html_control',
		array(
			'label' => __('Footer HTML', 'ThemeSlug'),
			'section' => 'theme_custom_html',
			'settings' => 'theme_custom_footer_html',
			'type' => 'textarea'
		)
	));



}
add_action('customize_register', 'theme_customize_register');


// Output Custom HTML in Head & Footer
//		obs: Body custom HTML is inserted directly in the header.php file

function themeSlug_customize_head_html() {
	echo get_theme_mod('theme_custom_head_html');
}
add_action('wp_head', 'themeSlug_customize_head_html');

function themeSlug_customize_footer_html() {
	echo get_theme_mod('theme_custom_footer_html');
}
add_action('wp_footer', 'themeSlug_customize_footer_html');