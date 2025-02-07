@extends('layout.app')




@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-8 col-8">
                <h4 class="page-title" style="text-align:left; !important">All Role Details</h4>
            </div>
            <!-- <div class="col-sm-4 col-4 text-right ">
            <a href="{{ route('dashboard') }}" class="btn  btn-rounded" style="background-color:#fed9cf;">
                    <i class="fa fa-arrow-left m-r-1"></i> Back to Dashboard
                </a>
            </div> -->
        </div>




        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header " style="background-color:#f89884;">
                        <h2 class="card-title d-inline-block text-white">
                            <i class="fas fa-user-tag  px-2" style="font-size:20px"></i> All Role
                        </h2>
                        @if(app('hasPermission')(38, 'create'))
                            <a href="{{ route('role.create') }}" class="btn btn-rounded float-right"
                                style="background-color: #fed9cf; padding: 6px 12px;">
                                <i class="fa fa-plus"></i> Add Role
                            </a>
                        @endif
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table custom-table mt-3 display">
                                <thead style="background-color:#ff8e29;">
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Joining Date</th>
                                        <th style="width: 145px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="rolesTableBody">

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
            url: '/api/rolee',
            type: 'GET',
            dataType: 'json',
            headers: { "Authorization": "Bearer " + localStorage.getItem('token') },

            success: function (data) {
                var roles = data;
                var table = $('#example').DataTable();
                if ($.fn.DataTable.isDataTable("#example")) {
                    table.destroy();
                }

                var tableBody = $('#rolesTableBody');
                tableBody.empty();
                roles.forEach(function (role, index) {
                    var row = '<tr >';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + role.name + '</td>';
                    row += '<td>' + role.description + '</td>';
                    row += '<td>' + role.created_at.split(' ')[0] + '</td>';
                    row += '<td>';
                    row += '<div class="icon" style="cursor:pointer">';
                    row += ' @if(app('hasPermission')(38, 'view'))<i class="fa fa-eye m-r-5 icon3 view-role" data-id="' + role.id + '"></i>@endif';
                    row += ' @if(app('hasPermission')(38, 'update'))<i class="fa fa-pencil m-r-5 icon1 edit-role" data-id="' + role.id + '"></i>@endif';
                    row += ' @if(app('hasPermission')(38, 'delete'))<i class="fa fa-trash-o m-r-5 icon2 delete-role" data-id="' + role.id + '"></i>  @endif';
                    row += '</div>';
                    row += '</td>';
                    row += '</tr>';

                    tableBody.append(row);
                });


                $('#example').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "destroy": true
                });
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    // alert("Unauthorized: Please log in first.");
                    window.location.href = "{{ route('login') }}";
                }
            },

        });


    });

    $(document).on('click', '.view-role', function () {
        var roleId = $(this).data('id');
        window.location.href = '/role/show/' + roleId;
    });

    $(document).on('click', '.edit-role', function () {
        var roleId = $(this).data('id');
        window.location.href = '/role/edit/' + roleId;
    });

    $(document).on('click', '.delete-role', function () {
        var roleId = $(this).data('id');
        if (confirm('Are you sure you want to delete this role?')) {
            $.ajax({
                url: '/api/rolee/' + roleId,
                type: 'DELETE',
                headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                success: function () {

                    location.reload();
                },
                error: function (xhr) {
                    if (xhr.status === 401) {

                        window.location.href = "{{ route('login') }}";
                    }
                },
            });
        }
    });


</script>

@endsection