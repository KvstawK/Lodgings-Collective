<?php
global $post;
$args = array(
	'post_type' => 'lc-slider',
	'post_status' => 'publish',
	'post__in' => $id,
	'orderby' => 'orderby'
);

$lc_slider_query = new WP_Query($args);

if ($lc_slider_query->have_posts()) : while ($lc_slider_query->have_posts()) :
	$lc_slider_query->the_post();

	?>

    <section tabindex="0" id="lc-carousel-<?php echo $post->post_name; ?>" aria-roledescription="carousel" aria-label="<?php esc_html_e('Highlighted images of the  slider', 'lc-slider'); ?>" class="lc-carousel lc-carousel-<?php echo $post->post_name; ?> <?php echo (get_post_meta(get_the_ID(), 'image-appear-disappear-slider', true) ? 'lc-carousel-image-appear-disappear-type' : 'lc-slider-horizontal-scroll-type') ?>  <?php echo ((get_post_meta(get_the_ID(), '2-slide-carousel', true) ? 'lc-2-slide-carousel' : (get_post_meta(get_the_ID(), '3-slide-carousel', true) ? 'lc-3-slide-carousel' : esc_html('1-slide-carousel')))) ?> <?php echo (get_post_meta(get_the_ID(), 'lightbox', true) ? 'lc-lightbox' : esc_html('no-lightbox')) ?>">

        <?php if(get_post_meta( get_the_ID(), 'dots', true ) || get_post_meta( get_the_ID(), 'dots-carousel', true ) || get_post_meta( get_the_ID(), '', true ) || get_post_meta( get_the_ID(), '2-slide-carousel', true ) || get_post_meta( get_the_ID(), '3-slide-carousel', true )) : ?>

	        <?php if (get_post_meta( get_the_ID(), 'dots', true )) : ?>

            <div tabindex="0" id="<?php echo $post->post_name; ?>-dots" role="tablist" class="lc-carousel__nav lc-carousel__nav-dots" aria-label="Slides">

		        <?php

		        $id = get_the_ID();
		        $banner_img = get_post_meta($id, 'images', true);
		        $banner_img = explode(',', $banner_img);

		        if(!empty($banner_img)) :
			        foreach ($banner_img as $attachment_id) : ?>

                        <div tabindex="0" role="tab" class="lc-carousel__nav-dot" aria-selected="false"></div>

			        <?php endforeach; endif; ?>

            </div>

            <?php endif; ?>

            <?php if (get_post_meta( get_the_ID(), 'dots-carousel', true )) : ?>

                <button type="button" class="dots-slider-btn dots-slider-btn-left low-opacity" aria-label="<?php esc_html_e('previous slides button', 'lc-slider'); ?>" aria-controls="<?php echo $post->post_name; ?>-dots-carousel"><?php echo wp_get_attachment_image(169, 'full') ?></button><span class="overflow-left"></span>
                <div tabindex="0" id="<?php echo $post->post_name; ?>-dots-carousel" role="tablist" class="lc-carousel__nav lc-carousel__nav-dots dots-slider" aria-label="Slides">

			        <?php

			        $id = get_the_ID();
			        $banner_img = get_post_meta($id, 'images', true);
			        $banner_img = explode(',', $banner_img);

			        if(!empty($banner_img)) :
				        foreach ($banner_img as $attachment_id) : ?>

                            <div tabindex="0" role="tab" class="lc-carousel__nav-dot dot-carousel" aria-selected="false"><?php echo wp_get_attachment_image( $attachment_id );?></div>

				        <?php endforeach; endif; ?>

                </div>
                <button type="button" class="dots-slider-btn dots-slider-btn-right" aria-label="<?php esc_html_e('next slides button', 'lc-slider'); ?>" aria-controls="<?php echo $post->post_name; ?>-dots-carousel"><?php echo wp_get_attachment_image(42, 'full') ?></button><span class="overflow-right"></span>

            <?php endif; ?>

            <button type="button" class="lc-carousel__btn lc-carousel__btn-left hide" aria-label="<?php esc_html_e('previous slide button', 'lc-slider'); ?>" aria-controls="<?php echo $post->post_name; ?>-carousel-items"><?php echo wp_get_attachment_image(169, 'full') ?></button>
            <div class="lc-carousel__container" >
                <div id="<?php echo $post->post_name; ?>-carousel-items" class="lc-carousel__container-sliders" aria-live="polite">

			        <?php
			        // Use below code to show metabox values from anywhere

			        $id = get_the_ID();
			        $banner_img = get_post_meta($id, 'images', true);
			        $banner_img = explode(',', $banner_img);

			        if(!empty($banner_img) && empty(get_post_meta( get_the_ID(), '2-slide-carousel', true )) && empty(get_post_meta( get_the_ID(), '3-slide-carousel', true ))) :
				        foreach ($banner_img as $attachment_id) :
					        $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
					        ?>

                            <div role="tabpanel" class="lc-carousel__container-sliders-slide" aria-roledescription="slide"  >

                                <div class="lc-carousel__container-sliders-slide-image">

                                    <?php if (get_post_meta( get_the_ID(), 'image-link', true )) : ?>

                                    <a href="<?php echo get_post_meta($attachment_id, 'text_field', true) ?>">

							        <?php 
                                    $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
                                    $medium = get_post_meta(get_the_ID(), 'medium', true);
                                    $large = get_post_meta(get_the_ID(), 'large', true);
                                    $full = get_post_meta(get_the_ID(), 'full', true);

                                    $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

							        echo ($size ? wp_get_attachment_image($attachment_id, $size) : wp_get_attachment_image($attachment_id, 'full'));
                                    ?>

                                    </a>

                                    <?php else: ?>

	                                    <?php
	                                    $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                    $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                    $large = get_post_meta(get_the_ID(), 'large', true);
	                                    $full = get_post_meta(get_the_ID(), 'full', true);

	                                    $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                    echo ($size ? wp_get_attachment_image($attachment_id, $size) : wp_get_attachment_image($attachment_id, 'full'));
	                                    ?>

                                    <?php endif; ?>

                                </div>

						        <?php if (get_post_meta( get_the_ID(), 'content', true )) : ?>

                                    <div tabindex="0" class="lc-carousel__container-sliders-slide-content">
                                        <span></span>
                                        <p class="lc-carousel__container-sliders-slide-content-title"><?php echo get_the_title($attachment_id) ?></p>
                                        <p class="lc-carousel__container-sliders-slide-content-caption"><?php echo wp_get_attachment_caption($attachment_id); ?></p>
                                        <p class="lc-carousel__container-sliders-slide-content-description"><?php echo wp_get_attachment($attachment_id)['description']  ?></p>
                                        <a class="lc-carousel__container-sliders-slide-content-link" href="<?php echo get_post_meta($attachment_id, 'text_field', true) ?>"><p><?php echo get_the_title($banner_img[0]); ?></p></a>
                                    </div>

						        <?php endif; ?>

                            </div>

				        <?php endforeach;

                    elseif (get_post_meta( get_the_ID(), '2-slide-carousel', true ) && get_post_meta( get_the_ID(), 'content', true )) :
				        foreach (array_chunk($banner_img, 2) as $group) :
					        ?>

                            <div role="tabpanel" class="lc-carousel__container-sliders-slide  <?php echo (get_post_meta( get_the_ID(), '2-slide-carousel', true ) ? 'two-slide-carousel' : '') ?>" aria-roledescription="slide">

                                <div class="lc-carousel__container-sliders-slide-item two-slide-carousel-first-item">
                                    <div class="lc-carousel__container-sliders-slide-item-image two-slide-carousel-first-image">

                                    <?php if (get_post_meta( get_the_ID(), 'image-link', true )) : ?>

                                    <a href="<?php echo get_post_meta($group[0], 'text_field', true) ?>">

	                                    <?php
	                                    $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                    $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                    $large = get_post_meta(get_the_ID(), 'large', true);
	                                    $full = get_post_meta(get_the_ID(), 'full', true);

	                                    $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                    echo ($size ? wp_get_attachment_image((int)$group[0], $size) : wp_get_attachment_image((int)$group[0], 'full')); ?>

                                    </a>

				                    <?php else: ?>

                                        <?php
                                        $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
                                        $medium = get_post_meta(get_the_ID(), 'medium', true);
                                        $large = get_post_meta(get_the_ID(), 'large', true);
                                        $full = get_post_meta(get_the_ID(), 'full', true);

                                        $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

                                        echo ($size ? wp_get_attachment_image((int)$group[0], $size) : wp_get_attachment_image((int)$group[0], 'full')); ?>

                                    <?php endif; ?>

                                    </div>

					                <?php if (get_post_meta( get_the_ID(), 'content', true )) : ?>

                                    <div tabindex="0" class="lc-carousel__container-sliders-slide-item-content two-slide-carousel-first-image-content">
                                        <span></span>
                                        <p class="lc-carousel__container-sliders-slide-content-title"><?php echo get_the_title($group[0]) ?></p>
                                        <p class="lc-carousel__container-sliders-slide-content-caption"><?php echo wp_get_attachment_caption($group[0]); ?></p>
                                        <p class="lc-carousel__container-sliders-slide-content-description"><?php echo wp_get_attachment($group[0])['description']  ?></p>
                                        <a class="lc-carousel__container-sliders-slide-content-link" href="<?php echo get_post_meta($group[0], 'text_field', true) ?>"><p><?php echo get_the_title($group[0]); ?></p></a>
                                    </div>

                                    <?php endif; ?>

                                </div>
                                <div class="lc-carousel__container-sliders-slide-item two-slide-carousel-second-item">

                                    <div class="lc-carousel__container-sliders-slide-item-image two-slide-carousel-second-image">

					                <?php if (get_post_meta( get_the_ID(), 'image-link', true )) : ?>

                                        <a href="<?php echo get_post_meta($group[1], 'text_field', true) ?>">

	                                    <?php
	                                    $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                    $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                    $large = get_post_meta(get_the_ID(), 'large', true);
	                                    $full = get_post_meta(get_the_ID(), 'full', true);

	                                    $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                    echo ($size ? wp_get_attachment_image((int)$group[1], $size) : wp_get_attachment_image((int)$group[1], 'full')); ?>

                                        </a>

                                    <?php else: ?>

						                <?php
						                $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
						                $medium = get_post_meta(get_the_ID(), 'medium', true);
						                $large = get_post_meta(get_the_ID(), 'large', true);
						                $full = get_post_meta(get_the_ID(), 'full', true);

						                $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

						                echo ($size ? wp_get_attachment_image((int)$group[1], $size) : wp_get_attachment_image((int)$group[1], 'full')); ?>

                                    <?php endif; ?>

                                    </div>

					                <?php if (get_post_meta( get_the_ID(), 'content', true )) : ?>

                                    <div tabindex="0" class="lc-carousel__container-sliders-slide-item-content two-slide-carousel-second-image-content">
                                        <span></span>
                                        <p class="lc-carousel__container-sliders-slide-content-title"><?php echo get_the_title($group[1]) ?></p>
                                        <p class="lc-carousel__container-sliders-slide-content-caption"><?php echo wp_get_attachment_caption($group[1]); ?></p>
                                        <p class="lc-carousel__container-sliders-slide-content-description"><?php echo wp_get_attachment($group[1])['description']  ?></p>
                                        <a class="lc-carousel__container-sliders-slide-content-link" href="<?php echo get_post_meta($group[1], 'text_field', true) ?>"><p><?php echo get_the_title($group[1]); ?></p></a>
                                    </div>

                                    <?php endif; ?>

                                </div>

                            </div>

				        <?php endforeach; ?>

                        <?php elseif (get_post_meta( get_the_ID(), '2-slide-carousel', true )) :
                        foreach (array_chunk($banner_img, 2) as $group) :
                        ?>

                        <div role="tabpanel" class="lc-carousel__container-sliders-slide  <?php echo (get_post_meta( get_the_ID(), '2-slide-carousel', true ) ? 'two-slide-carousel' : '') ?>" aria-roledescription="slide">

                            <div class="lc-carousel__container-sliders-slide-item two-slide-carousel-first-item">
                                <div class="lc-carousel__container-sliders-slide-item-image two-slide-carousel-first-image">

                                    <?php if (get_post_meta( get_the_ID(), 'image-link', true )) : ?>

                                        <a href="<?php echo get_post_meta($group[0], 'text_field', true) ?>">

                                            <?php
                                            $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
                                            $medium = get_post_meta(get_the_ID(), 'medium', true);
                                            $large = get_post_meta(get_the_ID(), 'large', true);
                                            $full = get_post_meta(get_the_ID(), 'full', true);

                                            $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

                                            echo ($size ? wp_get_attachment_image((int)$group[0], $size) : wp_get_attachment_image((int)$group[0], 'full')); ?>

                                        </a>

                                    <?php else: ?>

                                        <?php
                                        $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
                                        $medium = get_post_meta(get_the_ID(), 'medium', true);
                                        $large = get_post_meta(get_the_ID(), 'large', true);
                                        $full = get_post_meta(get_the_ID(), 'full', true);

                                        $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

                                        echo ($size ? wp_get_attachment_image((int)$group[0], $size) : wp_get_attachment_image((int)$group[0], 'full')); ?>

                                    <?php endif; ?>

                                </div>

                            </div>
                            <div class="lc-carousel__container-sliders-slide-item two-slide-carousel-second-item">

                                <div class="lc-carousel__container-sliders-slide-item-image two-slide-carousel-second-image">

                                    <?php if (get_post_meta( get_the_ID(), 'image-link', true )) : ?>

                                        <a href="<?php echo get_post_meta($group[1], 'text_field', true) ?>">

                                            <?php
                                            $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
                                            $medium = get_post_meta(get_the_ID(), 'medium', true);
                                            $large = get_post_meta(get_the_ID(), 'large', true);
                                            $full = get_post_meta(get_the_ID(), 'full', true);

                                            $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

                                            echo ($size ? wp_get_attachment_image((int)$group[1], $size) : wp_get_attachment_image((int)$group[1], 'full')); ?>

                                        </a>

                                    <?php else: ?>

	                                    <?php
	                                    $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                    $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                    $large = get_post_meta(get_the_ID(), 'large', true);
	                                    $full = get_post_meta(get_the_ID(), 'full', true);

	                                    $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                    echo ($size ? wp_get_attachment_image((int)$group[1], $size) : wp_get_attachment_image((int)$group[1], 'full')); ?>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

	                    <?php endforeach; ?>

                        <?php elseif (get_post_meta( get_the_ID(), '3-slide-carousel', true ) && get_post_meta( get_the_ID(), 'content', true )) :
                        foreach (array_chunk($banner_img, 3) as $group) :
                        ?>

                        <div role="tabpanel" class="lc-carousel__container-sliders-slide" aria-roledescription="slide">

                            <div class="lc-carousel__container-sliders-slide-image <?php echo (get_post_meta( get_the_ID(), '3-slide-carousel', true ) ? 'three-slide-carousel' : '') ?>">

	                            <?php
	                            $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                            $medium = get_post_meta(get_the_ID(), 'medium', true);
	                            $large = get_post_meta(get_the_ID(), 'large', true);
	                            $full = get_post_meta(get_the_ID(), 'full', true);

	                            $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                            echo ($size ? wp_get_attachment_image((int)$group[0], $size) : wp_get_attachment_image((int)$group[0], 'full')); ?>
	                            <?php
	                            $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                            $medium = get_post_meta(get_the_ID(), 'medium', true);
	                            $large = get_post_meta(get_the_ID(), 'large', true);
	                            $full = get_post_meta(get_the_ID(), 'full', true);

	                            $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                            echo ($size ? wp_get_attachment_image((int)$group[1], $size) : wp_get_attachment_image((int)$group[1], 'full')); ?>
	                            <?php
	                            $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                            $medium = get_post_meta(get_the_ID(), 'medium', true);
	                            $large = get_post_meta(get_the_ID(), 'large', true);
	                            $full = get_post_meta(get_the_ID(), 'full', true);

	                            $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                            echo ($size ? wp_get_attachment_image((int)$group[2], $size) : wp_get_attachment_image((int)$group[2], 'full')); ?>

                            </div>

                            <div tabindex="0" class="lc-carousel__container-sliders-slide-content three-slide-carousel-first-image-content">
                                <span></span>
                                <p class="lc-carousel__container-sliders-slide-content-title"><?php echo get_the_title($group[0]) ?></p>
                                <p class="lc-carousel__container-sliders-slide-content-caption"><?php echo wp_get_attachment_caption($group[0]); ?></p>
                                <p class="lc-carousel__container-sliders-slide-content-description"><?php echo wp_get_attachment($group[0])['description']  ?></p>
                                <a class="lc-carousel__container-sliders-slide-content-link" href="<?php echo get_post_meta($group[0], 'text_field', true) ?>"><p><?php echo get_the_title($group[0]); ?></p></a>
                            </div>
                            <div tabindex="0" class="lc-carousel__container-sliders-slide-content three-slide-carousel-second-image-content">
                                <span></span>
                                <p class="lc-carousel__container-sliders-slide-content-title"><?php echo get_the_title($group[1]) ?></p>
                                <p class="lc-carousel__container-sliders-slide-content-caption"><?php echo wp_get_attachment_caption($group[1]); ?></p>
                                <p class="lc-carousel__container-sliders-slide-content-description"><?php echo wp_get_attachment($group[1])['description']  ?></p>
                                <a class="lc-carousel__container-sliders-slide-content-link" href="<?php echo get_post_meta($group[1], 'text_field', true) ?>"><p><?php echo get_the_title($group[1]); ?></p></a>
                            </div>
                            <div tabindex="0" class="lc-carousel__container-sliders-slide-content three-slide-carousel-third-image-content">
                                <span></span>
                                <p class="lc-carousel__container-sliders-slide-content-title"><?php echo get_the_title($group[2]) ?></p>
                                <p class="lc-carousel__container-sliders-slide-content-caption"><?php echo wp_get_attachment_caption($group[2]); ?></p>
                                <p class="lc-carousel__container-sliders-slide-content-description"><?php echo wp_get_attachment($group[2])['description']  ?></p>
                                <a class="lc-carousel__container-sliders-slide-content-link" href="<?php echo get_post_meta($group[2], 'text_field', true) ?>"><p><?php echo get_the_title($group[2]); ?></p></a>
                            </div>

                        </div>

                        <?php endforeach; ?>

	                        <?php elseif (get_post_meta( get_the_ID(), '3-slide-carousel', true )) :
                        foreach (array_chunk($banner_img, 3) as $group) :
	                        ?>

                            <div role="tabpanel" class="lc-carousel__container-sliders-slide" aria-roledescription="slide">

                                <div class="lc-carousel__container-sliders-slide-image <?php echo (get_post_meta( get_the_ID(), '3-slide-carousel', true ) ? 'three-slide-carousel' : '') ?>">

	                                <?php
	                                $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                $large = get_post_meta(get_the_ID(), 'large', true);
	                                $full = get_post_meta(get_the_ID(), 'full', true);

	                                $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                echo ($size ? wp_get_attachment_image((int)$group[0], $size) : wp_get_attachment_image((int)$group[0], 'full')); ?>
	                                <?php
	                                $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                $large = get_post_meta(get_the_ID(), 'large', true);
	                                $full = get_post_meta(get_the_ID(), 'full', true);

	                                $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                echo ($size ? wp_get_attachment_image((int)$group[1], $size) : wp_get_attachment_image((int)$group[1], 'full')); ?>
	                                <?php
	                                $thumbnail = get_post_meta(get_the_ID(), 'thumbnail', true);
	                                $medium = get_post_meta(get_the_ID(), 'medium', true);
	                                $large = get_post_meta(get_the_ID(), 'large', true);
	                                $full = get_post_meta(get_the_ID(), 'full', true);

	                                $size = ($thumbnail ? 'thumbnail' : ($medium ? 'medium' : ($large ? 'large' : ($full ? 'full' : ''))));

	                                echo ($size ? wp_get_attachment_image((int)$group[2], $size) : wp_get_attachment_image((int)$group[2], 'full')); ?>

                                </div>

                            </div>

                    <?php endforeach; endif; ?>

                </div>

            </div>
            <button type="button" class="lc-carousel__btn lc-carousel__btn-right" aria-label="<?php esc_html_e('next slide button', 'lc-slider'); ?>" aria-controls="<?php echo $post->post_name; ?>-carousel-items"><?php echo wp_get_attachment_image(42, 'full') ?></button>

        <?php endif;  ?>

    </section>

<?php endwhile; endif; wp_reset_postdata(); ?>