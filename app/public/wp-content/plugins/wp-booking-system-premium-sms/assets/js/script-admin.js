$ = jQuery.noConflict();

$(document).ready(function () {

    $(document).on('click', '#twilio_test_number_send', function (e) {
        e.preventDefault();

        var data = {};

        data['action'] = 'wpbs_twilio_test_sms';

        data['phone_number'] = $("#twilio_test_number").val()

        $("wpbs-twilio-test-sms-response").html('');

        $.post(ajaxurl, data, function (response) {
            $('.wpbs-twilio-test-sms-response').html(response);
        });
    })
});