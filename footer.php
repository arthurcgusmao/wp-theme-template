<footer class="site-footer">
	<?php
	$args = array(
		'theme_location' => 'footer'
	);
	?>
	<nav class="site-nav">
		<?php wp_nav_menu($args); ?>
	</nav>

	<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
</footer>

<?php wp_footer(); ?>	
</body>
</html>