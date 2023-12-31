jQuery(function ($) {

    // Change Toggle Button Text
    if ($(".wpbs-currency-toggle-wrapper").length) {
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-button span").html($(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-selected").html());
    };

    // Open
    $(document).on('click', '.wpbs-currency-toggle-wrapper .wpbs-currency-toggle-button', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('wpbs-currency-toggle-button-active');
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-list").toggleClass('wpbs-currency-toggle-list-visible');
    });

    $(document).on('click', '.wpbs-currency-toggle-wrapper', function (e) {
        e.stopPropagation();
    });

    // Close
    $(document).on('click', 'body', function () {
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-button").removeClass('wpbs-currency-toggle-button-active');
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-list").removeClass('wpbs-currency-toggle-list-visible');
    });

    // Change Currency
    $(document).on('click', '.wpbs-currency-toggle-wrapper .wpbs-currency-toggle-list a', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $currency = $(this);
        $currencyData = $currency.data('wpbs-currency-value');
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-list a").removeClass('wpbs-currency-toggle-selected');
        $currency.addClass('wpbs-currency-toggle-selected');
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-button span").html($(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-selected").html());
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-list").removeClass('wpbs-currency-toggle-list-visible');
        $(".wpbs-currency-toggle-wrapper .wpbs-currency-toggle-button").removeClass('wpbs-currency-toggle-button-active');

        $currency.parents('.wpbs-form-container').find('input.wpbs-custom-currency').val($currency.data('wpbs-currency-value'));

        $(document).trigger('wpbs_calculate_price');
    });

});
