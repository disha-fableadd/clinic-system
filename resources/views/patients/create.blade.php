@extends('layout.app')


@section('content')  


<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <!-- <div class="col-lg-12 ">
                <h4 class="page-title">Add Patients</h4>
            </div> -->
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center; margin-right: 120px ;!important">Add Patients</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2 ">
                <a href="{{ route('patients.index') }}" class="btn btn-primary  btn-rounded" style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3"></i>
                    All Patients</a>
            </div>
        </div>
        <div class="row">
            <div class=" offset-lg-2">
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
                                <label>Date Of Birth</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="form-group">
                                <label>Age</label>
                                <input class="form-control" type="Number">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control ">
                                    </div>
                                </div>
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
                                            <option v>Gujarat</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Rajasthan">Rajasthan</option>
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