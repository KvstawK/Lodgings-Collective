<div class="lc-rentals__reviews">
    <div class="container">
        <h2><?php echo esc_html__('Write A Review For Your Staying In ', 'lodgings_collective_theme') ?>"<?php the_title() ?>"</h2>
        <div class="lc-rentals__reviews-container">
            <div class="lc-rentals__reviews-container-image">
                <p class="paragraph-first-line paragraph--black paragraph--bolder"><?php the_title(); ?></p>
                <div class="lc-rentals__reviews-container-location">
                    <?php echo wp_get_attachment_image(2127, 'full') ?>
                    <p class="paragraph"><?php echo get_the_terms(get_the_ID(), 'rental-location')[1]->name; ?></p>,
                    <p class="paragraph"><?php echo get_the_terms(get_the_ID(), 'rental-location')[2]->name; ?></p>
                </div>
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="lc-rentals__reviews-container-form">
                <p class="paragraph-first-line paragraph--black"><?php esc_html_e('Upload a photo', 'lodgings_collective_theme'); ?></p>
                <form class="lc-rentals__reviews-container-form-image" id="featured_upload" method="post" action="#" enctype="multipart/form-data">
                    <input type="file" name="lc_rentals_review_image" id="lc_rentals_review_image"  multiple="false" />
                    <input type="hidden" name="post_id" id="post_id" value="55" />
                    <?php wp_nonce_field('lc_rentals_review_image', 'lc_rentals_review_image_nonce'); ?>
                    <input id="submit_lc_rentals_review_image" name="submit_lc_rentals_review_image" type="submit" value="<?php echo esc_attr__('Upload Your Photo!', 'lodgings_collective_theme') ?>" />
                </form>
                <p class="paragraph"><?php esc_html_e('Please press the "Browse" button, select the photo you would like to appear in your review and press the "Upload Your Photo!" button.', 'lodgings_collective_theme'); ?></p>
                <?php
                // Check that the nonce is valid, and the user can edit this post.
                if (isset($_POST['lc_rentals_review_image_nonce'], $_POST['post_id'])
                    && wp_verify_nonce($_POST['lc_rentals_review_image_nonce'], 'lc_rentals_review_image')
                    //    && current_user_can('edit_post', $_POST['post_id'])
                ) {
                    // The nonce was valid and the user has the capabilities, it is safe to continue.

                    // These files need to be included as dependencies when on the front end.
                    include_once ABSPATH . 'wp-admin/includes/image.php';
                    include_once ABSPATH . 'wp-admin/includes/file.php';
                    include_once ABSPATH . 'wp-admin/includes/media.php';

                    // Let WordPress handle the upload.
                    // Remember, 'lc_rentals_review_image' is the name of our file input in our form above.
                    $attachment_id = media_handle_upload('lc_rentals_review_image', $_POST['post_id']);

                    if (is_wp_error($attachment_id)) {
                        echo 'There was an error uploading the image.';
                    } else {
                        echo 'The image was uploaded successfully!';
                    }

                } else {
                    // Authentication failed. Maybe show an error?
                }


                global $post;
                //Declare Vars
                $comment_send = esc_html__('Submit Review', 'lodgings_collective_theme');
                $comment_reply = '';
                $comment_reply_to = esc_html__('Reply', 'lodgings_collective_theme');

                $comment_author = esc_html__('Name', 'lodgings_collective_theme');
                $comment_email = esc_html__('E-Mail', 'lodgings_collective_theme');
                $comment_body = esc_html__('Review', 'lodgings_collective_theme');
                $comment_url = esc_html__('Website', 'lodgings_collective_theme');
                $comment_cookies_1 = esc_html__(' By commenting you accept the', 'lodgings_collective_theme');
                $comment_cookies_2 = esc_html__(' Privacy Policy', 'lodgings_collective_theme');

                $comment_before = '';

                $comment_cancel = esc_html__('Cancel Reply', 'lodgings_collective_theme');

                //Array
                $comments_args = array(
                    //Define Fields
                        'fields' => array(
                            //Author field
                                'author' => '<p class="comment-form-author paragraph-first-line paragraph--black">
							<label for="author">' . esc_html__('Your Name', 'lodgings_collective_theme') . '</label><br>
							<input id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></p>',
                            //Email Field
                                'email' => '<p class="comment-form-email paragraph-first-line paragraph--black">
							<label for="email">' . esc_html__('Your Email', 'lodgings_collective_theme') . '</label><br>
							<input id="email" name="email" placeholder="' . $comment_email .'"></p>',
                            //URL Field
                                'url' => '<p class="comment-form-url"><br /><input type="hidden" value="' .$attachment_id . '" id="url" name="url" placeholder="' . $comment_url .'"></p>',
                //                                'url' => '<form class="lc-rentals__reviews-container-form-image" id="featured_upload" method="post"                 action="#" enctype="multipart/form-data">
                //                                            <input type="file" name="lc_rentals_review_image" id="lc_rentals_review_image"  multiple="false" />
                //                                            <input type="hidden" name="post_id" id="post_id" value="55" />'
                //                                             . wp_nonce_field( 'lc_rentals_review_image', 'lc_rentals_review_image_nonce' ) .
                //                                            '<input id="submit_lc_rentals_review_image" name="submit_lc_rentals_review_image" type="submit" value="Upload" />
                //                                            </form>',
                            //Cookies
                //                                'cookies' => '<input type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
                                'cookies' => '',
                        ),
                    // Change the title of send button
                        'label_submit' => __($comment_send),
                    // Change the title of the reply section
                        'title_reply' => __($comment_reply),
                    // Change the title of the reply section
                        'title_reply_to' => __($comment_reply_to),
                    //Cancel Reply Text
                        'cancel_reply_link' => __($comment_cancel),
                    // Redefine your own textarea (the comment body).
                        'comment_field' => '<p class="comment-form-comment paragraph-first-line paragraph--black">
							<label for="comment">' . esc_html__('Your review', 'lodgings_collective_theme') . '</label><br>
							<textarea id="comment" name="comment" aria-required="true" rows="5" cols="40" placeholder="' . $comment_body .'"></textarea></p>',
                    //Message Before Comment
                        'comment_notes_before' => $comment_before,
                    // Remove "Text or HTML to be displayed after the set of comment fields".
                        'comment_notes_after' => '',
                    //Submit Button ID
                        'id_submit' => __('comment-submit', 'lodgings_collective_theme'),
                );
                comment_form($comments_args, $post->ID);
                ?>
            </div>
        </div>
    </div>
</div>




