<?php
get_header();

if(have_posts()) {
	while (have_posts()) {
		the_post();
		?>

		<article class="page">

			<?php
			// Child Page Menu (see functions.php for functions)
			if(has_children() || $post->post_parent > 0) { // Only displays the menu if necessary ?>
				<nav class="site-nav children-links">
					<span class="parent-link"><a href="<?php get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
					<ul>
						<?php
						$args = array(
							'child_of' => get_top_ancestor_id();
							'title_li' => ''
						);
						wp_list_pages($args);
						?>
					</ul>
				</nav>
			<?php } ?>

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