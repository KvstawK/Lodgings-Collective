<footer>
    <?php
    if(has_category()) {
        echo '<div class="blog__single-category">';
        /* translators: used betweeen categories */
        $cats_list = get_the_category_list(esc_html__(', ', 'lodgings_collective_theme'));
        /* translators: %s is the categories list */
        printf(esc_html__('Posted in %s', 'lodgings_collective_theme'), $cats_list);
        echo "</div>";
    }
    if(has_tag()) {
        echo '<div>';
        $tags_list = get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');
        echo $tags_list;
        echo "</div>";
    }
    ?>
</footer>
