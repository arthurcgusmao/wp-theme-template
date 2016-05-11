<?php
get_header();

/*
This template will be loaded automatically - only for the page that will have the name (or permalink, idk) 'about'.
*/

if(have_posts()) {
	while (have_posts()) {
		the_post();
		?>

		<p>*** Customizing this About Page! #2 (page-template: page-about.php) ***</p>
		<article class="page">
			<h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
		</article>

		<?php
	}

} else {
	?>
		<p>No content found.</p>
	<?php
}

get_footer();
?>