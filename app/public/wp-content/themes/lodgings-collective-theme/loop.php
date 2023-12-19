<?php if (have_posts()) {
	$first_post = true; // Variable to track the first post
	while (have_posts()) {
		the_post();

		// Add 'scrolled' class to all articles except the first one
		$article_class = 'blog';
		if (!$first_post) {
			$article_class .= ' scrolled';
		}
		?>

		<article <?php post_class($article_class); ?>>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<header>
					<?php the_post_thumbnail(); ?>
					<h3 title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h3>
				</header>
			</a>
			<p class="paragraph paragraph--dark"><?php echo wp_trim_words(get_the_content(), 18); ?></p>
			<?php echo get_the_category_list(); ?>
			<div class="blog__info">
				<?php esc_html_e('By ', 'lodgings_collective_theme'); ?>
				<?php the_author_posts_link(); ?>
				<time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
					<?php echo esc_html(get_the_date()); ?>
				</time>
			</div>
			<?php lodgings_collective_theme_readmore_link(); ?>
		</article>

		<?php
		// After the first post, set $first_post to false
		$first_post = false;
	}
} else {
	get_template_part('template-parts/post/content', 'none');
}
?>
