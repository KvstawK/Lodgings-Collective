<?php get_header() ?>

<section class="page-banner">
	<?php

	if ( is_tax('rental-location', 'greece') && str_contains( $_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com' ) ) :

		echo wp_get_attachment_image(340, 'full');

	elseif( is_tax( 'rental-location', 'greece' ) ) :

		echo wp_get_attachment_image(340, 'full');

	elseif ( is_tax('rental-location', 'crete') && str_contains( $_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com' ) ) :

		echo wp_get_attachment_image(950, 'full');

	elseif( is_tax( 'rental-location', 'crete' ) ) :

		echo wp_get_attachment_image(889, 'full');

	elseif ( is_tax('rental-location', 'heraklion') && str_contains( $_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com' ) ) :

		echo wp_get_attachment_image(950, 'full');

	elseif( is_tax( 'rental-location', 'heraklion' ) ) :

		echo wp_get_attachment_image(1659, 'full');

	endif;

	?>
	<div class="page-banner-text">
		<?php the_archive_title('<h1>', '</h1>'); ?>
		<?php the_archive_description('<h2>', '</h2>'); ?>
	</div>
</section>

<section class="rentals__items page-section">
	<div class="container">
		<div class="rentals__items-container">

			<?php
			// Get the current term object
			$term = get_queried_object();

			$args = array(
				'post_type' => 'lc-rentals',
				'posts_per_page' => -1,
				'post_parent' => 0,
				'tax_query' => array(
					array(
						'taxonomy' => $term->taxonomy,
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				),
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

				get_template_part('template-parts/page/rental-items');

			endwhile;
			?>

		</div>
	</div>
</section>

<?php

else :

	get_template_part('template-parts/post/content', 'none');

endif; wp_reset_postdata();

the_posts_pagination();

?>


<?php get_footer() ?>

