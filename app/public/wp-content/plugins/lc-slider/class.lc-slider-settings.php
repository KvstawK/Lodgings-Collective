<?php

if(!class_exists('LC_Slider_Settings')) {
    class LC_Slider_Settings {
        public static $options;

        public function __construct() {
            self::$options = get_option('lc_slider_options');
            add_action('admin_init', array($this, 'admin_init'));
        }

        public function admin_init() {
            add_settings_section(
                'lc_slider_main_section',
                esc_html__('How Does It Works?', 'lc-slider'),
                null,
                'lc_slider_page1'
            );

            add_settings_section(
                'lc_slider_second_section',
                esc_html__('Other options', 'lc-slider'),
                null,
                'lc_slider_page2'
            );

            add_settings_field(
                'lc_slider_shortcode',
                'Shortcode',
                array($this, 'lc_slider_shortcode_callback'),
                'lc_slider_page1',
                'lc_slider_main_section',
            );

            add_settings_field(
                'lc_slider_shortcode2',
                'Shortcode2',
                array($this, 'lc_slider_shortcode2_callback'),
                'lc_slider_page2',
                'lc_slider_second_section',
                array(
                        'label_for' => 'lc_slider_shortcode2'
                )
            );

            add_settings_field(
                'lc_slider_bullets',
                'Display Bullets',
                array($this, 'lc_slider_bullets_callback'),
                'lc_slider_page2',
                'lc_slider_second_section',
                array(
                        'label_for' => 'lc_slider_bullets'
                )
            );

            add_settings_field(
                'lc_slider_style',
                'Display Style',
                array($this, 'lc_slider_style_callback'),
                'lc_slider_page2',
                'lc_slider_second_section',
                array(
                        'items' => array(
                                'style-1',
                                'style-2'
                        ),
                    'label_for' => 'lc_slider_style'
                )
            );

            register_setting('lc_slider_group', 'lc_slider_options', array($this, 'lc_slider_validate'));
        }

        public function lc_slider_shortcode_callback() {
            ?>
            <span><?php esc_html_e('Use the shortcode [lc_slider], that you can find in the "Manage Sliders" page, to display the slider wherever you want.', 'lc-slider'); ?></span>
            <?php
        }

        public function lc_slider_shortcode2_callback($args) {
            ?>
            <input type="text" id="lc_slider_shortcode2" name="lc_slider_options[lc_slider_shortcode2]" value="<?php echo isset(self::$options['lc_slider_shortcode2']) ? esc_attr(self::$options['lc_slider_shortcode2']) : '' ?>">
            <?php
        }

        public function lc_slider_bullets_callback($args) {
            ?>
            <label for="lc_slider_bullets"><?php esc_html_e('Whether to display bullets or not', 'lc-slider'); ?></label>
            <input type="checkbox" id="lc_slider_bullets" name="lc_slider_options[lc_slider_bullets]" value="1" <?php
            if(isset(self::$options['lc_slider_bullets'])) {
                checked("1", self::$options['lc_slider_bullets'], true);
                }
            ?>>
            <?php
        }

        public function lc_slider_style_callback($args) {
            ?>
            <label for="lc_slider_style"><?php esc_html_e('Choose style', 'lc-slider'); ?></label>
            <select name="lc_slider_options[lc_slider_style]" id="lc_slider_style">
                <?php
                foreach ($args['items'] as $item) :
                ?>
                    <option value="<?php echo esc_attr($item) ?>" <?php isset(self::$options['lc_slider_style']) ? selected($item, self::$options['lc_slider_style']) : '' ?>><?php echo esc_html_e(ucfirst($item), 'lc-slider') ?></option>
                <?php endforeach; ?>
            </select>
            <?php
        }

        public function lc_slider_validate($input) {
            $new_input = array();
            foreach ($input as $key => $value) {
                $new_input[$key] = sanitize_text_field($value);
//                switch ($key) {
//                    case 'lc_slider_text':
//                        $new_input[$key] = sanitize_text_field($value);
//                    break;
//                    case 'lc_slider_url':
//                        $new_input[$key] = esc_url_raw($value);
//                    break;
//                    case 'lc_slider_int':
//                        $new_input[$key] = absint($value);
//                    break;
//                    default:
//                        $new_input[$key] = sanitize_text_field($value);
//                    break;
//                }
            }
            return $new_input;
        }
    }
}