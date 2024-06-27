$(document).ready(function () {
    // Get the current URL path
    var currentPath = window.location.pathname;

    // Iterate over each nav-link and check if the href matches the current path
    $('.nav-item .nav-link').each(function () {
        var $this = $(this);
        if ($this.attr('href') === currentPath) {
            // Remove the active class from any previously active nav-item
            $('.nav-item.active').removeClass('active');

            // Add the active class to the current nav-item
            $this.closest('.nav-item').addClass('active');
        }
    });
});
