@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center; margin-right: 120px;">Add Patients</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2">
                <a href="{{ route('patients.index') }}" class="btn btn-primary btn-rounded" style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3 "></i>
                    All Patients
                </a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-user  icon-style"></i> Full Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-stethoscope  icon-style"></i> Treatment</label>
                                <select class="form-control select">
                                    <option value="">Select Treatment</option>
                                    <option value="Fever">Fever</option>
                                    <option value="Cancer">Cancer</option>
                                    <option value="Eye">Eye</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-envelope  icon-style"></i> Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label><i class="fas fa-genderless  icon-style"></i> Gender:</label>
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
                                <label><i class="fas fa-birthday-cake  icon-style"></i> Date Of Birth</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-day  icon-style"></i> Age</label>
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-home  icon-style"></i> Address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
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
                                <div class="col-sm-6 col-md-6 col-lg-3">
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
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-phone  icon-style"></i> Phone </label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-image  icon-style"></i> Image</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt="" src="{{asset('admin/assets/img/user.jpg')}}">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Create Patient</button>
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
