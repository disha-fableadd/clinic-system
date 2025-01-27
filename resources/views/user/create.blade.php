@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:center; !important">Add User</h4>
            </div>
            <div class="col-sm-8 col-9 text-center m-b-2 ">
                <a href="{{ route('user.index') }}" class="btn btn-primary  btn-rounded" style="margin-left: 430px;">
                    <i class="fa fa-eye m-r-5 icon3"></i>
                    All User</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender:</label>
                                <div class="form-control">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input">Female
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input">Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Joining Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control select">
                                            <option value="">Select City</option>
                                            <option value="Surat">Surat</option>
                                            <option value="Ahemdabad">Ahemdabad</option>
                                            <option value="Mumbai">Mumbai</option>
                                            <option value="Jaypur">Jaypur</option>
                                            <option value="Pune">Pune</option>
                                            <option value="Udaipur">Udaipur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control select">
                                            <option value="">Select State</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select id="role" class="form-control select">
                                            <option value="">Select Role</option>

                                            <option value="Doctor">Doctor</option>
                                            <option value="Receptionist">Receptionist</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt="" src="{{ asset('admin/assets/img/user.jpg') }}">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label>Permissions</label>
                            <div class="row m-0">
                                <div class="form-control">
                                    <div class="row ">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_user">
                                                <label class="form-check-label" for="add_user">Add User</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_user">
                                                <label class="form-check-label" for="show_user">View User</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_doctor">
                                                <label class="form-check-label" for="show_doctor">Show Doctor</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_patients">
                                                <label class="form-check-label" for="show_patients">Show
                                                    Patients</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-control mt-3">
                                    <div class="row ">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_patients">
                                                <label class="form-check-label" for="add_patients">Add Patients</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_appointment">
                                                <label class="form-check-label" for="show_appointment">Show
                                                    Appointment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_appointment">
                                                <label class="form-check-label" for="add_appointment">Add
                                                    Appointment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_department">
                                                <label class="form-check-label" for="show_department">Show
                                                    Department</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="form-control mt-3">
                                    <div class="row ">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_department">
                                                <label class="form-check-label" for="add_department">Add
                                                    Department</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="calender">
                                                <label class="form-check-label" for="calender">Calender</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_schedule">
                                                <label class="form-check-label" for="add_schedule">Add Schedule</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_schedule">
                                                <label class="form-check-label" for="show_schedule">Show
                                                    Schedule</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="form-control mt-3">
                                    <div class="row ">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_medicine">
                                                <label class="form-check-label" for="add_medicine">Add
                                                    Medicine</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_medicine">
                                                <label class="form-check-label" for="show_medicine">Show
                                                    Medicines</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="all">
                                                <label class="form-check-label" for="all">All</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="display-block mt-2">Status</label>
                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="doctor_active"
                                            value="option1" checked>
                                        <label class="form-check-label" for="doctor_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="doctor_inactive"
                                            value="option2">
                                        <label class="form-check-label" for="doctor_inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" id="department-field" style="display: none;">
                            <div class="form-group">
                                <label class="mt-2">Department</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Create User</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const departmentField = document.getElementById('department-field');

        roleSelect.addEventListener('change', function () {
            if (roleSelect.value === 'Doctor') {
                departmentField.style.display = 'block';
            } else {
                departmentField.style.display = 'none';
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        const allCheckbox = document.getElementById('all');
        const permissionCheckboxes = document.querySelectorAll('.form-check-input:not(#all)');

        allCheckbox.addEventListener('change', function () {
            permissionCheckboxes.forEach(function (checkbox) {
                checkbox.checked = allCheckbox.checked;
            });
        });
    });

</script>
@endsection