</div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('admin/assets/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>

    <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery-ui.min.html')}}"></script>
    <script src="{{asset('admin/assets/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.fullcalendar.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>


    <script>
    $(document).ready(function () {
        $('#appointmentsTable').DataTable({
            "paging": true,          // Enables pagination
            "searching": true,       // Enables search box
            "ordering": true,        // Enables column sorting
            "info": true,            // Shows table info
            "responsive": true,      // Makes the table responsive
            "columnDefs": [
                { "orderable": false, "targets": 3 } // Disable sorting on the "Status" column
            ]
        });
    });
</script>


</body>


<!-- index22:59-->
</html>
