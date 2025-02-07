@extends('layout.app')

@section('content')  
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class=" col-6">
                <h4 class="page-title text-center" style="padding-left: 70px;">Add Patient</h4>
            </div>
            @if(app('hasPermission')(28, 'view'))
            <div class=" col-6 text-center m-b-2" style="padding-right: 60px;">
                <a href="{{ route('patients.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Patients
                </a>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:60% ;padding-bottom: 60px;">
                    @csrf

                    <!-- Step 1: Basic Information -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-medkit icon-style"></i> Treatment <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="treatment" required>
                                        <option value="">Select Treatment</option>
                                        <option value="Fever">Fever</option>
                                        <option value="Cancer">Cancer</option>
                                        <option value="Eye">Eye</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user icon-style"></i> Full Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="full_name"
                                        placeholder="Enter Full Name" required>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label><i class="fas fa-envelope icon-style"></i> Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter Email"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><i class="fas fa-phone icon-style"></i> Phone <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter Phone"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-birthday-cake icon-style"></i> Age <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="age" placeholder="Enter Age"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-tint icon-style"></i> Blood Group</label>
                                    <select class="form-control select" name="blood_group">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="btn btn-primary"
                            style="margin-left:5px;padding:8px 50px;float:right;" onclick="nextStep()">
                            Next
                        </button>
                    </div>

                    <!-- Step 2: Additional Information -->
                    <div class="form-step" id="step-2" style="display:none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-image icon-style"></i> Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image">
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt icon-style"></i> Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><i class="fas fa-city icon-style"></i> City</label>
                                    <select class="form-control select" name="city">
                                        <option value="">Select City</option>
                                        <option value="Surat">Surat</option>
                                        <option value="Ahmedabad">Ahmedabad</option>
                                        <option value="Mumbai">Mumbai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><i class="fas fa-flag icon-style"></i> State</label>
                                    <select class="form-control select" name="state">
                                        <option value="">Select State</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-notes-medical icon-style"></i> Medical History</label>
                                    <textarea class="form-control" name="medical_history"
                                        placeholder="Enter Medical History" style="border-radius:10px"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><i class="fas fa-heart icon-style"></i> Marital Status</label>
                                    <select class="form-control select" name="marital_status">
                                        <option value="">Select Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                    </select>
                                </div>
                            </div>
                          
                            <div class="col-6">
                                <div class="form-group">
                                    <label><i class="fas fa-users icon-style"></i> Status</label>
                                    <select class="form-control select" name="status">
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
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
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function nextStep() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
        });
    });
</script>
@endsection