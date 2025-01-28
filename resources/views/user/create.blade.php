@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:center; !important">Add User</h4>
            </div>
            <div class="col-sm-8 col-9 text-center m-b-2 ">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-rounded" style="margin-left: 430px;">
                    <i class="fa fa-eye m-r-5  "></i>
                    All User
                </a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-tag  icon-style"></i> Role</label>
                                <select class="form-control select">
                                    <option value="">Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Receptionist">Receptionist</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-user  icon-style"></i> First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-user  icon-style"></i> Last Name</label>
                                <input class="form-control" type="text" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-envelope  icon-style"></i> Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label"><i class="fas fa-venus-mars  icon-style"></i> Gender:</label>
                                <div class="form-control">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input"> Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input"> Female
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input"> Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-lock  icon-style"></i> Password</label>
                                <input class="form-control" type="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-lock  icon-style"></i> Confirm Password</label>
                                <input class="form-control" type="password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt  icon-style"></i> Joining Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt  icon-style"></i> Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-city  icon-style"></i> City</label>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-flag  icon-style"></i> State</label>
                                <select class="form-control select">
                                    <option value="">Select State</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-phone  icon-style"></i> Phone</label>
                                <input class="form-control" type="text" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-image  icon-style"></i> Image</label>
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
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Create User</button>
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
</script>


@endsection
