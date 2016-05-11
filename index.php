<?php
get_header();

if(have_posts()) {
	while (have_posts()) {
		the_post();
		?>

		<article class="post">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<!-- Post Meta Data -->
			<p class="post-info">
				<?php the_time('F jS, Y'); ?>
				| by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
				| Posted in <?php
					$categories = get_the_category();
					$separator = ', ';
					$output = '';

					if($categories) {
						foreach ($categories as $category) {
							$output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>' . $separator;
						}
					}
					echo trim($output, $separator);
				?>
			</p>

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