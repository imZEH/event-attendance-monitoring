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

    <style>
        #camera-container {
            position: relative;
        }

        #video {
            width: 100%;
            border: 2px solid #ccc;
            border-radius: 8px;
        }

        #square-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 50%;
            padding-bottom: 50%;
            /* This creates a responsive square */
            margin-top: -25%;
            /* Half of the width/height */
            margin-left: -25%;
            /* Half of the width/height */
            border: 2px dashed #fff;
            box-sizing: border-box;
        }

        #icon-and-guidelines {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
        }

        #capture-btn {
            margin-top: 10px;
        }

        .icon {
            max-width: 50px;
        }

        #registrationCarousel {
            height: 500px;
            /* Adjust height as needed */
            touch-action: pan-y;
            /* Allow vertical scrolling, but not horizontal swiping */
        }
    </style>

</head>

<body>
    <script>
        if (sessionStorage.getItem("user")) {
            window.location.href = "/";
        }
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="mx-auto mx-sm-5 text-center">
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
                <div class="card-body p-5">
                    <div class="text-center">
                        <h1 class="h1 text-gray-900 mb-4">Register</h1>
                    </div>
                    <div class="text-center mt-3 mb-3">
                        <b>Step 1 of 2</b>
                        <p id="testing"></p>
                    </div>
                    <!-- Bootstrap Carousel -->
                    <div id="registrationCarousel" class="carousel slide" data-ride="carousel" data-interval="false" data-touch="false">
                        <div class="carousel-inner">
                            <!-- Step 1 -->
                            <div class="carousel-item active">
                                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <form id="step1" class="user" style="width: 100%; max-width: 600px;">
                                        <!-- Form contents -->
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleFirstName" placeholder="First Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLastName" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleStudentID" placeholder="Student ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleBirthday" placeholder="Birthday">
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select custom-select-sm form-control form-control"
                                                id="branches">
                                                <option selected>Select your branch</option>
                                                <option value="Green Meadows">Green Meadows</option>
                                                <option value="Kalayaan">Kalayaan</option>
                                                <option value="Trinity">Trinity</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select custom-select-sm form-control form-control"
                                                id="courses">
                                                <option selected>Select your course</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select custom-select-sm form-control form-control"
                                                id="yearLevel">
                                                <option selected>Select year level</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Email Address">
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
                                    </form>
                                </div>
                            </div>
                            <!-- Step 2 -->
                            <div class="carousel-item">
                                <div class="d-flex flex-column justify-content-center align-items-center"
                                    style="height: 100%;">
                                    <div id="step2" class="form-group text-center">
                                        <h2 class="text-gray-900 mb-4">Face Registration</h2>
                                        <div id="camera-container" class="mb-3">
                                            <div id="square-overlay"></div>
                                            <video id="video" autoplay style="width: 100%; max-width: 500px;"></video>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Buttons outside carousel -->
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-primary btn-user btn-block" id="nextStep">Next</button>
                    <button type="button" class="btn btn-secondary btn-user btn-block mt-2" id="backStep">Back</button>
                    <button type="button" class="btn btn-primary btn-user btn-block mt-2" id="capture-btn">Capture</button>
                </div>
                </div>
            </div>
        </div>
    </div>


    @include('partial.footer_js')
    <script defer src="js/face-api.min.js"></script>
    <script>
        $(document).ready(function () {
            var courseOptions = {
                'Green Meadows': [
                    'Grade School',
                    'SHS',
                    'Criminology',
                    'Information Technology',
                    'Business Administration',
                    'BSED',
                    'BEED - Generalist'
                ],
                'Kalayaan': [
                    'SHS',
                    'Grade School',
                    'HCIT'
                ],
                'Trinity': [
                    'SHS',
                    'Grade School',
                ]
            };

            var yearLevelOptions = {
                'Criminology': ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                'Information Technology': ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                'Business Administration': ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                'BSED': ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                'BEED - Generalist': ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                'HCIT': ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                'Grade School': ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6',
                    'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10'
                ],
                'SHS': ['Grade 11', 'Grade 12']
            };

            $('#branches').on('change', function () {
                var selectedBranch = $(this).val();
                var $courses = $('#courses');
                $courses.empty();
                $courses.append('<option selected>Select your course</option>');

                if (selectedBranch in courseOptions) {
                    $.each(courseOptions[selectedBranch], function (index, course) {
                        $courses.append('<option value="' + course + '">' + course +
                            '</option>');
                    });
                }

                $('#yearLevel').empty();
                $('#yearLevel').append('<option selected>Select year level</option>');
            });

            $('#courses').on('change', function () {
                var selectedCourse = $(this).val();
                var $yearLevel = $('#yearLevel');
                $yearLevel.empty();
                $yearLevel.append('<option selected>Select year level</option>');

                if (selectedCourse in yearLevelOptions) {
                    $.each(yearLevelOptions[selectedCourse], function (index, yearLevel) {
                        $yearLevel.append('<option value="' + yearLevel + '">' + yearLevel +
                            '</option>');
                    });
                }
            });



            const $video = $('#video')[0];
            const $canvas = $('#canvas')[0];
            const $captureBtn = $('#capture-btn');

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function (stream) {
                    $video.srcObject = stream;
                })
                .catch(function (err) {
                    console.error("Error accessing camera: ", err);
                });

            $captureBtn.on('click', function () {
                const context = $canvas.getContext('2d');
                $canvas.width = $video.videoWidth;
                $canvas.height = $video.videoHeight;
                context.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                // Convert the canvas image to data URL (base64 encoded) and log it or send it to server
                const imageDataUrl = $canvas.toDataURL('image/png');
                console.log(imageDataUrl);
                // You can send `imageDataUrl` to your server for further processing
            });

            var $carousel = $('#registrationCarousel');

            $('#nextStep').on('click', function () {
                $carousel.carousel('next');
            });

            $('#backStep').on('click', function () {
                $carousel.carousel('prev');
            });
        });
    </script>
</body>

</html>