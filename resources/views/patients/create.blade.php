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
                                    <select class="form-control select" name="treatment_id" id="treatmentDropdown"
                                        required>
                                        <option value="">Select Treatment</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user icon-style"></i> Full Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="fullname"
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
                                    <label><i class="fas fa-phone icon-style"></i> Phone <span
                                            class="text-danger">*</span></label>
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
                                    <input type="file" class="form-control" name="profile">
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


                            <div class="col-12">
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
                        <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                        <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    function nextStep() {
        var validator = $("#multiStepForm").validate();
        if (validator.element("#treatmentDropdown") && validator.element("[name='name']")) {
            document.getElementById('step-1').style.display = 'none';
            document.getElementById('step-2').style.display = 'block';
        }
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

    $(document).ready(function () {
        $('#multiStepForm').validate({
            ignore: ":hidden:not(.datetimepicker)", // Ignore hidden fields except datetimepicker
            rules: {
                category_id: {
                    required: true
                },
                name: {
                    required: true,
                    minlength: 3
                },
                unit: {
                    required: true
                },
                quantity: {
                    required: true,
                    digits: true
                },
                manufacture_date: {
                    required: true
                },
                expiry_date: {
                    required: true
                },
                status: {
                    required: true
                }
            },
            messages: {
                category_id: {
                    required: "Please select a category"
                },
                name: {
                    required: "Please enter the medicine name",
                    minlength: "Medicine name must be at least 3 characters long"
                },
                unit: {
                    required: "Please enter the unit"
                },
                quantity: {
                    required: "Please enter the quantity",
                    digits: "Quantity must be a number"
                },
                manufacture_date: {
                    required: "Please enter the manufacture date"
                },
                expiry_date: {
                    required: "Please enter the expiry date"
                },
                status: {
                    required: "Please select a status"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        fetchCategories();

        function fetchCategories() {
            $.ajax({
                url: '/api/treatments',
                type: 'GET',
                success: function (response) {
                    var treatmentDropdown = $('select[name="treatment_id"]');
                    treatmentDropdown.empty();
                    treatmentDropdown.append('<option value="">Select treatments</option>');

                    $.each(response, function (index, category) {
                        treatmentDropdown.append('<option value="' + treatment.id + '">' + treatment.name + '</option>');
                    });
                },
                error: function () {
                    alert('Failed to load treatments.');
                }
            });
        }


        $('#multiStepForm').on('submit', function (e) {
            e.preventDefault();

            if ($('#multiStepForm').valid()) {
              
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ url('api/patient') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#successMessage').text(response.message || 'patient created successfully').show();
                        $('#multiStepForm')[0].reset();

                        setTimeout(function () {
                            window.location.href = "{{ route('patients.index') }}";
                        }, 1500);
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (field, errorMessages) {
                                var errorMessage = errorMessages.join('<br>');
                                $('[name="' + field + '"]').after('<span class="invalid-feedback">' + errorMessage + '</span>');
                            });
                        } else {
                            $('#errorMessage').text('Something went wrong.').show();
                        }
                    }
                });
            }
        });
    });


</script>
@endsection