<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/jquery.toast.min.js"></script>
<script src="js/moment.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<script src="js/methods.js"></script>

<script>
    var userDetails = JSON.parse(sessionStorage.getItem("user"));
    if (userDetails != null) {
        $("#displayUserFullname").text(userDetails['firstname'] + " " + userDetails['middlename'] + " " + userDetails[
            'lastname']);
    }

    function formatDate(dateString) {
        return moment(dateString).format('MM/DD/yyyy hh:mm:ss A');
    }

    function formatEventDate(dateStr) {
        return moment(dateStr).format('MMM DD, YYYY');
    }

    // Function to format time
    function formatTime(timeStr) {
        return moment(timeStr, 'HH:mm').format('h:mm A');
    }

    // Function to format created_at date (example usage)
    function formatCreatedDate(dateStr) {
        return moment(dateStr).format('MMM DD, YYYY');
    }

    function formatDescription(description) {
        return description.length > 15 ? description.substring(0, 15) + '...' : description;
    }
</script>