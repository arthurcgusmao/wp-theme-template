<?php
/*
Template Name: Special Template
*/
get_header();

/*
Only pages which have this template selected in the console will display it.
*/


if(have_posts()) {
	while (have_posts()) {
		the_post();
		?>
		<p>*** Customizing this Special Template! (this page is loading the template called: special-template.php) ***</p>
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