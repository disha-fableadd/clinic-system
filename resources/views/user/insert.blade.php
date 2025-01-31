@extends('layout.app')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title" style="text-align:center;">Add User</h4>
            </div>
            <div class="col-6 text-center m-b-2">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5"></i>
                    All Users
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:60% ;padding-bottom: 60px;">
                    @csrf

                    <!-- Step 1: Personal Information -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user-tag icon-style"></i> Role</label>
                                    <select class="form-control" name="role" required>
                                        <option value="">Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Nurse">Nurse</option>
                                        <option value="Receptionist">Receptionist</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">



                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user icon-style"></i> First Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="first_name"
                                                placeholder="Enter First Name" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user icon-style"></i> Last Name</label>
                                            <input class="form-control" type="text" name="last_name"
                                                placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope icon-style"></i> Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter Email"
                                        required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-phone icon-style"></i> Phone</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter Phone">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-venus-mars icon-style"></i> Gender</label>
                                    <div class="form-control">
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" required> Male
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" required> Female
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" required> Other
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary text-center d-flex" onclick="nextStep()"
                            style="padding:8px 50px ;float:right">Next</button>
                    </div>

                    <!-- Step 2: Image, Password, Address -->
                    <div class="form-step" id="step-2" style="display:none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-image icon-style"></i> Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

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
                                <div class="form-group">
                                    <label><i class="fas fa-city icon-style"></i> City</label>
                                    <select class="form-control" name="city">
                                        <option value="">Select City</option>
                                        <option value="Surat">Surat</option>
                                        <option value="Ahemdabad">Ahemdabad</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-flag icon-style"></i> State</label>
                                    <select class="form-control" name="state">
                                        <option value="">Select State</option>
                                        <option value="Gujarat">Gujarat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-danger"
                            style="padding:8px 50px;border-radius:50px;float:left; "
                            onclick="prevStep()">Previous</button>
                        <button type="button" class="btn btn-primary"
                            style="margin-left:5px;padding:8px 50px;float:right " onclick="nextStep()">Next</button>


                    </div>

                    <!-- Step 3: Education and Experience -->
                    <div class="form-step" id="step-3" style="display:none;">
                        <div id="educationFields" class="mb-3">
                            <!-- Education Fields will be added here -->
                            <legend>Education:</legend>
                            <label>Degree:</label>
                            <input type="text" name="education[${index}][degree]" class="form-control" required>
                            <label>Institution:</label>
                            <input type="text" name="education[${index}][institution]" class="form-control" required>
                            <label>Year:</label>
                            <input type="text" name="education[${index}][year]" class="form-control" required>
                            <button type="button" class="btn btn-primary mt-3" onclick="addEducation()">Add
                                Education</button>
                        </div>

                        <div id="experienceFields" class="mb-3">
                            <!-- Experience Fields will be added here -->
                            <legend>Experience:</legend>
                            <label>Company:</label>
                            <input type="text" name="experience[${index}][company]" class="form-control" required>
                            <label>Role:</label>
                            <input type="text" name="experience[${index}][role]" class="form-control" required>
                            <label>Years:</label>
                            <input type="text" name="experience[${index}][years]" class="form-control" required>
                            <button type="button" class="btn btn-primary mt-3" onclick="addExperience()">Add
                                Experience</button>
                        </div>

                        <button type="button" class="btn btn-danger"
                            style="padding:8px 50px;border-radius:50px; float:left"
                            onclick="prevStep()">Previous</button>


                        <button type="submit" class="btn btn-primary"
                            style="padding:8px 50px;border-radius:50px ;float:right">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
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

    function addEducation() {
        const educationFields = document.getElementById('educationFields');
        const index = educationFields.children.length;
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>Education ${index + 1}</legend>
            <label>Degree:</label>
            <input type="text" name="education[${index}][degree]" class="form-control" required>
            <label>Institution:</label>
            <input type="text" name="education[${index}][institution]" class="form-control" required>
            <label>Year:</label>
            <input type="text" name="education[${index}][year]" class="form-control" required>
        `;
        educationFields.appendChild(fieldset);
    }

    function addExperience() {
        const experienceFields = document.getElementById('experienceFields');
        const index = experienceFields.children.length;
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>Experience ${index + 1}</legend>
            <label>Company:</label>
            <input type="text" name="experience[${index}][company]" class="form-control" required>
            <label>Role:</label>
            <input type="text" name="experience[${index}][role]" class="form-control" required>
            <label>Years:</label>
            <input type="text" name="experience[${index}][years]" class="form-control" required>
        `;
        experienceFields.appendChild(fieldset);
    }
</script>

@endsection