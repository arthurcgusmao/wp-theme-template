<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">

	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<link rel="shortcut icon" href="/favicon.png" />

	<?php wp_head(); // Where WP inserts its plugins and code. ?>
</head>
<body <?php body_class(); ?>>


	<!-- custom Body HTML -->
	<?php echo get_theme_mod('theme_custom_body_html'); ?>
	<!-- /custom Body HTML --> 
	

	<!-- site-header -->
	<header class="site-header">
		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<h5><?php bloginfo('description'); ?></h5>

		<?php
		/* Navigation Menu
				See functions.php also */
			/* To make the current page in a different fashion, simply use the class li.current-menu-item that wordpress adds automatically */
		$args = array(
			'theme_location' => 'primary'
		);
		?>
		<nav class="site-nav">
			<?php wp_nav_menu($args); ?>
		</nav>

		<?php
		/* How to - Conditional logic
				For this to work it's necessary to configure permalinks properly
				(in this case, making the permalink have 'about' as the name of the page) */
		if(is_page('about')) { ?>
		<p>*** Customizing this About Page! #1 (conditional-logic: header.php) ***</p>
		<?php } ?>
	</header>
	<!-- /site-header -->