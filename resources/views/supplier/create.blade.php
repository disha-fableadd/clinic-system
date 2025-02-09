@extends('layout.app')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title text-center" style="padding-left: 75px;">Add Supplier</h4>
            </div>
            @if(app('hasPermission')(35, 'view'))
                <div class="col-6 text-center m-b-2" style="padding-right: 55px;">
                    <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-eye m-r-5 icon3"></i>
                        All Suppliers
                    </a>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="createSupplierForm" method="POST" action=""
                    style="width:60%; padding-bottom: 30px;">
                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fa fa-hospital-o icon-style"></i> Company Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user icon-style"></i> Contact Person</label>
                                    <input type="text" class="form-control" name="contact_person">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-phone icon-style"></i> Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope icon-style"></i> Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt icon-style"></i> Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Supplier Details</button>
                        </div>
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
    $(document).ready(function () {
        $('.timepicker').timepicker({
            showMeridian: true,
            defaultTime: '12:00 PM',
        });
    });


    $(document).ready(function () {

        let token = localStorage.getItem('token');
        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }


        // jQuery validation
        $('#createSupplierForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                contact_person: {
                    required: true,
                    minlength: 3
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
            name: "<span style='color: red;'>Please enter the company name (at least 3 characters)</span>",
            contact_person: "<span style='color: red;'>Please enter the contact person's name (at least 3 characters)</span>",
            phone: "<span style='color: red;'>Please enter a valid phone number (10-15 digits)</span>",
            email: "<span style='color: red;'>Please enter a valid email address</span>",
            address: "<span style='color: red;'>Please enter the address (at least 5 characters)</span>"
        },
            submitHandler: function (form) {
                let formData = new FormData(form);
                $.ajax({
                    url: '/api/suppliers',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                    success: function (response) {
                        $('#successMessage').text(response.message || 'Supplier details created successfully').show();
                        $('#createSupplierForm')[0].reset();
                        setTimeout(function () {
                            window.location.href = "{{ route('supplier.index') }}";
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