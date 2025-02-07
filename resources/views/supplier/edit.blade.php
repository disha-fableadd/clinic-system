@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title text-center" style="padding-left: 75px;">Edit Supplier</h4>
            </div>
            @if(app('hasPermission')(35, 'view'))
            <div class="col-6 text-center m-b-2" style="padding-right: 55px;">
                <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Supplier
                </a>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="editSupplierForm" method="" action=""
                    style="width:60%; padding-bottom: 30px;">
                    @csrf
                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fa fa-hospital-o icon-style"></i> Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user icon-style"></i> Contact_Person</label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-phone icon-style"></i> Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope icon-style"></i> Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            </div>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label><i class="fas fa-map-marker-alt icon-style"></i> Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                        </div>

                     

                        <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Edit Supplier Details</button>
                    </div>
                    </div>

                    
                </form>
                <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>


            </div>
        </div>
    </div>
</div>











<script>
    $(document).ready(function () {
        let token = localStorage.getItem('token');

        if (!token) {
            window.location.href = "{{ route('login') }}";
        }

        var supplierId = "{{ $supplier_id }}"; // Ensure this is passed from the controller

        if (!supplierId || isNaN(supplierId)) {
            alert("Error: Supplier ID is missing or invalid.");
            return;
        }

        // Fetch supplier details
        $.ajax({
            url: "/api/suppliers/" + supplierId,
            type: "GET",
            headers: { "Authorization": "Bearer " + token },
            success: function (supplier) {
                $("#company_name").val(supplier.name);
                $("#contact_person").val(supplier.contact_person);
                $("#phone").val(supplier.phone);
                $("#email").val(supplier.email);
                $("#address").val(supplier.address);
            },
            error: function () {
                alert("Failed to fetch supplier details.");
            }
        });

        // Handle form submission for updating supplier
        $("#editSupplierForm").submit(function (event) {
            event.preventDefault();

            let supplierData = {
                name: $("#company_name").val(),
                contact_person: $("#contact_person").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                address: $("#address").val(),
            };

            $.ajax({
                url: "/api/suppliers/" + supplierId,
                type: "PUT",
                data: JSON.stringify(supplierData),
                contentType: "application/json",
                headers: { "Authorization": "Bearer " + token },
                success: function (response) {
                    $("#successMessage").text("Supplier updated successfully!").fadeIn().delay(3000).fadeOut();
                    setTimeout(function () {
                        window.location.href = "{{ route('supplier.index') }}";
                    }, 2000);
                },
                error: function (xhr) {
                    $("#errorMessage").text("Error: " + xhr.responseJSON.message).fadeIn().delay(3000).fadeOut();
                }
            });
        });
    });
</script>

@endsection
