@extends('layout.app')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class=" col-6">
                <h4 class="page-title" style="padding-left: 140px;text-align:center; !important">Edit Medicine</h4>
            </div>
            @if(app('hasPermission')(27, 'view'))
                <div class="col-6 text-center m-b-2 " style="padding-right:150px">
                    <a href="{{ route('medicine.index') }}" class="btn btn-primary  btn-rounded">
                        <i class="fa fa-eye m-r-5 icon3  "></i>
                        All Medicine</a>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="medicineForm" method="POST" action="javascript:void(0);"
                    enctype="multipart/form-data" style="width:60% ;padding-bottom: 60px;">
                    @csrf
                    <input type="hidden" id="medicineId">
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
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-align-left icon-style"></i> Description</label>
                                    <textarea class="form-control" rows="3" name="description" id="description"
                                        style="border-radius:10px"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div id="imagePreviewContainer">
                                        <img id="imagePreview" src="" alt="Medicine Image"
                                            style="max-width: 200px; display: none;">
                                    </div>

                                    <!-- Image Input -->

                                    <label><i class="fas fa-image icon-style"></i> Upload Image</label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="{{ asset('admin/assets/img/medicine.jpg') }}">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" id="imageInput" name="image" accept="image/*">
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
                                    <input class="form-control" type="text" name="unit" id="unit" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-sort-numeric-up icon-style"></i> Quantity <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="quantity" id="quantity" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-alt icon-style"></i> Manufacture Date <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="manufacture_date"
                                            id="manufacture_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-times icon-style"></i> Expiry Date <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="expiry_date"
                                            id="expiry_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-toggle-on icon-style"></i> Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="status" required>
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
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
        });
    });

    function nextStep() {
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
                description: {
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
                description: {
                    required: "Please enter the medicine description",
                    minlength: "Medicine description must be at least 3 characters long"
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

        var pathParts = window.location.pathname.split('/');
        var medicineId = pathParts[pathParts.length - 1];

        $("#medicineId").val(medicineId);
        $.ajax({
            url: '/api/medicines/' + medicineId,
            type: 'GET',

            success: function (data) {
                $('#categoryDropdown').val(data.category_id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#unit').val(data.unit);
                $('#quantity').val(data.quantity);

                $('#status').val(data.status);

                if (data.manufacture_date) {
                    var manufactureParts = data.manufacture_date.split('-'); // Split "dd-mm-yyyy"
                    var formattedManufactureDate = manufactureParts[2] + '-' + manufactureParts[1] + '-' + manufactureParts[0]; // Convert to "yyyy-mm-dd"
                    $('#manufacture_date').val(formattedManufactureDate);
                }

                if (data.expiry_date) {
                    var expiryParts = data.expiry_date.split('-');
                    var formattedExpiryDate = expiryParts[2] + '-' + expiryParts[1] + '-' + expiryParts[0];
                    $('#expiry_date').val(formattedExpiryDate);
                }

                if (data.image) {
                    $('#imagePreview').attr('src', '/storage/' + data.image).show();
                    $('#imagePreviewContainer').show();
                }
            },
            error: function () {
                alert('Failed to fetch medicine details.');
            }
        });

        $("#medicineForm").submit(function (e) {
            e.preventDefault();

            if ($('#medicineForm').valid()) {
                // Convert all datetime fields from dd-mm-yyyy to yyyy-mm-dd
                $(".datetimepicker").each(function () {
                    var dateValue = $(this).val();
                    if (dateValue) {
                        var dateParts = dateValue.split('-'); // Expecting dd-mm-yyyy format
                        if (dateParts.length === 3) {
                            var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // yyyy-mm-dd
                            $(this).val(formattedDate);
                        }
                    }
                });

                // Validate manufacture and expiry dates before submission
                var manufactureDate = new Date($('#manufacture_date').val());
                var expiryDate = new Date($('#expiry_date').val());

                if (expiryDate <= manufactureDate) {
                    alert("Expiry date must be after manufacture date.");
                    return;
                }

                var formData = new FormData(this);
                formData.append('_method', 'PUT');

                $.ajax({
                    url: '/api/medicines/' + medicineId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#successMessage').text(response.message || 'Medicine updated successfully').show();
                        $('#medicineForm')[0].reset();
                        setTimeout(function () {
                            window.location.href = "{{ route('medicine.index') }}";
                        }, 1500);
                    },
                    error: function (xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errorMessages = Object.values(xhr.responseJSON.errors).flat().join("\n");
                            alert(errorMessages);
                        } else {
                            alert('Failed to update medicine.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection
