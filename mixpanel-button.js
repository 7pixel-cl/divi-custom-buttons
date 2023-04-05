(function ($) {
    $(document).ready(function () {
        // Replace with your Mixpanel token
        mixpanel.init("YOUR_MIXPANEL_TOKEN");

        // Track Mixpanel events on button click
        $('.et_pb_custom_mixpanel_button').on('click', function () {
           
            var eventName = $(this).data('mixpanel-event');
            if (eventName) {
            mixpanel.track(eventName);
            }
            });
            });
            })(jQuery);