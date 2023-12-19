<?php
if(post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments">

    <?php if(have_comments()) { ?>
        <h2 class="comments__title">
        <?php
        /* translators: 1 is number of comments and 2 is post title */
        printf(
            esc_html(
                _n(
                    '%1$s Reply to "%2$s"',
                    '%1$s Replies to "%2$s"',
                    get_comments_number(),
                    'lodgings_collective_theme'
                )
            ),
            number_format_i18n(get_comments_number()),
            get_the_title()
        )
        ?>
        </h2>

        <ul class="comments__list">
        <?php
        wp_list_comments(
            array(
            'short_ping' => false,
            'avatar_size' => 35,
            'reply_text' => 'Reply',
            'callback' => 'lodgings_collective_theme_comment_callback'
            )
        );
        ?>
        </ul>
        <?php the_comments_pagination() ?>
    <?php } ?>

    <?php
    if(! comments_open() && get_comments_number()) { ?>
        <p><?php esc_html_e('Comments are closed for this post', 'lodgings_collective_theme') ?></p>
    <?php } ?>

    <?php comment_form(array('title_reply' => esc_html__('Leave A Comment', 'lodgings_collective_theme'))) ?>

</div>
