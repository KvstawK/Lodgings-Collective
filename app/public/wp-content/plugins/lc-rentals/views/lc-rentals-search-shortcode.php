<form aria-labelledby="search_rentals">
    <fieldset>
        <div class="home__search-form-legend">
            <legend id="search_rentals" class="headline-2"><?php esc_html_e('Search The Availability Of Our Rentals', 'lc-rentals'); ?></legend>
        </div>
        <div class="home__search-form-info">
            <div class="home__search-form-info-items">
                <div title="<?php esc_html_e('Rental Location', 'lc-rentals'); ?>" class="home__search-form-info-items-field">
                    <label for="location" class="paragraph-first-line"><?php esc_html_e('Location', 'lc-rentals'); ?></label>
                    <input id="location" name="location" type="text" autocomplete="off" required>
                    <?php
                    $locations = get_terms([
                        'taxonomy' => 'rental-location',
//                        Uncomment if you would like only the first parent to appear
//                        'parent' => 0,
                        'hide_empty' => false
                    ]);
                    foreach ($locations as $location) : ?>
                        <div class="home__search-form-info-items-field-menu">
                            <?php echo $location->name ?>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
                <div title="<?php esc_html_e('Rental Type', 'lc-rentals'); ?>" class="home__search-form-info-items-field">
                    <label for="type" class="paragraph-first-line"><?php esc_html_e('Type', 'lc-rentals'); ?></label>
                    <input id="type" name="type" type="text">
                    <?php
                    $types = get_terms([
                        'taxonomy' => 'rental-category',
                        'parent' => 0,
                        'hide_empty' => false
                    ]);
                    foreach ($types as $type) : ?>
                        <div class="home__search-form-info-items-field-menu">
                            <?php echo $type->name ?>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
                <div title="<?php esc_html_e('Check-in Date', 'lc-rentals'); ?>" class="home__search-form-info-items-field lc-datepicker lc-datepicker-check-in">
                    <div id="datepickerCheckIn" class="lc-datepicker check-in">
                        <label for="arrival" class="paragraph-first-line"><?php esc_html_e('Check-in', 'lc-rentals'); ?></label>
                        <input role="combobox" type="text" id="arrival" class="arrival" name="arrival" aria-autocomplete="none" aria-expanded="false" aria-haspopup="dialog" aria-controls="lc-datepicker-check-in-modal" readonly="readonly" aria-label="<?php esc_attr_e('Choose check-in date', 'lc-rentals'); ?>" required placeholder="<?php esc_attr_e('Check-in', 'lc-rentals'); ?>"><div class="lc-calendar-icon" aria-hidden="true"><?php echo wp_get_attachment_image(2218, 'full') ?></div>
                        <div role="dialog" aria-modal="true" class="lc-datepicker-check-in-modal" aria-label="<?php esc_attr_e('Choose check-in date', 'lc-rentals'); ?>">
                            <div class="lc-datepicker-header">
                                <button type="button" class="prev-month" aria-label="<?php esc_attr_e('Previous month', 'lc-rentals'); ?>"><?php echo wp_get_attachment_image(2110, 'full') ?></button>
                                <div id="grid-label" class="month-year" aria-live="polite"></div>
                                <button type="button" class="next-month" aria-label="<?php esc_attr_e('Next month', 'lc-rentals'); ?>"><?php echo wp_get_attachment_image(2111, 'full') ?></button>
                            </div>
                            <div class="lc-datepicker-table">
                                <table role="grid" class="lc-datepicker-table-dates">
                                    <thead>
                                    <tr>
                                        <th scope="col" abbr="<?php esc_attr_e('Sunday', 'lc-rentals'); ?>"><?php echo esc_html('Su') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Monday', 'lc-rentals'); ?>"><?php echo esc_html('Mo') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Tuesday', 'lc-rentals'); ?>"><?php echo esc_html('Tu') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Wednesday', 'lc-rentals'); ?>"><?php echo esc_html('We') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Thursday', 'lc-rentals'); ?>"><?php echo esc_html('Th') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Friday', 'lc-rentals'); ?>"><?php echo esc_html('Fr') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Saturday', 'lc-rentals'); ?>"><?php echo esc_html('Sa') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td tabindex="0" data-date="2020-02-01"><?php echo esc_html('1') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('2') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('3') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('4') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('5') ?></td>
                                        <td tabindex="0" data-date="2020-02-06"><?php echo esc_html('6') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('7') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('8') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('9') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('10') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('11') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('12') ?></td>
                                        <td tabindex="0" data-date="2020-02-06"><?php echo esc_html('13') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('14') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('15') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('16') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('17') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('18') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('19') ?></td>
                                        <td role="gridcell" aria-selected="true" tabindex="0" data-date="2020-02-06"><?php echo esc_html('20') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('21') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('22') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('23') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('24') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('25') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('26') ?></td>
                                        <td tabindex="0" data-date="2020-02-06"><?php echo esc_html('27') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('28') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('29') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('30') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('31') ?></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div title="<?php esc_html_e('Check-out Date', 'lc-rentals'); ?>" class="home__search-form-info-items-field lc-datepicker-check-out">
                    <div id="datepickerCheckOut" class="lc-datepicker check-out">
                        <label for="departure" class="paragraph-first-line"><?php esc_html_e('Check-out', 'lc-rentals'); ?></label>
                        <input role="combobox" type="text" id="departure" class="departure" name="departure" aria-autocomplete="none" aria-expanded="false" aria-haspopup="dialog" aria-controls="lc-datepicker-check-out-modal" readonly="readonly" aria-label="<?php esc_attr_e('Choose check-out date', 'lc-rentals'); ?>" required placeholder="<?php esc_attr_e('Check-out', 'lc-rentals'); ?>"><div class="lc-calendar-icon" aria-hidden="true"><?php echo wp_get_attachment_image(2218, 'full') ?></div>
                        <div role="dialog" aria-modal="true" class="lc-datepicker-check-out-modal" aria-label="<?php esc_attr_e('Choose check-out date', 'lc-rentals'); ?>">
                            <div class="lc-datepicker-header">
                                <button type="button" class="prev-month" aria-label="<?php esc_attr_e('Previous month', 'lc-rentals'); ?>"><?php echo wp_get_attachment_image(2110, 'full') ?></button>
                                <div id="grid-label" class="month-year" aria-live="polite"></div>
                                <button type="button" class="next-month" aria-label="<?php esc_attr_e('Next month', 'lc-rentals'); ?>"><?php echo wp_get_attachment_image(2111, 'full') ?></button>
                            </div>
                            <div class="lc-datepicker-table">
                                <table role="grid" class="lc-datepicker-table-dates">
                                    <thead>
                                    <tr>
                                        <th scope="col" abbr="<?php esc_attr_e('Sunday', 'lc-rentals'); ?>"><?php echo esc_html('Su') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Monday', 'lc-rentals'); ?>"><?php echo esc_html('Mo') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Tuesday', 'lc-rentals'); ?>"><?php echo esc_html('Tu') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Wednesday', 'lc-rentals'); ?>"><?php echo esc_html('We') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Thursday', 'lc-rentals'); ?>"><?php echo esc_html('Th') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Friday', 'lc-rentals'); ?>"><?php echo esc_html('Fr') ?></th>
                                        <th scope="col" abbr="<?php esc_attr_e('Saturday', 'lc-rentals'); ?>"><?php echo esc_html('Sa') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td tabindex="0" data-date="2020-02-01"><?php echo esc_html('1') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('2') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('3') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('4') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('5') ?></td>
                                        <td tabindex="0" data-date="2020-02-06"><?php echo esc_html('6') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('7') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('8') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('9') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('10') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('11') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('12') ?></td>
                                        <td tabindex="0" data-date="2020-02-06"><?php echo esc_html('13') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('14') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('15') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('16') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('17') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('18') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('19') ?></td>
                                        <td role="gridcell" aria-selected="true" tabindex="0" data-date="2020-02-06"><?php echo esc_html('20') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('21') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('22') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('23') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('24') ?></td>
                                        <td tabindex="0" data-date="2020-02-04"><?php echo esc_html('25') ?></td>
                                        <td tabindex="0" data-date="2020-02-05"><?php echo esc_html('26') ?></td>
                                        <td tabindex="0" data-date="2020-02-06"><?php echo esc_html('27') ?></td>
                                        <td tabindex="0" data-date="2020-02-07"><?php echo esc_html('28') ?></td>
                                        <td tabindex="0" data-date="2020-02-08"><?php echo esc_html('29') ?></td>
                                    </tr>
                                    <tr>
                                        <td tabindex="0" data-date="2020-02-02"><?php echo esc_html('30') ?></td>
                                        <td tabindex="0" data-date="2020-02-03"><?php echo esc_html('31') ?></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                        <td class="disabled" tabindex="0"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div title="<?php esc_html_e('Number Of Persons', 'lc-rentals'); ?>" class="home__search-form-info-items-field">
                    <label for="persons" class="paragraph-first-line"><?php esc_html_e('persons', 'lc-rentals'); ?></label>
                    <input id="persons" name="persons" type="text" required>
                </div>
            </div>
            <div title="<?php esc_html_e('Search', 'lc-rentals'); ?>" class="home__search-form-info-search">
                <div aria-hidden="true"><?php echo wp_get_attachment_image(2216, 'full') ?></div>
                <input type="submit" value="<?php esc_html_e('Search', 'lc-rentals'); ?>">
            </div>
        </div>
    </fieldset>
</form>