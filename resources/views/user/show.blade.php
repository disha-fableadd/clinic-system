@extends('layout.app')
<style>
    .container {
        width: 60%;
        margin: auto;
    }

    .header1 {
        background: #cfece0;
        color: black;
        padding: 10px 15px;
        font-size: 18px;
        font-weight: bold;
        margin-top: 50px;
        border-radius: 15px;
    }

    .card-body {

        height: auto;
        padding: 20px !important;
    }

    .card {
        margin: 0;
    }

    table {

        margin-top: 10px;
        border-radius: 10px;
        border: 2px solid #cfece0;
        border-collapse: collapse;
        width: 100%;

    }

    table thead tr th {
        background-color: #cfece0 !important;
    }


    th,
    td {
        padding: 10px;
        text-align: center;
    }

    thead,
    tr {
        border-bottom: 2px solid #cfece0;
    }

    th {
        background: #f4f4f4;
    }

    .select-all {
        margin: 10px 5px;
    }
</style>
@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    User's Information
                </h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Users Details
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">
                        <h3 style="float:left" class="text-dark">
                            <i class="fa fa-info-circle icon-style2"></i>
                            <span class=""> <span id="userFullName"></span> Details</span>
                        </h3>
                    </div>

                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-4 ">
                                <p class="text-dark">
                                    <strong><i class="fa fa-image icon-style1 "></i> Image: </strong><br>
                                    <img id="userProfile" src="" width="200" height="200" alt="Profile Image"
                                        style="border-radius:20px">
                                </p>
                                <p class="text-dark">
                                    <strong><i class="fa fa-user-tag icon-style1"></i> User Role: </strong>
                                    <span id="userRole"></span>
                                </p>
                                <p class="text-dark">
                                    <strong><i class="fa fa-user-circle icon-style1"></i> UserName: </strong>
                                    <span id="userUsername"></span>
                                </p>
                                <p class="text-dark">
                                    <strong><i class="fa fa-envelope icon-style1"></i> Email: </strong>
                                    <span id="userEmail"></span>
                                </p>
                                <p class="text-dark">
                                    <strong><i class="fa fa-phone icon-style1"></i> Phone: </strong>
                                    <span id="userPhone"></span>
                                </p>
                            </div>
                            <div class="col-8">
                                <p class="text-dark">
                                    <strong><i class="fa fa-home icon-style1"></i> Address:</strong>
                                    <span id="userAddress"></span>
                                </p>

                                <hr>
                                <p class="text-dark">
                                    <strong><i class="fa fa-city icon-style1"></i> City: </strong>
                                    <span id="userCity"></span>
                                </p>
                                <hr>
                                <p class="text-dark">
                                    <strong><i class="fa fa-map-marker-alt icon-style1"></i> State: </strong>
                                    <span id="userState"></span>
                                </p>
                                <hr>
                                <p class="text-dark">
                                    <strong><i class="fa fa-calendar-alt icon-style1"></i> Birth Date: </strong>
                                    <span id="userBirthDate"></span>
                                </p>
                                <hr>

                                <p class="text-dark">
                                    <strong><i class="fa fa-genderless icon-style1"></i> Gender: </strong>
                                    <span id="userGender"></span>
                                </p>
                                <hr>

                                <p class="text-dark">
                                    <strong><i class="fa fa-dollar-sign icon-style1"></i> Salary: </strong>
                                    <span id="userSalary"></span>
                                </p>
                                <hr>

                                <p class="text-dark">
                                    <strong><i class="fa fa-clock icon-style1"></i> Shift:</strong>
                                    <span id="userShift"></span>
                                </p>
                                <hr>
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card" style="border: 1px solid #87ceb0;">
                                    <div class="card-footer text-right" style="background-color:#87ceb0">
                                        <h3 style="float:left" class="text-dark"><i
                                                class="fa fa-info-circle icon-style2"></i> Permissions</h3>
                                        <a href="" class="btn btn-primary btn-rounded" style="color:black">
                                            <input type="checkbox" id="selectAll"> Select All Modules
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <table class="pb-5">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Module Name</th>
                                                    <th>View</th>
                                                    <th>Insert</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    <th>All</th>
                                                </tr>
                                            </thead>
                                            <tbody id="modules">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button mb-4" style="display: flex; justify-content: end; margin: 0 5px;">
                            <a href="#" class="btn btn-primary btn-rounded edit-medicine-btn"
                                style="color:black; margin-right:10px">
                                <i class="fa fa-pencil-alt"></i> Edit User
                            </a>

                            <button type="button" class="btn btn-danger btn-rounded delete-medicine"
                                data-id="{{ $user_id }}">
                                <i class="fa fa-trash"></i> Delete User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="successMessage" class="alert alert-success" style="display:none;"></div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

<script>
    document.getElementById("selectAll").addEventListener("change", function () {
        let checkboxes = document.querySelectorAll("tbody input[type='checkbox']");
        checkboxes.forEach(cb => cb.checked = this.checked);
    });


    $(document).ready(function () {
        var userId = "{{ $user_id }}";
        fetch('/api/modules')
            .then(response => response.json())
            .then(modules => {
                const tbody = $('tbody');
                modules.forEach(module => {
                    const row = $('<tr>').attr('data-module-id', module.id);

                    row.append(`<td>${module.name}</td>`);

                    const permissions = ['view', 'insert', 'edit', 'delete', 'all'];

                    permissions.forEach(permission => {
                        const checkbox = $('<input>', { type: 'checkbox', class: permission });
                        const td = $('<td>').append(checkbox);
                        row.append(td);

                        if (permission === 'all') {
                            checkbox.change(function () {
                                row.find('input[type=checkbox]').prop('checked', checkbox.prop('checked'));
                            });
                        }
                    });

                    tbody.append(row);
                });
            });
        $.ajax({
            url: '/api/users/' + userId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                data.permissions.forEach(permission => {
                    var modules = $('#modules');
                    var moduleRow = modules.find('tr[data-module-id="' + permission.module_id + '"]');
                    var moduleRow = $('tr[data-module-id="' + permission.module_id + '"]');
                    
                    console.log(moduleRow,permission.module_id);
                    
                    ['insert', 'view', 'edit', 'delete'].forEach(function (permissionType) {
                        var checkbox = moduleRow.find('.' + permissionType);
                        if (checkbox.length) {
                            var permissionTmp = false;
                            if (permission[permissionType] === 1) {
                                permissionTmp = true;
                            }
                            checkbox.prop('checked', permissionTmp);
                        }
                    })

                });

                // Set the user details on the page
                $('#userFullName').text(data.fullname);
                $('#userRole').text(data.roleName);
                $('#userUsername').text(data.username);
                $('#userEmail').text(data.email);
                $('#userPhone').text(data.phone);
                $('#userProfile').attr('src', '/storage/' + data.profile);

                $('#userAddress').text(data.address ?? 'N/A');
                $('#userCity').text(data.city ?? 'N/A');
                $('#userState').text(data.state ?? 'N/A');
                $('#userGender').text(data.gender ?? 'N/A');
                $('#userBirthDate').text(data.birth_date ?? 'N/A');
                $('#userShift').text(data.shift ?? 'N/A');
                $('#userSalary').text(data.salary ?? 'N/A');
            },
            error: function () {
                alert('Failed to fetch user details.');
            }
        });




        





    });

</script>

<style>
    .icon-style1 {
        background-color: white;
        color: rgb(157, 195, 179);
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }

    .icon-style2 {
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }
</style>
@endsection