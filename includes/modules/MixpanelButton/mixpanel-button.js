(function ($) {
    $(document).ready(function () {
        // Replace with your Mixpanel token
        mixpanel.init("1e00878819805c774115c0182d5bae03");

        // Track Mixpanel events on button click
        $('.et_pb_custom_mixpanel_button').on('click', function () {
            var eventName = $(this).data('mixpanel-event');
            if (eventName) {
                mixpanel.track(eventName);
            }
        });
    });
})(jQuery);