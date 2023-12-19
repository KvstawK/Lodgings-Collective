jQuery(function ($) {
    $("#multiple_currencies_auto_rate").change(function () {
        if($(this).prop('checked')){
            $(".wpbs-currency-conversion-input").prop('disabled', true);
            $(".wpbs-currency-conversion-input").val('').attr('placeholder', 'Conversion rates will appear after saving.')
        } else {
            $(".wpbs-currency-conversion-input").prop('disabled', false);
            $(".wpbs-currency-conversion-input").val('').attr('placeholder', '')
        }
    })
})