jQuery(function ($) {
    $(document).on('wpbs_dates_selected', function (event, $calendar_instance) {
        // Start Date
        if (typeof $calendar_instance.find(".wpbs-container").data('start_date') === 'undefined' || $calendar_instance.find(".wpbs-container").data('start_date') == "") {
            return false;
        }
        start_date = new Date($calendar_instance.find(".wpbs-container").data('start_date'))

        // End Date
        if (typeof $calendar_instance.find(".wpbs-container").data('end_date') === 'undefined' || $calendar_instance.find(".wpbs-container").data('end_date') == "") {
            return false;
        }
        end_date = new Date($calendar_instance.find(".wpbs-container").data('end_date'))

        if (!start_date || !end_date) {
            return false;
        }

        // Get available inventory

        $calendar = $calendar_instance.find('.wpbs-container');

        var data = {};
        data['action'] = 'wpbs_get_available_inventory';
        data['start_date'] = start_date.getTime();
        data['end_date'] = end_date.getTime();
        data['calendar_id'] = $calendar.data('id');
        data['limit'] = $calendar_instance.find('.wpbs-form-field-inventory-limit').val();

        var initial_value = $calendar_instance.find('.wpbs-form-field-inventory-dropdown').val();
        /**
         * Make Ajax Request
         * 
         */
        $.post(wpbs_inv_ajax.ajaxurl, data, function (response) {

            max_inventory = parseInt(response);

            $calendar_instance.find('.wpbs-form-field-inventory-maximum').val(max_inventory);
            $calendar_instance.find('.wpbs-form-field-inventory-dropdown option').remove();

            // Add placeholder
            if ($calendar_instance.find('.wpbs-form-field-inventory-dropdown').data('placeholder-enabled')) {
                $calendar_instance.find('.wpbs-form-field-inventory-dropdown').append($('<option>', {
                    text: $calendar_instance.find('.wpbs-form-field-inventory-dropdown').data('placeholder-enabled'),
                    selected: true,
                    disabled: true
                }));
            }
            // Add values
            for (var i = 1; i <= max_inventory; i++) {
                $calendar_instance.find('.wpbs-form-field-inventory-dropdown').append($('<option>', {
                    value: i,
                    text: i
                }));
            }

            if(initial_value){
                $calendar_instance.find('.wpbs-form-field-inventory-dropdown').val(initial_value);
            }

            $(document).trigger('wpbs_form_updated', [$calendar_instance, $calendar_instance.find('.wpbs-form-container').data('id')])
        })
    });

    $(".wpbs-main-wrapper").each(function () {
        $(document).trigger('wpbs_dates_selected', [$(this)])
    })


    $(document).on('wpbs_dates_deselected', function (event, $calendar_instance) {
        $calendar_instance.find('.wpbs-form-field-inventory-dropdown option').remove();

        $calendar_instance.find('.wpbs-form-field-inventory-dropdown').append($('<option>', {
            text: $calendar_instance.find('.wpbs-form-field-inventory-dropdown').data('placeholder-disabled'),
            selected: true,
            disabled: true
        }));
    })
})