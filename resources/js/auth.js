$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        $('#loginButton').hide(); // Hide the login button
        $("#loginSpinner").removeClass("d-none"); // Show the loading spinner
        $("#errorMessageContainer").addClass("d-none"); // Show the loading spinner

        e.preventDefault();

        var data = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: data,
            dataType: 'json',
            success: function (resp) {
                // Handle successful login, e.g., store token in local storage
                sessionStorage.setItem("user", JSON.stringify(resp.data));
                window.location.href = "/";
            },
            error: function (xhr, status, error) {
                // Handle error
                $("#errorMessageContainer").removeClass("d-none"); // Show the loading spinner
                $("#loginSpinner").addClass("d-none"); // Show the loading spinner
                $('#loginButton').show(); // Hide the login button
            }
        });
    });

    $('#logoutButton').click(function () {
        // Clear token from localStorage and sessionStorage
        sessionStorage.removeItem('user');
        // Redirect user to the login page
        window.location.href = "/";
    });
});