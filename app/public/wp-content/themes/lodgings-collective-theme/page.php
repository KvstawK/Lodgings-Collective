<?php get_header() ?>

<div class="blog">
    <div class="container">
        <div class="blog__container">
            <main role="main" class="blog__container-posts">
                <?php

                get_template_part('loop', 'page');

                ?>
            </main>

            <?php

            if(is_active_sidebar('primary-sidebar')) {
                get_sidebar();
            }

            ?>

        </div>
    </div>
</div>

<?php get_footer() ?>
