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
                <h4 class="page-title" style="text-align:center;padding-right:200px">Add User</h4>
            </div>
            <div class="col-6 text-center m-b-2" style="padding-left:220px">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5"></i>
                    All Users
                </a>
            </div>
        </div>
        <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:80% ;padding-bottom: 30px;">
                    @csrf

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
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-lock icon-style"></i> Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-lock icon-style"></i> Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                            </div>

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

        $('#multiStepForm').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            // Capture selected permissions
            var permissions = [];
            $('tbody tr').each(function () {
                var moduleId = $(this).data('module-id');
                var modulePermissions = {
                    module_id: moduleId,
                    create: $(this).find('.insert').prop('checked'),
                    view: $(this).find('.view').prop('checked'),
                    update: $(this).find('.edit').prop('checked'),
                    delete: $(this).find('.delete').prop('checked'),
                };
                permissions.push(modulePermissions);
            });

   
            formData.append('permissions', JSON.stringify(permissions));

        
            $.ajax({
                url: '/api/users',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#successMessage').text(response.message ).show();
                    $('#multiStepForm')[0].reset();
                    setTimeout(function () {
                        window.location.href = "{{ route('user.index') }}";
                    }, 1500);
                },
                error: function (response) {
                    alert('Error adding user');
                    console.log(response);
                }
            });
        });

        
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
    });


</script>

@endsection