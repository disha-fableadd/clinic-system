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
                        <a href="{{ route('role.create') }}" class="btn btn-rounded float-right"
                            style="background-color: #fed9cf; padding: 6px 12px;">
                            <i class="fa fa-plus"></i> Add Role
                        </a>
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

        $.ajax({
            url: '/api/rolee',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var roles = data;
                var tableBody = $('#rolesTableBody');
                tableBody.empty();
                roles.forEach(function (role, index) {
                    var row = '<tr>';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + role.name + '</td>';
                    row += '<td>' + role.description + '</td>';
                    row += '<td>' + role.created_at.split(' ')[0] + '</td>';
                    row += '<td>';
                    row += '<div class="icon">';
                    row += '<i class="fa fa-eye m-r-5 icon3"></i>';
                    row += '<i class="fa fa-pencil m-r-5 icon1"></i>';
                    row += '<i class="fa fa-trash-o m-r-5 icon2"></i>';
                    row += '</div>';
                    row += '</td>';
                    row += '</tr>';

                    tableBody.append(row);
                });

                // Initialize DataTable after the rows are added
                $('#example').DataTable();
            },
        });


    });


</script>

@endsection