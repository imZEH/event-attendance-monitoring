<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    @include('partial.header_css')

</head>

<body>
    <script>
        if (sessionStorage.getItem("token")) {
            window.location.href = "/admin";
        }
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="mx-auto mx-sm-5 text-center">
            <!-- Centering content on tablets and mobile -->
            <!-- Adjusted padding -->
            <img src="../img/logo.png" alt="school logo" width="100" height="90" />
            <a class="navbar-brand" href="/"><b>Holy Child College of Davao</b></a>
        </div>

        <ul class="navbar-nav ml-auto mr-xl-5 mr-sm-2 mr-md-2">
            <li class="nav-item dropdown no-arrow">
                Do you have an account? <a class="navbar-link" href="/register"><b>Register</b></a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 my-5" data-aos="fade-up">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form id="loginForm" class="user">
                                        <p>Please login to your account</p>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                placeholder="Password">
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partial.footer_js')
    @vite('resources/js/auth.js')
</body>

</html>