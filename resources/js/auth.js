$(document).ready(function () {
    $('#loginForm').submit(function (e) {
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
            success: function (data) {
                // Handle successful login, e.g., store token in local storage
                localStorage.setItem('token', data.token);
                sessionStorage.setItem("token", data.token);
                window.location.href = "/admin";
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });

    $('#logoutButton').click(function () {
        // Clear token from localStorage and sessionStorage
        localStorage.removeItem('token');
        sessionStorage.removeItem('token');
        // Redirect user to the login page
        window.location.href = "/";
    });
});
