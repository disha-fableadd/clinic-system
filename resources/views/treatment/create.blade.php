@extends('layout.app')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title text-center" style="padding-left: 95px;">Add Treatment</h4>
            </div>
            @if(app('hasPermission')(30, 'view'))
                <div class="col-sm-6 col-7 text-center m-b-2" style="padding-right: 65px;">
                    <a href="{{ route('treatment.index') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-eye m-r-5 icon3"></i>
                        All Treatments
                    </a>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <form id="createTreatmentForm" class="form-container" style="width:60%; padding-bottom: 60px;">
                    @csrf

                    <div class="form-group">
                        <label><i class="fas fa-cogs icon-style"></i> Treatment Name</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-user-md icon-style"></i> Doctor Name</label>
                        <select class="form-control" name="doctor_id" id="doctorSelect" required>
                            <option value="">Select Doctor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-clipboard-list icon-style"></i> Description</label>
                        <textarea cols="30" rows="4" class="form-control" name="description" required
                            style="border-radius:10px"></textarea>
                    </div>

                    <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                    <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>

                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Create Treatment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        let token = localStorage.getItem('token');

        // Initialize form validation
        $('#createTreatmentForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                doctor_id: {
                    required: true
                },
                description: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter the treatment name",
                    minlength: "Treatment name must be at least 3 characters long"
                },
                doctor_id: {
                    required: "Please select a doctor"
                },
                description: {
                    required: "Please enter a description",
                    minlength: "Description must be at least 10 characters long"
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

        // Submit Treatment Form
        $('#createTreatmentForm').on('submit', function (e) {
            e.preventDefault();

            if ($('#createTreatmentForm').valid()) {
                let formData = new FormData(this);

                $.ajax({
                    url: '/api/treatments',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { "Authorization": "Bearer " + token },
                    success: function (response) {
                        $('#successMessage').text(response.message || 'Treatment created successfully!').show();
                        $('#createTreatmentForm')[0].reset();
                        setTimeout(function () {
                            window.location.href = "{{ route('treatment.index') }}";
                        }, 1500);
                    },
                    error: function (xhr) {
                        let errorMessage = xhr.responseJSON.message || 'Something went wrong.';
                        $('#errorMessage').text(errorMessage).show();
                    }
                });
            }
        });

        // Fetch Doctors for Dropdown
        $.ajax({
            url: '/api/doctors',
            type: 'GET',
            headers: { "Authorization": "Bearer " + token },
            success: function (response) {
                let doctorSelect = $('#doctorSelect');
                doctorSelect.empty();
                doctorSelect.append('<option value="">Select Doctor</option>');
                response.forEach(function (doctor) {
                    doctorSelect.append(`<option value="${doctor.id}">${doctor.fullname}</option>`);
                });
            },
            error: function () {
                console.error("Failed to load doctors.");
            }
        });
    });
</script>

@endsection
