@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-8 col-8">
                <h4 class="page-title" style="text-align:left; !important">All Services Details</h4>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white">
                            <i class="fa fa-hospital-o px-2" style="font-size:20px"></i> All Services
                        </h3>
                        @if(app('hasPermission')(31, 'create'))
                        <a href="{{ route('service.create') }}" class="btn btn-rounded float-right"
                            style="background-color: #fed9cf;">
                            <i class="fa fa-plus"></i> Add Services
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table custom-table">
                                <thead style="background-color:#ff8e29;" class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="servicesTableBody">
                                    <!-- Data will be loaded dynamically here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar');
            }
        });


    });
    
    $(document).ready(function () {
        let token = localStorage.getItem('token');

        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }
    });
    $(document).ready(function () {

        $.ajax({
            url: '/api/services', // Your API endpoint
            type: 'GET',
            dataType: 'json',
            headers: { "Authorization": "Bearer " + localStorage.getItem('token') },

            success: function (data) {
                var services = data; // Assuming the API returns an array of services
                var table = $('#example').DataTable();
                if ($.fn.DataTable.isDataTable("#example")) {
                    table.destroy();
                }

                var tableBody = $('#servicesTableBody');
                tableBody.empty();
                services.forEach(function (service, index) {
                    var statusClass = service.status === 'active' ? 'btn-primary' : 'btn-danger'; // Check if status is 'active'

                    var row = '<tr>';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + service.name + '</td>';
                    row += '<td>' + service.description + '</td>';
                    row += '<td><span class="custom-badge btn ' + statusClass + ' btn-rounded">' + service.status + '</span></td>'; // Add class based on status
                    row += '<td>';
                    row += '<div class="icon" style="cursor:pointer">';
                    row += '   @if(app('hasPermission')(31, 'view'))<i class="fa fa-eye m-r-5 icon3 view-service" data-id="' + service.id + '"></i>@endif';
                    row += '   @if(app('hasPermission')(31, 'update'))<i class="fa fa-pencil m-r-5 icon1 edit-service" data-id="' + service.id + '"></i>@endif';
                    row += '   @if(app('hasPermission')(31, 'delete'))<i class="fa fa-trash-o m-r-5 icon2 delete-service" data-id="' + service.id + '"></i>@endif';
                    row += '</div>';
                    row += '</td>';
                    row += '</tr>';

                    tableBody.append(row);
                });

                $('#example').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    destroy: true
                });
            },
            error: function () {
                $('#servicesTableBody').append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
            }
        });

        // Function to delete a service
        $(document).on('click', '.delete-service', function () {
            var serviceId = $(this).data('id');
            if (confirm('Are you sure you want to delete this service?')) {
                $.ajax({
                    url: '/api/services/' + serviceId,
                    type: 'DELETE',
                    success: function (response) {
                        location.reload();
                    },
                    error: function (xhr) {
                        alert('Error deleting service.');
                    }
                });
            }
        });
        
        
        $(document).on('click', '.view-service', function () {
            var serviceId = $(this).data('id');
            window.location.href = '/service/show/' + serviceId;
        });

        $(document).on('click', '.edit-service', function () {
            var serviceId = $(this).data('id');
            window.location.href = '/service/edit/' + serviceId;
        });
    });



</script>
@endsection