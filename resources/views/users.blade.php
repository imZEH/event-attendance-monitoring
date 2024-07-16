<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users | Event Attendance Monitoring System</title>

    @include('partial.header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body id="page-top">
    @include('partial.session')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partial.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partial.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h4 class="m-0 font-weight-bold text-primary">Users</h4>
                            <button onclick="OpenModal()" class="btn btn-primary">Add User</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('partial.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- USER MODAL HERE -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduser">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" id="firstName" name="firstName"
                                    aria-describedby="nameHelp" placeholder="First Name">
                                <span id="firstNameError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" id="middleName" name="middleName"
                                    aria-describedby="nameHelp" placeholder="Middle Name">
                                <span id="middleNameError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" id="lastName" name="lastName"
                                    aria-describedby="nameHelp" placeholder="Last Name">
                                <span id="lastNameError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <select class="form-control" id="userType" name="userType">
                                    <option>Select</option>
                                    <option value="admin">Administrator</option>
                                    <option value="programhead">Program Head</option>
                                    <option value="adviser">Adviser</option>
                                </select>
                                <span id="userTypeError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" class="form-control input-lg" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Email">
                                <span id="emailError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-12 position-relative">
                                <input type="password" class="form-control input-lg" id="password" name="password"
                                    placeholder="Password">
                                <span id="passwordError" class="text-danger"></span>
                                <button type="button" class="btn btn-secondary position-absolute"
                                    style="right: 13px; top: 0px;" onclick="generatePassword()"><i
                                        class="fas fa-lock"></i></button>
                                <button type="button" class="btn btn-secondary position-absolute"
                                    style="right: 55px; top: 0px;"
                                    onclick="togglePasswordVisibility('password', 'cpassword', 'showicon', 'hideicon')"><i
                                        id="showicon" class="fas fa-eye"></i><i id="hideicon"
                                        class="far fa-eye-slash d-none"></i></button>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control input-lg" id="cpassword" name="cpassword"
                                    placeholder="Confirm Password">
                                <span id="cpasswordError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="saveBtn" type="button" class="btn btn-primary" onclick="save()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    @include('partial.scrolltotop')

    <!-- Logout Modal-->
    @include('partial.logout_modal')

    @include('partial.footer_js')
    @vite('resources/js/auth.js')
    @vite('resources/js/sidebar.js')

    <script>
        function generatePassword() {
            var length = 12;
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$";
            var password = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                password += charset.charAt(Math.floor(Math.random() * n));
            }
            document.getElementById("password").value = password;
            document.getElementById("cpassword").value = password;
        }

        function OpenModal(){
            clearFields();
            $('#userModal').modal('show');
        }

        function togglePasswordVisibility(fieldId, cpasswordId, showiconId, hideIconId) {
            var field = document.getElementById(fieldId);
            var cpasswordId = document.getElementById(cpasswordId);
            var button = field.nextElementSibling;
            if (field.type === "password" && cpasswordId.type === "password") {
                field.type = "text";
                cpasswordId.type = "text";
                $('#' + showiconId + '').addClass("d-none");
                $('#' + hideIconId + '').removeClass("d-none");
            } else {
                field.type = "password";
                cpasswordId.type = "password";
                $('#' + showiconId + '').removeClass("d-none");
                $('#' + hideIconId + '').addClass("d-none");
            }
        }

        function save() {
            // Reset previous error messages
            $('.text-danger').text('');

            // Retrieve input values
            var firstname = $('#firstName').val().trim();
            var middleName = $('#middleName').val().trim();
            var lastName = $('#lastName').val().trim();
            var userType = $('#userType').val();
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            var cpassword = $('#cpassword').val().trim();
            var userId = $('#saveBtn').data('userId');

            var isValid = validation(firstname, lastName, userType, email, password, cpassword, userId);

            var postData = {
                "firstname": firstname,
                "lastname": lastName,
                "middlename": middleName,
                "studentId": "",
                "birthday": "",
                "yearlevel": "",
                "course": "",
                "userType": userType,
                "userId": userId,
                "email": email,
                "password": password
            }

            if (isValid) {
                if (userId != 0) {
                    // Update existing user
                    _PUT('/api/v1/userdetails', postData, userId, function (resp) {
                        if (resp.status_code === 200) {
                            $.toast({
                                heading: 'Success',
                                text: resp.message,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-right'
                            });
                            clearFields();
                            $('#userModal').modal('hide');
                            $('#userTable').DataTable().ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: 'Unable to update user\'s information',
                                showHideTransition: 'fade',
                                icon: 'error',
                                position: 'top-right'
                            });
                        }
                    }, function (error) {
                        for (let field in error.responseJSON.errors) {
                            error.responseJSON.errors[field].forEach(error => {
                                $.toast({
                                    heading: 'Error',
                                    text: error,
                                    showHideTransition: 'fade',
                                    icon: 'error',
                                    position: 'top-right'
                                });
                            });
                        }
                    });
                } else {
                    // Create new user
                    _POST('/api/v1/userdetails', postData, function (resp) {
                        if (resp.status_code === 201) {
                            $.toast({
                                heading: 'Success',
                                text: resp.message,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-right'
                            });
                            clearFields();
                            $('#userModal').modal('hide');
                            $('#userTable').DataTable().ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: 'Unable to save user\'s information',
                                showHideTransition: 'fade',
                                icon: 'error',
                                position: 'top-right'
                            });
                        }
                    }, function (error) {
                        for (let field in error.responseJSON.errors) {
                            error.responseJSON.errors[field].forEach(error => {
                                $.toast({
                                    heading: 'Error',
                                    text: error,
                                    showHideTransition: 'fade',
                                    icon: 'error',
                                    position: 'top-right'
                                });
                            });
                        }
                    });
                }
            }
        }


        function validation(firstname, lastName, userType, email, password, cpassword, userId) {
            var isValid = true;
            if (firstname === '') {
                $('#firstNameError').text('Please enter First Name');
                isValid = false;
            }
            if (lastName === '') {
                $('#lastNameError').text('Please enter Last Name');
                isValid = false;
            }
            if (userType === 'Select') {
                $('#userTypeError').text('Please select User Type');
                isValid = false;
            }
            if (email === '') {
                $('#emailError').text('Please enter Email');
                isValid = false;
            } else if (!isValidEmail(email)) { // Check if email format is valid
                $('#emailError').text('Invalid email format');
                isValid = false;
            }

            if (userId == null) {
                if (password === '') {
                    $('#passwordError').text('Please enter Password');
                    isValid = false;
                }
                if (cpassword === '') {
                    $('#cpasswordError').text('Please confirm Password');
                    isValid = false;
                } else if (password !== cpassword) { // Check if passwords match
                    $('#cpasswordError').text('Passwords do not match');
                    isValid = false;
                }
            }


            return isValid;
        }

        function clearFields() {
            $('#firstName').val('');
            $('#middleName').val('');
            $('#lastName').val('');
            $('#userType').val('Select');
            $('#email').val('');
            $('#password').val('');
            $('#cpassword').val('');

            $('#saveBtn').data('userId', 0);
            $('.text-danger').text('');
        }

        // Helper function to validate email format
        function isValidEmail(email) {
            // Basic email format check
            var emailRegex = /\S+@\S+\.\S+/;
            return emailRegex.test(email);
        }

        function formatDate(dateString) {
            return moment(dateString).format('MM/DD/yyyy hh:mm:ss A');
        }

        $(document).ready(function () {
            var table = $('#userTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "paginate": {
                        "next": "&gt;",
                        "previous": "&lt;"
                    },
                    "search": "Search:",
                    "lengthMenu": "Show _MENU_ entries"
                },
                "ajax": {
                    "url": "/api/v1/userdetails",
                    "dataSrc": "data"
                },
                "columns": [{
                        "data": "firstname",
                        "render": function (data, type, row) {
                            return data + ' ' + row.lastname;
                        }
                    },
                    {
                        "data": "userType"
                    },
                    {
                        "data": "created_at",
                        "render": function (data) {
                            return formatDate(data);
                        }
                    },
                    {
                        "data": null,
                        "defaultContent": `
                            <button class="btn btn-warning btn-circle edit-btn" title="Edit">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-circle delete-btn" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>`
                    }
                ]
            });

            $('#userTable tbody').on('click', 'button.edit-btn', function () {
                clearFields();
                var data = table.row($(this).parents('tr')).data();
                var userDetails = _GETById(`/api/v1/userdetails`, data.id, function (resp) {
                    var data = resp.data;

                    $('#firstName').val(data.firstname);
                    $('#middleName').val(data.middlename);
                    $('#lastName').val(data.lastname);
                    $('#userType').val(data.userType);
                    $('#email').val(data.email);
                    $('#userModal').modal('show');

                    $('#saveBtn').data('userId', data.id);

                });
            });

            $('#userTable tbody').on('click', 'button.delete-btn', function () {
                var data = table.row($(this).parents('tr')).data();
                var userId = data.id; // Assuming the user ID is available in the data
                if (confirm('Are you sure you want to delete this user?')) {
                    _DELETE(`/api/v1/userdetails`, userId, function (resp) {
                        if (resp.status_code === 200) {
                            $.toast({
                                heading: 'Success',
                                text: resp.message,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-right'
                            });
                            table.ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: 'Unable to delete user',
                                showHideTransition: 'fade',
                                icon: 'error',
                                position: 'top-right'
                            });
                        }
                    }, function (error) {
                        $.toast({
                            heading: 'Error',
                            text: 'Unable to communicate with server',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right'
                        });
                    });
                }
            });
        });
    </script>
</body>

</html>