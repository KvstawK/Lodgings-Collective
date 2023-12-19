<?php
//@session_start();
//global $post;
//
//$image = $_SESSION['user-img-upload'];
//
//var_dump($image);
//echo wp_get_attachment_image($image, 'full');

// Display comments
global $wpdb;
$comments = get_comments(
    array(
    'post_id' => $post->ID
    )
);

foreach($comments as $comment) :
    ?>
    <div class="lc-rentals__reviews-display">
        <div class="lc-rentals__reviews-display-container">
            <div class="lc-rentals__reviews-display-container-info">
                <div class="lc-rentals__reviews-display-container-info-image">
                    <?php
                    $image_url = str_replace('http://', '', $comment->comment_author_url);
                    $attachment_number = substr($image_url, 0, 4);
                    if($attachment_number) {
                        echo wp_get_attachment_image($attachment_number, 'full');
                    } else {
                        echo wp_get_attachment_image(1860, 'full');
                    }
                    ?>
                </div>
                <div class="lc-rentals__reviews-display-container-info-text">
                    <h3><?php echo($comment->comment_author); ?></h3>
                    <div class="lc-rentals__reviews-display-container-info-text-stars">
                        <p class="paragraph"><?php echo number_format(get_comment_meta(get_comment_ID(), 'rating', true), 1); ?></p>
                        <?php
                        $rating_numbers = get_comment_meta(get_comment_ID(), 'rating', true);
                        for ( $i = 1; $i <= $rating_numbers; $i++ ) :
                            echo wp_get_attachment_image(2125, 'full') ?>
                            <?php
                        endfor;
                        ?>
                    </div>
                </div>
            </div>
            <div class="lc-rentals__reviews-display-container-text">
                <p class="review-trimmed-words" aria-expanded="true"><?php echo (wp_trim_words($comment->comment_content, 30)); ?></p>
<!--                <p id="review_full" class="review-content-hidden">--><?php //= $comment->comment_content ?><!--</p>-->
                <?php
                if(str_word_count($comment->comment_content) > 30) {
                    echo '<p id="review_full" class="review-content-hidden">' . $comment->comment_content . '</p>';
                    echo '<input type="button" class="read-more-review-button" aria-expanded="false" aria-controls="review_full" value="' . esc_html__('Read More ', 'lodgings_collective_theme') . '"/><span class="screen-reader-text">' . esc_html__('Review', 'lodgings_collective_theme') . '</span>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    //    echo($comment->comment_author);
    //    echo($comment->comment_author_email);
    //    echo($comment->comment_content);
    //
    //
    //    echo ea_rentals_reviews_get_average_ratings($post->ID);

    //                            var_dump($comment);
endforeach;

