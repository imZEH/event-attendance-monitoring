<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Events | Event Attendance Monitoring System</title>

    @include('partial.header_css')



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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h4 class="m-0 font-weight-bold text-primary">Events</h4>
                            <button onclick="OpenModal()" class="btn btn-primary">Add Event</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="ggTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time (AM)</th>
                                            <th>End Time (AM)</th>
                                            <th>Grace Period (AM)</th>
                                            <th>Start Time (PM)</th>
                                            <th>End Time (PM)</th>
                                            <th>Grace Period (PM)</th>
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
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModal" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduser">Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-5">
                                <h5 class="mb-4">Event Details</h5>
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control input-lg" id="eventName" name="eventName"
                                        aria-describedby="nameHelp" placeholder="Event Name">
                                    <span id="eventNameError" class="text-danger"></span>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control input-lg" id="location" name="location"
                                        aria-describedby="nameHelp" placeholder="Location">
                                    <span id="locationError" class="text-danger"></span>
                                </div>
                                <div class="form-group mb-4">
                                    <textarea class="form-control input-lg" id="description" name="description"
                                        aria-describedby="nameHelp" placeholder="Description"></textarea>
                                    <span id="descriptionError" class="text-danger"></span>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="startDate">Start Date:</label>
                                    <input id="startDate" class="form-control input-lg" />
                                    <span id="startDateError" class="text-danger"></span>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="endDate">End Date:</label>
                                    <input id="endDate" class="form-control input-lg" />
                                    <span id="endDateError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Vertical Line Separator -->
                            <div class="col-md-1 d-flex justify-content-center">
                                <div class="vertical-line"></div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <h5 class="mb-4">Event Schedule</h5>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="startTimeAM">Start Time (AM):</label>
                                                <input id="startTimeAM" class="form-control input-lg" />
                                                <span id="startTimeAMError" class="text-danger"></span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="startTimePM">Start Time (PM):</label>
                                                <input id="startTimePM" class="form-control input-lg" />
                                                <span id="startTimePMError" class="text-danger"></span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="gracePeriodAM">Grace Period (AM):</label>
                                                <input id="gracePeriodAM" class="form-control input-lg" type="number"
                                                    min="1" step="1" />
                                                <span id="gracePeriodAMError" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group mb-4">
                                                <label for="endTimeAM">End Time (AM):</label>
                                                <input id="endTimeAM" class="form-control input-lg" />
                                                <span id="endTimeAMError" class="text-danger"></span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="endTimePM">End Time (PM):</label>
                                                <input id="endTimePM" class="form-control input-lg" />
                                                <span id="endTimePMError" class="text-danger"></span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="gracePeriodPM">Grace Period (PM):</label>
                                                <input id="gracePeriodPM" class="form-control input-lg" type="number"
                                                    min="1" step="1" />
                                                <span id="gracePeriodPMError" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        const dateRegex = /^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/\d{4}$/;
        const timeRegex = /^([01][0-9]|2[0-3]):[0-5][0-9]$/;
        const positiveNumberRegex = /^\d+(\.\d+)?$/;

        $(document).ready(function () {
            var table = $('#ggTable').DataTable({
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
                    "url": "/api/v1/events",
                    "dataSrc": "data"
                },
                "columns": [{
                        "data": "eventName",
                        "render": function (data) {
                            return formatDescription(data);
                        }
                    },
                    {
                        "data": "location",
                        "render": function (data) {
                            return formatDescription(data);
                        }
                    },
                    {
                        "data": "description",
                        "render": function (data) {
                            return formatDescription(data);
                        }
                    },
                    {
                        "data": "eventStartDate",
                        "render": function (data) {
                            return formatEventDate(data);
                        }
                    },
                    {
                        "data": "eventEndDate",
                        "render": function (data) {
                            return formatEventDate(data);
                        }
                    },
                    {
                        "data": "startTimeAM",
                        "render": function (data) {
                            return formatTime(data);
                        }
                    },
                    {
                        "data": "endTimeAM",
                        "render": function (data) {
                            return formatTime(data);
                        }
                    },
                    {
                        "data": "gracePeriodAM"
                    },
                    {
                        "data": "startTimePM",
                        "render": function (data) {
                            return formatTime(data);
                        }
                    },
                    {
                        "data": "endTimePM",
                        "render": function (data) {
                            return formatTime(data);
                        }
                    },
                    {
                        "data": "gracePeriodPM"
                    },
                    {
                        "data": "created_at",
                        "render": function (data) {
                            return formatCreatedDate(data);
                        }
                    },
                    {
                        "data": null,
                        "defaultContent": `
                            <button class="btn btn-sm btn-warning btn-circle edit-btn" title="Edit">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger btn-circle delete-btn" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>`
                    }
                ]
            });

            $('#ggTable tbody').on('click', 'button.edit-btn', function () {
                clearFields();
                var data = table.row($(this).parents('tr')).data();
                var eventDetails = _GETById(`/api/v1/events`, data.id, function (resp) {
                    var data = resp.data;

                    var eventName = $('#eventName').val(data.eventName);
                    var location = $('#location').val(data.location);
                    var description = $('#description').val(data.description);
                    var startDate = $('#startDate').val(convertToDateStr(data.eventStartDate));
                    var endDate = $('#endDate').val(convertToDateStr(data.eventEndDate));
                    var startTimeAM = $('#startTimeAM').val(data.startTimeAM);
                    var endTimeAM = $('#endTimeAM').val(data.endTimeAM);
                    var gracePeriodAM = $('#gracePeriodAM').val(data.gracePeriodAM);
                    var startTimePM = $('#startTimePM').val(data.startTimePM);
                    var endTimePM = $('#endTimePM').val(data.endTimePM);
                    var gracePeriodPM = $('#gracePeriodPM').val(data.gracePeriodPM);

                    $('#dataModal').modal('show');

                    $('#saveBtn').data('eventId', data.id);

                });
            });

            $('#ggTable tbody').on('click', 'button.delete-btn', function () {
                var data = table.row($(this).parents('tr')).data();
                var eventId = data.id;
                if (confirm('Are you sure you want to delete this event?')) {
                    _DELETE(`/api/v1/events`, eventId, function (resp) {
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

            $('#startDate').datepicker({
                uiLibrary: 'bootstrap4'
            });

            $('#endDate').datepicker({
                uiLibrary: 'bootstrap4'
            });

            $('#startTimeAM').timepicker();
            $('#endTimeAM').timepicker();
            $('#startTimePM').timepicker();
            $('#endTimePM').timepicker();
        });

        function OpenModal() {
            clearFields();
            $('#dataModal').modal('show');
        }

        function save() {
            // Reset previous error messages
            $('.text-danger').text('');

            var eventName = $('#eventName').val().trim();
            var location = $('#location').val().trim();
            var description = $('#description').val().trim();
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var startTimeAM = $('#startTimeAM').val();
            var endTimeAM = $('#endTimeAM').val();
            var gracePeriodAM = $('#gracePeriodAM').val();
            var startTimePM = $('#startTimePM').val();
            var endTimePM = $('#endTimePM').val();
            var gracePeriodPM = $('#gracePeriodPM').val();
            var eventId = $('#saveBtn').data('eventId');

            var isValid = validation(eventName, location, description, startDate, endDate, startTimeAM, endTimeAM,
                gracePeriodAM, startTimePM, endTimePM, gracePeriodPM);

            if (isValid) {
                var userDetails = JSON.parse(sessionStorage.getItem("user")); // GET user Details from session Storage

                var postData = {
                    "eventName": eventName,
                    "location": location,
                    "description": description,
                    "eventStartDate": convertToMySQLDate(startDate),
                    "eventEndDate": convertToMySQLDate(endDate),
                    "startTimeAM": startTimeAM,
                    "endTimeAM": endTimeAM,
                    "gracePeriodAM": gracePeriodAM,
                    "startTimePM": startTimePM,
                    "endTimePM": endTimePM,
                    "gracePeriodPM": gracePeriodPM,
                    "userId": userDetails["id"]
                }

                if (eventId != 0) {
                    _PUT('/api/v1/events', postData, eventId, function (resp) {
                        if (resp.status_code === 200) {
                            $.toast({
                                heading: 'Success',
                                text: resp.message,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-right'
                            });
                            clearFields();
                            $('#dataModal').modal('hide');
                            $('#ggTable').DataTable().ajax.reload();
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
                    _POST('/api/v1/events', postData, function (resp) {
                        if (resp.status_code === 201) {
                            $.toast({
                                heading: 'Success',
                                text: resp.message,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-right'
                            });
                            clearFields();
                            $('#dataModal').modal('hide');
                            $('#ggTable').DataTable().ajax.reload();
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

        function validation(eventName, location, description, startDate, endDate, startTimeAM, endTimeAM, gracePeriodAM,
            startTimePM, endTimePM, gracePeriodPM) {
            var isValid = true;

            if (eventName === '') {
                $('#eventNameError').text('Please enter Event Name');
                isValid = false;
            }

            if (location === '') {
                $('#locationError').text('Please enter the location');
                isValid = false;
            }

            if (location === '') {
                $('#locationError').text('Please enter the location');
                isValid = false;
            }

            if (!dateRegex.test(startDate)) {
                $('#startDateError').text('Invalid date format. Use MM/DD/YYYY.');
                isValid = false;
            }

            if (!dateRegex.test(endDate)) {
                $('#endDateError').text('Invalid date format. Use MM/DD/YYYY.');
                isValid = false;
            }

            if (!timeRegex.test(startTimeAM)) {
                $('#startTimeAMError').text('Invalid time format. Use HH:mm.');
                isValid = false;
            }

            if (!timeRegex.test(endTimeAM)) {
                $('#endTimeAMError').text('Invalid time format. Use HH:mm.');
                isValid = false;
            }

            if (!positiveNumberRegex.test(gracePeriodAM)) {
                $('#gracePeriodAMError').text('Please enter a valid positive number.');
                isValid = false;
            }

            if (!timeRegex.test(startTimePM)) {
                $('#startTimePMError').text('Invalid time format. Use HH:mm.');
                isValid = false;
            }

            if (!timeRegex.test(endTimePM)) {
                $('#endTimePMError').text('Invalid time format. Use HH:mm.');
                isValid = false;
            }

            if (!positiveNumberRegex.test(gracePeriodPM)) {
                $('#gracePeriodPMError').text('Please enter a valid positive number.');
                isValid = false;
            }

            return isValid;
        }

        function convertToMySQLDate(dateStr) {
            // Parse the date using Moment.js
            var date = moment(dateStr, 'MM/DD/YYYY');

            // Format the date to MySQL DATETIME format
            return date.format('YYYY-MM-DD HH:mm:ss');
        }

        function convertToDateStr(mysqlDateStr) {
            // Parse the MySQL DATETIME string using Moment.js
            var date = moment(mysqlDateStr, 'YYYY-MM-DD HH:mm:ss');

            // Format the date to MM/DD/YYYY format
            return date.format('MM/DD/YYYY');
        }

        function clearFields() {
            var eventName = $('#eventName').val('');
            var location = $('#location').val('');
            var description = $('#description').val('');
            var startDate = $('#startDate').val('');
            var endDate = $('#endDate').val('');
            var startTimeAM = $('#startTimeAM').val('');
            var endTimeAM = $('#endTimeAM').val('');
            var gracePeriodAM = $('#gracePeriodAM').val('');
            var startTimePM = $('#startTimePM').val('');
            var endTimePM = $('#endTimePM').val('');
            var gracePeriodPM = $('#gracePeriodPM').val('');

            $('#saveBtn').data('eventId', 0);
            $('.text-danger').text('');
        }
    </script>
</body>

</html>