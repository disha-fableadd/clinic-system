@extends('layout.app')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class=" col-6">
                <h4 class="page-title text-center" style="padding-left: 70px;">Add Medicine</h4>
            </div>
            @if(app('hasPermission')(27, 'view'))
            <div class=" col-6 text-center m-b-2" style="padding-right: 60px;">
                <a href="{{ route('medicine.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5"></i> All Medicines
                </a>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="medicineForm" method="POST" action="javascript:void(0);"
                    enctype="multipart/form-data" style="width:60% ;padding-bottom: 60px;">
                    @csrf

                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-boxes icon-style"></i> Category <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="category_id" id="categoryDropdown" required>
                                        <option value="">Select Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-pills icon-style"></i> Medicine Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-align-left icon-style"></i> Description</label>
                                    <textarea class="form-control" rows="3" name="description"
                                        style="border-radius:10px"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-image icon-style"></i> Upload Image</label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="{{ asset('admin/assets/img/medicine.jpg') }}">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"
                            style="margin-left:5px;padding:8px 50px;float:right;" onclick="nextStep()">
                            Next
                        </button>
                    </div>

                    <!-- Step 2 -->
                    <div class="form-step" id="step-2" style="display: none;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-weight icon-style"></i> Unit <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="unit" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-sort-numeric-up icon-style"></i> Quantity <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="quantity" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-alt icon-style"></i> Manufacture Date <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" id="manufacture_date"
                                            name="manufacture_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-times icon-style"></i> Expiry Date <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" id="expiry_date"
                                            name="expiry_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-toggle-on icon-style"></i> Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option value="active">active</option>
                                        <option value="inactive">inactive</option>
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
                <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    function nextStep() {
        // Validate only the visible step
        var validator = $("#medicineForm").validate();
        if (validator.element("#categoryDropdown") && validator.element("[name='name']")) {
            document.getElementById('step-1').style.display = 'none';
            document.getElementById('step-2').style.display = 'block';
        }
    }

    function prevStep() {
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    }

    $(document).ready(function () {
        $('.datetimepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        // Initialize form validation
        $('#medicineForm').validate({
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
                url: '/api/categories',
                type: 'GET',
                success: function (response) {
                    var categoryDropdown = $('select[name="category_id"]');
                    categoryDropdown.empty();
                    categoryDropdown.append('<option value="">Select Category</option>');

                    $.each(response, function (index, category) {
                        categoryDropdown.append('<option value="' + category.id + '">' + category.name + '</option>');
                    });
                },
                error: function () {
                    alert('Failed to load categories.');
                }
            });
        }

        $('#medicineForm').on('submit', function (e) {
            e.preventDefault();

            if ($('#medicineForm').valid()) {
                var manufactureDate = $('#manufacture_date').val();
                if (manufactureDate) {
                    var manufactureParts = manufactureDate.split('-'); // "dd-mm-yyyy"
                    manufactureDate = manufactureParts[2] + '-' + manufactureParts[1] + '-' + manufactureParts[0]; // Convert to "yyyy-mm-dd"
                    $('#manufacture_date').val(manufactureDate);
                }

                // Convert expiry_date from dd-mm-yyyy to yyyy-mm-dd
                var expiryDate = $('#expiry_date').val();
                if (expiryDate) {
                    var expiryParts = expiryDate.split('-'); // "dd-mm-yyyy"
                    expiryDate = expiryParts[2] + '-' + expiryParts[1] + '-' + expiryParts[0]; // Convert to "yyyy-mm-dd"
                    $('#expiry_date').val(expiryDate);
                }

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ url('api/medicines') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#successMessage').text(response.message || 'Medicine created successfully').show();
                        $('#medicineForm')[0].reset();

                        setTimeout(function () {
                            window.location.href = "{{ route('medicine.index') }}";
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
