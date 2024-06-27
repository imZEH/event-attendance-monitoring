<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register | Event Attendance Monitoring System</title>

    @include('partial.header_css')

</head>

<body>
    <script>
        if (sessionStorage.getItem("user")) {
            window.location.href = "/";
        }
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="mx-auto mx-sm-5 text-center">
            <!-- Centering content on tablets and mobile -->
            <!-- Adjusted padding -->
            <img src="../img/logo.png" alt="school logo" width="100" height="90" />
            <a class="navbar-brand" href="/"><b>Holy Child College of Davao</b></a>
        </div>


        <ul class="navbar-nav ml-auto mr-lg-5 mr-xl-5 mr-sm-2 mr-md-2">
            <li class="nav-item dropdown no-arrow">
                <a class="navbar-link" href="/"><b>Login Account</b></a>
            </li>
        </ul>
    </nav>
    <div class="container mt-5 pt-5">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-xl-10 col-lg-8 col-md-10">
                <div class="o-hidden border-0">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h1 class="h1 text-gray-900 mb-4">Register</h1>
                        </div>
                        <form class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="First Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleStudentID"
                                    placeholder="Student ID">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleBirthday"
                                    placeholder="Birthday">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="courses">
                                    <option selected>Select your course</option>
                                    <option value="Criminology">Criminology</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Business Administration">Business Administration</option>
                                    <option value="BSED">BSED</option>
                                    <option value="BEED - Generalist">BEED - Generalist</option>
                                    <option value="HCIT">HCIT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="yearLevel">
                                    <option selected>Select year level</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <a href="login.html" class="btn btn-primary btn-user btn-block">
                                Register
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>