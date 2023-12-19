<?php
$prev = get_previous_post();
$next = get_next_post();
?>

<?php if($prev || $next) : ?>
    <nav class="blog__single-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e('Post Navigation', 'lodgings_collective_theme'); ?></h2>
        <div class="blog__single-navigation-links <?php echo (!$next || !$prev) ? 'single' : '' ?>">
    <?php if($prev) : ?>
                <a class="blog__single-navigation-links-post blog__single-navigation-links-post--prev" href="<?php the_permalink($prev->ID) ?>">
                    <div class="blog__single-navigation-links-post-link">
        <?php if(has_post_thumbnail($prev->ID)) : ?>
                            <div class="blog__single-navigation-links-post-link-thumbnail">
            <?php echo get_the_post_thumbnail($prev->ID, 'thumbnail'); ?>
                            </div>
        <?php endif; ?>
                        <div class="blog__single-navigation-links-post-link-content">
                            <span class="blog__single-navigation-links-post-link-subtitle paragraph-first-line">
                                <?php esc_html_e('Previous Post', 'lodgings_collective_theme'); ?>
                            </span>
                            <span class="blog__single-navigation-links-post-link-title headline-3">
                                <?php echo esc_html(get_the_title($prev->ID)); ?>
                            </span>
                        </div>
                    </div>
                </a>
    <?php endif; ?>
    <?php if($next) : ?>
                <a class="blog__single-navigation-links-post blog__single-navigation-links-post--next" href="<?php the_permalink($next->ID) ?>">
                    <div class="blog__single-navigation-links-post-link">
        <?php if(has_post_thumbnail($next->ID)) : ?>
                            <div class="blog__single-navigation-links-post-link-thumbnail">
            <?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?>
                            </div>
        <?php endif; ?>
                        <div class="blog__single-navigation-links-post-link-content">
                            <span class="blog__single-navigation-links-post-link-subtitle paragraph-first-line">
                                <?php esc_html_e('Next Post', 'lodgings_collective_theme'); ?>
                            </span>
                            <span class="blog__single-navigation-links-post-link-title headline-3">
                                <?php echo esc_html(get_the_title($next->ID)); ?>
                            </span>
                        </div>
                    </div>
                </a>
    <?php endif; ?>
        </div>
    </nav>
<?php endif; ?>
