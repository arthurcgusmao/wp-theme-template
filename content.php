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

	<?php
	// Conditional logic to hide thumbnails in archive.php
	if(!is_archive()) {
		the_post_thumbnail();
	}
	?>

	<p><?php echo get_the_excerpt(); ?></p>
	<a href="<?php the_permalink(); ?>">Read more&raquo;</a>
</article>