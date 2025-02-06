@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left; !important">All Users Details</h4>
            </div>
            <!-- <div class="col-sm-8 col-9 text-right m-b-2 ">
                <a href="{{ route('user.create') }}" class="btn btn-primary  btn-rounded"><i class="fa fa-plus"></i>
                    Add User</a>
            </div> -->
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"><i class="fas fa-user  px-2"
                                style="font-size:20px"></i>All User </h3>
                        <a href="{{ route('user.create') }}" class="btn  btn-rounded float-right"
                            style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add User
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:rgb(254 217 207);">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th style="min-width: 110px;">Join Date</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="userbody">

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
    $(document).ready(function () {
        let token = localStorage.getItem('token');

        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }
    });
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
        });
    });
    new DataTable('#example');
    function eventFired(type) {
        let n = document.querySelector('#demo_info');

        n.scrollTop = n.scrollHeight;
    }

    new DataTable('#example')
        .on('order.dt', () => eventFired('Order'))
        .on('search.dt', () => eventFired('Search'))
        .on('page.dt', () => eventFired('Page'));







    $(document).ready(function () {
        function loadUsers() {
            $.ajax({
                url: '{{ url("api/users") }}',

                type: 'GET',
                dataType: 'json',
                headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                success: function (data) {
                    var users = data;
                    var table = $('#example').DataTable();

                    if ($.fn.DataTable.isDataTable("#example")) {
                        table.destroy();
                    }

                    var tableBody = $('#userbody');
                    tableBody.empty();

                    users.forEach(function (user) {
                        let joinDate = new Date(user.created_at).toLocaleDateString('en-GB');

                        var row = `<tr>
                        <td><img src="${user.profile || '/default-avatar.png'}" class="rounded-circle" width="50" height="50"></td>
                        <td>${user.fullname}</td>
                        <td>${user.email}</td>
                        <td>${user.phone}</td>
                        <td>${joinDate}</td> 
                        <td>${user.roleName}</td> 
                        <td>
                           <div class="icon" style="cursor:pointer">
                                    <i class="fa fa-eye m-r-5 icon3 view-user" data-id="${user.id}"></i>
                                    <i class="fa fa-pencil m-r-5 icon1 edit-user" data-id="${user.id}"></i>
                                    <i class="fa fa-trash-o m-r-5 icon2 delete-user" data-id="${user.id}"></i>
                                </div>
                        </td>
                    </tr>`;

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
                    $('#example tbody').append('<tr><td colspan="7" class="text-center">No data available</td></tr>');
                }
            });
        }

        loadUsers(); // Call function to load data
    });
    $(document).on('click', '.view-user', function () {
        var userId = $(this).data('id');
        window.location.href = '/user/show/' + userId;
    });

    $(document).on('click', '.edit-user', function () {
        var userId = $(this).data('id');
        window.location.href = '/user/edit/' + userId;
    });
    $(document).on('click', '.delete-user', function () {
        var userId = $(this).data('id');

      
        if (confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                url: '/api/users/' + userId,  // Endpoint to delete the user
                type: 'DELETE',
                dataType: 'json',
                headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                success: function (data) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert("An error occurred while deleting the user.");
                }
            });
        }
    });


</script>
@endsection