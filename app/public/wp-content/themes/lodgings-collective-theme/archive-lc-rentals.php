<?php get_header() ?>

<section class="page-banner">
	<?php echo wp_get_attachment_image(109, 'full') ?>
	<div class="page-banner-text">
		<?php the_archive_title('<h1>', '</h1>'); ?>
		<?php the_archive_description('<h2>', '</h2>'); ?>
	</div>
</section>

<main role="main" class="rentals__items page-section">
	<div class="container">
		<div class="rentals__items-container">
			<div class="rentals__items-container-search">

				<?php echo do_shortcode('[searchandfilter id="2872"]') ?>

			</div>
			<div class="rentals__items-container-rentals">

				<?php
				$args = array(
					'post_type' => 'lc-rentals',
					'posts_per_page' => -1,
					'post_parent' => 0,
					'search_filter_id' => 2872
				);

				$query = new WP_Query($args);

				if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

					get_template_part('template-parts/page/rental-items');

				endwhile; ?>

			</div>
		</div>
	</div>
</main>

<?php

else :

	get_template_part('template-parts/post/content', 'none');

endif; wp_reset_postdata();

the_posts_pagination();

?>


<?php get_footer() ?>

