mixpanel.init('1e00878819805c774115c0182d5bae03');

(function ($) {
    $(document).ready(function () {
        if (typeof ETBuilderBackend !== 'undefined') {
            ETBuilderBackend.on('app:initialized', function () {
                var customButton = $('<div class="et-fb-custom-button">Custom Button</div>');

                customButton.on('click', function () {
                    mixpanel.track('Custom Button Clicked');
                });

                $('.et-fb-top-menu').append(customButton);
            });
        }
    });
})(jQuery);
