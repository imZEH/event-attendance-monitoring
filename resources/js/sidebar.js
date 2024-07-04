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

    const sidebar = $('#accordionSidebar');
    const toggleButton = $('#sidebarToggle');

    // Check localStorage for sidebar state
    if (localStorage.getItem('sidebarToggled') === 'true') {
        sidebar.addClass('toggled');
    }

    // Add click event listener to the toggle button
    toggleButton.on('click', function () {
        console.log("test");
        if (sidebar.hasClass('toggled')) {
            localStorage.setItem('sidebarToggled', true);
        } else {
            localStorage.setItem('sidebarToggled', false);
        }
    });

});