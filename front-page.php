<?php
get_header();
?>

<h1>Hey man this is the front-page.php</h1>

<h3>Custom HTML Here!</h3>

<?php if(have_posts()) {
	while(have_posts()) {
		the_post();

		the_content();
	}
} else {
	echo '<p>No content found.</p>';
} ?>

<h3>Custom HTML Here!</h3>

<?php
get_footer();
?>