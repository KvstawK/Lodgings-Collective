
<div class="lc-rentals__facilities">
    <div class="lc-rentals__facilities-container">
        <?php if (get_post_meta( get_the_ID(), 'essentials', true )) : ?>
            <div title="<?php esc_html_e("Essentials (Towels, bed sheets, soap, toilet paper, and pillows)", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(60, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Essentials (Towels, bed sheets, soap, toilet paper, and pillows)', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'gym', true )) : ?>
            <div title="<?php esc_html_e("Gym", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(63, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Gym', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'pool', true )) : ?>
            <div title="<?php esc_html_e("Swimming-pool", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(91, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Private Swimming-pool', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'kids', true )) : ?>
            <div title="<?php esc_html_e("Kids Friendly", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(74, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Kids Friendly', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'jacuzzi', true )) : ?>
        <div title="<?php esc_html_e("Jacuzzi", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
            <?php echo wp_get_attachment_image(70, 'full'); ?>
            <p class="paragraph--black"><?php esc_html_e('Jacuzzi', 'lc-rentals'); ?></p>
        </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'ac', true )) : ?>
            <div title="<?php esc_html_e("Air Conditioning", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(39, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Air Conditioning', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'ceiling-fan', true )) : ?>
            <div title="<?php esc_html_e("Ceiling Fan", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(822, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Ceiling Fan', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'cleaning-products', true )) : ?>
            <div title="<?php esc_html_e("Cleaning Products", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(52, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Cleaning Products', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'cooking-basics', true )) : ?>
            <div title="<?php esc_html_e("Cooking Basics (Pots and pans, oil, salt and pepper)", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(54, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Cooking Basics (Pots and pans, oil, salt and pepper)', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'workspace', true )) : ?>
            <div title="<?php esc_html_e("Dedicated workspace", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(99, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Dedicated workspace', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'garden', true )) : ?>
            <div title="<?php esc_html_e("Garden", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php
                if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
                    echo wp_get_attachment_image(855, 'full');
                } else {
                    echo wp_get_attachment_image(812, 'full');
                }
                ?>
                <p class="paragraph--black"><?php esc_html_e('Garden', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'mountain', true )) : ?>
            <div title="<?php esc_html_e("Mountain View", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(860, 'full');
	            } else {
		            echo wp_get_attachment_image(813, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Mountain View', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'dishes', true )) : ?>
            <div title="<?php esc_html_e("Dishes & Utensils", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(55, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Dishes & Utensils', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'dryer', true )) : ?>
            <div title="<?php esc_html_e("Clothes Dryer", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(53, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Clothes Dryer', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'washing-machine', true )) : ?>
            <div title="<?php esc_html_e("Washing Machine", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(97, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Washing Machine', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'drying-rack', true )) : ?>
            <div title="<?php esc_html_e("Drying Rack", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(851, 'full');
	            } else {
		            echo wp_get_attachment_image(817, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Drying Rack', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'clothing-storage', true )) : ?>
            <div title="<?php esc_html_e("Clothing Storage", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(864, 'full');
	            } else {
		            echo wp_get_attachment_image(825, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Clothing Storage', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'hair-dryer', true )) : ?>
            <div title="<?php esc_html_e("Hair Dryer", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(64, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Hair Dryer', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'heating', true )) : ?>
            <div title="<?php esc_html_e("Heating", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(66, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Heating', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'kitchen', true )) : ?>
            <div title="<?php esc_html_e("Kitchen", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(71, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Kitchen', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'electric-stove', true )) : ?>
            <div title="<?php esc_html_e("Electric Stove", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(863, 'full');
	            } else {
		            echo wp_get_attachment_image(826, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Electric Stove', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'kettle', true )) : ?>
            <div title="<?php esc_html_e("Hot Water Kettle", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(852, 'full');
	            } else {
		            echo wp_get_attachment_image(828, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Hot Water Kettle', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'oven', true )) : ?>
            <div title="<?php esc_html_e("Oven", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(861, 'full');
	            } else {
		            echo wp_get_attachment_image(827, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Oven', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'refrigerator', true )) : ?>
            <div title="<?php esc_html_e("Refrigerator", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(854, 'full');
	            } else {
		            echo wp_get_attachment_image(823, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Refrigerator', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'microwave', true )) : ?>
            <div title="<?php esc_html_e("Microwave", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(859, 'full');
	            } else {
		            echo wp_get_attachment_image(824, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Microwave', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'tv', true )) : ?>
            <div title="<?php esc_html_e("TV", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(95, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('TV', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'hdtv', true )) : ?>
            <div title="<?php esc_html_e("HDTV With Netflix", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(857, 'full');
	            } else {
		            echo wp_get_attachment_image(819, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('HDTV With Netflix', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'books', true )) : ?>
            <div title="<?php esc_html_e("Books & Reading Materials", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(849, 'full');
	            } else {
		            echo wp_get_attachment_image(820, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Books & Reading Materials', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'fireplace', true )) : ?>
            <div title="<?php esc_html_e("Fireplace", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(853, 'full');
	            } else {
		            echo wp_get_attachment_image(821, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Fireplace', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'dishwasher', true )) : ?>
            <div title="<?php esc_html_e("Dishwasher", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(56, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Dishwasher', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'wifi', true )) : ?>
            <div title="<?php esc_html_e("WiFi", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(98, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('WiFi', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'bathtub', true )) : ?>
            <div title="<?php esc_html_e("Bathtub", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(47, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Bathtub', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'shower', true )) : ?>
            <div title="<?php esc_html_e("Shower", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(88, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Shower', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'outdoor-shower', true )) : ?>
            <div title="<?php esc_html_e("Outdoor Shower", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(862, 'full');
	            } else {
		            echo wp_get_attachment_image(814, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Outdoor Shower', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'hammock', true )) : ?>
            <div title="<?php esc_html_e("Hammock", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(856, 'full');
	            } else {
		            echo wp_get_attachment_image(830, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Hammock', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'bbq', true )) : ?>
            <div title="<?php esc_html_e("BBQ", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(848, 'full');
	            } else {
		            echo wp_get_attachment_image(829, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('BBQ', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'hot-water', true )) : ?>
            <div title="<?php esc_html_e("Hot Water", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
	            <?php
	            if(str_contains($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com')) {
		            echo wp_get_attachment_image(858, 'full');
	            } else {
		            echo wp_get_attachment_image(816, 'full');
	            }
	            ?>
                <p class="paragraph--black"><?php esc_html_e('Hot Water', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'shampoo', true )) : ?>
            <div title="<?php esc_html_e("Shampoo & Soap", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(87, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Shampoo & Soap', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'hangers', true )) : ?>
            <div title="<?php esc_html_e("Hangers", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(65, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Hangers', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'iron', true )) : ?>
            <div title="<?php esc_html_e("Iron", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(69, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Iron', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (get_post_meta( get_the_ID(), 'safe-box', true )) : ?>
            <div title="<?php esc_html_e("Safe Box", 'lc-rentals'); ?>" class="lc-rentals__facilities-container-item">
                <?php echo wp_get_attachment_image(79, 'full'); ?>
                <p class="paragraph--black"><?php esc_html_e('Safe Box', 'lc-rentals'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>