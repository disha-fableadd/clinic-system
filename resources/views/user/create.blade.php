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

        height: 200px;
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

    /* th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    } */


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

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:80% ;padding-bottom: 60px;">
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
                                            <input type="radio" name="gender" class="form-check-input" required>
                                            Male
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" required>
                                            Female
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" required>
                                            Other
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
                                            <input type="date" class="form-control" name="birthdate">
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
                            style="padding:8px 50px;border-radius:50px;float:left;" onclick="prevStep()">
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary"
                            style="margin-left:5px;padding:8px 50px;float:right;" onclick="nextStep()">
                            Next
                        </button>
                    </div>

                    <!-- Step 3: Education and Experience -->
                    <div class="form-step" id="step-3" style="display:none;">
                        <div id="educationFields" class="mb-3">
                            <!-- Education Fields will be added here -->
                            <legend><i class="fas fa-graduation-cap icon-style"></i> Education:</legend>
                            <label><i class="fas fa-book icon-style"></i> Degree:</label>
                            <input type="text" name="education[${index}][degree]" class="form-control" required>
                            <div class="row">
                                <div class="col-6">
                                    <label><i class="fas fa-university icon-style"></i> Institution:</label>
                                    <input type="text" name="education[${index}][institution]" class="form-control"
                                        required>
                                </div>
                                <div class="col-6">
                                    <label><i class="fas fa-hourglass-half icon-style"></i> Year:</label>
                                    <input type="text" name="education[${index}][year]" class="form-control" required>
                                </div>
                            </div>




                            <button type="button" class="btn btn-primary mt-3" onclick="addEducation()">
                                Add Education
                            </button>
                        </div>

                        <div id="experienceFields" class="mb-3">
                            <!-- Experience Fields will be added here -->
                            <legend><i class="fas fa-briefcase  icon-style"></i> Experience:</legend>
                            <label><i class="fas fa-building icon-style"></i> Company:</label>
                            <input type="text" name="experience[${index}][company]" class="form-control" required>
                            <div class="row">
                                <div class="col-6">
                                    <label><i class="fas fa-user-tie icon-style"></i> Role:</label>
                                    <input type="text" name="experience[${index}][role]" class="form-control" required>

                                </div>
                                <div class="col-6">

                                    <label><i class="fas fa-hourglass-half icon-style"></i> Years:</label>
                                    <input type="text" name="experience[${index}][years]" class="form-control" required>

                                </div>
                            </div>

                            <button type="button" class="btn btn-primary mt-3" onclick="addExperience()">
                                Add Experience
                            </button>
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
                                            class="fa fa-info-circle icon-style2"></i> permissions</h3>
                                    <a href="" class="btn btn-primary btn-rounded" style="color:black">
                                        <input type="checkbox" id="selectAll"> Select All Modules
                                    </a>
                                </div>

                                <div class="card-body">
                                    <table>
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
                                            <tr>
                                                <td>Customers</td>
                                                <td><input type="checkbox" class="view"></td>
                                                <td><input type="checkbox" class="insert"></td>
                                                <td><input type="checkbox" class="edit"></td>
                                                <td><input type="checkbox" class="delete"></td>
                                                <td><input type="checkbox" class="all"></td>
                                            </tr>
                                            <tr>
                                                <td>Followup</td>
                                                <td><input type="checkbox" class="view"></td>
                                                <td><input type="checkbox" class="insert"></td>
                                                <td><input type="checkbox" class="edit"></td>
                                                <td><input type="checkbox" class="delete"></td>
                                                <td><input type="checkbox" class="all"></td>
                                            </tr>
                                            <tr>
                                                <td>Leads</td>
                                                <td><input type="checkbox" class="view"></td>
                                                <td><input type="checkbox" class="insert"></td>
                                                <td><input type="checkbox" class="edit"></td>
                                                <td><input type="checkbox" class="delete"></td>
                                                <td><input type="checkbox" class="all"></td>
                                            </tr>
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

    // "All" Checkbox selects row-wise permissions
    document.querySelectorAll(".all").forEach(allCheckbox => {
        allCheckbox.addEventListener("change", function () {
            let row = this.closest("tr");
            let checkboxes = row.querySelectorAll("input[type='checkbox']:not(.all)");
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
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

    function addEducation() {
        const educationFields = document.getElementById('educationFields');
        const index = educationFields.children.length;
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
           <legend><i class="fas fa-graduation-cap icon-style"></i> Education:</legend>
                            <label><i class="fas fa-book icon-style"></i> Degree:</label>
                            <input type="text" name="education[${index}][degree]" class="form-control" required>

                            <div class="row">
                                <div class="col-6">
                                    <label><i class="fas fa-university icon-style"></i> Institution:</label>
                                    <input type="text" name="education[${index}][institution]" class="form-control"
                                        required>
                                </div>
                                <div class="col-6">
                                    <label><i class="fas fa-hourglass-half icon-style"></i> Year:</label>
                                    <input type="text" name="education[${index}][year]" class="form-control" required>
                                </div>
                            </div>
        `;
        educationFields.appendChild(fieldset);
    }

    function addExperience() {
        const experienceFields = document.getElementById('experienceFields');
        const index = experienceFields.children.length;
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend><i class="fas fa-briefcase  icon-style"></i> Experience:</legend>
                            <label><i class="fas fa-building icon-style"></i> Company:</label>
                            <input type="text" name="experience[${index}][company]" class="form-control" required>

                           <div class="row">
                                <div class="col-6">
                                    <label><i class="fas fa-user-tie icon-style"></i> Role:</label>
                                    <input type="text" name="experience[${index}][role]" class="form-control" required>

                                </div>
                                <div class="col-6">

                                    <label><i class="fas fa-hourglass-half icon-style"></i> Years:</label>
                                    <input type="text" name="experience[${index}][years]" class="form-control" required>

                                </div>
                            </div>

        `;
        experienceFields.appendChild(fieldset);
    }
</script>

@endsection