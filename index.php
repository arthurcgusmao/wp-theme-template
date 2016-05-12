<?php
get_header();

if(have_posts()) {
	while (have_posts()) {
		the_post();
		
		get_template_part('content');
	}

} else {
	?>
		<p>No content found.</p>
	<?php
}

get_footer();
?>