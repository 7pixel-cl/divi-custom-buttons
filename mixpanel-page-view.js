(function ($) {
    $(document).ready(function () {
        // Replace with your Mixpanel token
        mixpanel.init("1e00878819805c774115c0182d5bae03");

        // Track page view with the page name
        var pageTitle = document.title;
        mixpanel.track('Page View', { 'Page Name': pageTitle });
    });
})(jQuery);
