@extends('layout.app')

@section('content')

<div class="page-wrapper">
    <div class="content" style="height:100vh;">
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center;padding-left: 170px;">Add Service</h4>
            </div>
            @if(app('hasPermission')(31, 'view'))
                <div class="col-sm-6 col-7 text-center m-b-2">
                    <a href="{{ route('service.index') }}" class="btn btn-primary btn-rounded" style="margin-left: 200px;">
                        <i class="fa fa-eye m-r-5 icon3"></i>
                        All Services
                    </a>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container" style="width:60% ;padding-bottom: 60px;" id="createServiceForm">
                    <div class="form-group">
                        <label><i class="fas fa-cogs icon-style"></i> Service Name</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-align-left icon-style"></i> Description</label>
                        <textarea cols="30" rows="4" class="form-control" name="description" id="description"
                            style="border-radius:10px" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><i class="fas fa-list icon-style"></i> Type</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="">Select</option>
                                    <option value="x-ray">x-ray</option>
                                    <option value="blood-test">blood-test</option>
                                    <option value="consultation">consultation</option>
                                    <option value="surgery">surgery</option>
                                    <option value="therapy">therapy</option>
                                    <option value="other">other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><i class="fas fa-dollar-sign icon-style"></i> Price</label>
                                <input class="form-control" type="number" name="price" id="price" min="0" step="0.01"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="display-block"><i class="fas fa-check-circle icon-style"></i> Status</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="active" value="active"
                                    checked>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactive"
                                    value="inactive">
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="discontinued"
                                    value="discontinued">
                                <label class="form-check-label" for="discontinued">
                                    Discontinued
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Create Service</button>
                    </div>
                </form>
                <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar');
            }
        });
    });

    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    $(document).ready(function () {
        // Initialize form validation
        $('#createServiceForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                description: {
                    required: true,
                    minlength: 10
                },
                type: {
                    required: true
                },
                price: {
                    required: true,
                    number: true,
                    min: 0
                },
                status: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter the service name",
                    minlength: "Service name must be at least 3 characters long"
                },
                description: {
                    required: "Please enter a description",
                    minlength: "Description must be at least 10 characters long"
                },
                type: {
                    required: "Please select a type"
                },
                price: {
                    required: "Please enter the price",
                    number: "Please enter a valid number",
                    min: "Price must be greater than or equal to 0"
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

        $('#createServiceForm').on('submit', function (e) {
            e.preventDefault();  // Prevent form submission

            if ($('#createServiceForm').valid()) {
                let formData = new FormData(this);

                $.ajax({
                    url: '/api/services',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                    success: function (response) {
                        $('#successMessage').text(response.message || 'Service created successfully').show();
                        $('#createServiceForm')[0].reset();
                        setTimeout(function () {
                            window.location.href = "{{ route('service.index') }}";
                        }, 1500);
                    },
                    error: function (xhr) {
                        let errorMessage = xhr.responseJSON.message || 'Something went wrong.';
                        $('#errorMessage').text(errorMessage).show();
                    }
                });
            }
        });
    });
</script>

@endsection
