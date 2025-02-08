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
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title" style="text-align:center;padding-right:200px">Edit User</h4>
            </div>
            @if(app('hasPermission')(26, 'view'))
                <div class="col-6 text-center m-b-2" style="padding-left:220px">
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-eye m-r-5"></i>
                        All Users
                    </a>
                </div>
            @endif
        </div>
       

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:80% ;padding-bottom: 30px;">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">


                    <!-- Step 1: Personal Information -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user-tag icon-style"></i> Role</label>
                                    <select class="form-control" name="role_id" id="role-select" required>
                                        <option value="">Select Role</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user icon-style"></i> User Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="username"
                                                placeholder="Enter Username" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user icon-style"></i> Full Name</label>
                                            <input class="form-control" type="text" name="fullname"
                                                placeholder="Enter Full Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-envelope icon-style"></i> Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-phone icon-style"></i> Phone</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="Enter Phone">
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-venus-mars icon-style"></i> Gender</label>
                                    <div class="form-control">
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Male"
                                                required> Male
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Female"
                                                required> Female
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Other"
                                                required> Other
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">

                                            <label><i class="fas fa-image icon-style"></i> Profile Picture</label>
                                            <input type="file" class="form-control" name="profile">

                                            <div id="imagePreviewContainer">
                                                <img id="imagePreview" src="" alt="profile Image"
                                                    style="max-width: 100px; display: none;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-cake-candles icon-style"></i> Birthdate</label>
                                            <input type="date" class="form-control" name="birth_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="button" class="btn btn-primary text-center d-flex" onclick="nextStep()"
                            style="padding:8px 50px ;float:right">Next</button>
                    </div>

                    <!-- Step 2: Profile & Address -->
                    <div class="form-step" id="step-2" style="display:none;">
                        <div class="row">


                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt icon-style"></i> Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-city icon-style"></i> City</label>
                                            <select class="form-control" name="city">
                                                <option value="">Select City</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Ahemdabad">Ahemdabad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-flag icon-style"></i> State</label>
                                            <select class="form-control" name="state">
                                                <option value="">Select State</option>
                                                <option value="Gujarat">Gujarat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shift Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-clock icon-style"></i> Shift</label>
                                    <select class="form-control" name="shift">
                                        <option value="">Select Shift</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Night">Night</option>
                                        <option value="FullDay">FullDay</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Salary Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-dollar-sign icon-style"></i> Salary</label>
                                    <input type="number" class="form-control" name="salary" placeholder="Enter Salary">
                                </div>
                            </div>

                        </div>

                        <button type="button" class="btn btn-danger"
                            style="padding:8px 50px;border-radius:50px; float:left" onclick="prevStep()">
                            Previous
                        </button>

                        <button type="submit" class="btn btn-primary"
                            style="padding:8px 50px;border-radius:50px; float:right">
                            Submit
                        </button>
                    </div>

                    <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                    <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
                    <br><br>

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
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>


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

    $(document).ready(function () {
        // Preview the selected image
        $('#profileImageInput').on('change', function (event) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    });

    document.getElementById("selectAll").addEventListener("change", function () {
        let checkboxes = document.querySelectorAll("tbody input[type='checkbox']");
        checkboxes.forEach(cb => cb.checked = this.checked);
    });



    let currentStep = 1;

    function nextStep() {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        currentStep++;
        document.getElementById(`step-${currentStep}`).style.display = 'block';
    }

    function prevStep() {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        currentStep--;
        document.getElementById(`step-${currentStep}`).style.display = 'block';
    }

    $(document).ready(function () {
        $.ajax({
            url: '/api/rolee',
            method: 'GET',
            headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
            success: function (response) {
                const roleSelect = $('#role-select');

                response.forEach(role => {
                    const option = $('<option>').val(role.id).text(role.name);
                    roleSelect.append(option);
                });
            },
            error: function (error) {
                console.log('Error fetching roles:', error);
            }
        });
    });



    $(document).ready(function () {


        let token = localStorage.getItem('token');

        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }
        var userId = "{{ $user_id }}";

        fetch('/api/modules')
            .then(response => response.json())
            .then(modules => {
                const tbody = $('tbody');
                modules.forEach(module => {
                    const row = $('<tr>').attr('data-module-id', module.id);
                    row.append(`<td>${module.name}</td>`);

                    const permissions = ['view', 'create', 'update', 'delete', 'all'];

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



                if (userId) {
                    $.ajax({
                        url: '/api/users/' + userId,
                        method: 'GET',
                        headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                        success: function (data) {
                            console.log('User Data:', data);

                            data.permissions.forEach(permission => {
                                var moduleRow = $('tr[data-module-id="' + permission.module_id + '"]');

                                if (moduleRow.length === 0) {
                                    console.log('Module row not found for module_id:', permission.module_id);
                                }

                                ['view', 'create', 'update', 'delete'].forEach(function (permissionType) {
                                    var checkbox = moduleRow.find('.' + permissionType);
                                    if (checkbox.length) {
                                        if (permission[permissionType] == 1) {
                                            checkbox.prop('checked', true);
                                        }
                                    }
                                });
                            });
                        },
                        error: function (error) {
                            console.log('Error fetching user data:', error);
                        }
                    });
                }
            });

        if (userId) {
            $.ajax({
                url: '/api/users/' + userId,
                method: 'GET',
                headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                success: function (data) {


                    // data.permissions.forEach(permission => {
                    //     var moduleRow = $('tr[data-module-id="' + permission.module_id + '"]');

                    //     ['view', 'create', 'update', 'delete'].forEach(function (permissionType) {
                    //         var checkbox = moduleRow.find('.' + permissionType);
                    //         if (checkbox.length) {
                    //             if (permission[permissionType] == 1) {
                    //                 checkbox.prop('checked', true);
                    //             }
                    //         }


                    //     });
                    // });



                    // Populate the form fields with the user data
                    $('input[name="username"]').val(data.username);
                    $('input[name="fullname"]').val(data.fullname);
                    $('input[name="email"]').val(data.email);
                    $('input[name="phone"]').val(data.phone);
                    $('input[name="gender"][value="' + data.gender + '"]').prop('checked', true);
                    $('input[name="birth_date"]').val(data.birth_date);
                    $('input[name="address"]').val(data.address);
                    $('select[name="city"]').val(data.city);
                    $('select[name="state"]').val(data.state);
                    $('select[name="shift"]').val(data.shift);
                    $('input[name="salary"]').val(data.salary);
                    $('#role-select').val(data.role_id); // Set selected 


                    if (data.profile) {
                        $('#imagePreview').attr('src', '/storage/' + data.profile).show();
                        $('#imagePreviewContainer').show();
                    }
                },
                error: function (error) {
                    console.log('Error fetching user data:', error);
                }
            });


            $("#multiStepForm").on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append('_method', 'PUT');
                var permissions = [];
                $('tbody tr').each(function () {
                    var moduleId = $(this).data('module-id');
                    var modulePermissions = {
                        module_id: moduleId,
                        create: $(this).find('.create').prop('checked'),
                        view: $(this).find('.view').prop('checked'),
                        update: $(this).find('.update').prop('checked'),
                        delete: $(this).find('.delete').prop('checked'),
                    };
                    permissions.push(modulePermissions);
                });


                formData.append('permissions', JSON.stringify(permissions));

                $.ajax({
                    url: '/api/users/' + userId,
                    method: 'POST',
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('token'),
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        $('#successMessage').text(response.message).show();
                        $('#errorMessage').hide();
                        setTimeout(function () {
                            window.location.href = "{{ route('user.index') }}";
                        }, 2000);
                    },
                    error: function (xhr, status, error) {
                        // On error, show an error message
                        $('#errorMessage').text(xhr.responseJSON.message).show();
                        $('#successMessage').hide();
                    }
                });
            });
        }

    });

</script>

@endsection