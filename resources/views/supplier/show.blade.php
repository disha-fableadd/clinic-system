@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    <i class="fa fa-cogs"></i> Supplier Details
                </h4>
            </div>
            @if(app('hasPermission')(35, 'view'))
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Suppliers
                </a>
            </div>
            @endif
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">
                        <h3 style="float:left" class="text-dark">
                            <i class="fa fa-info-circle icon-style2"></i>
                            <span class="company_name"></span> Details
                        </h3>
                    </div>

                    <div class="card-body mt-3">
                        <p class="text-dark">
                            <strong><i class="fa fa-id-badge icon-style1"></i> Company Name: </strong>
                            <span class="company_name"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-user icon-style1"></i> Contact Person: </strong>
                            <span id="contact_person"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-phone icon-style1"></i> Phone: </strong>
                            <span id="supplier_phone"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-envelope icon-style1"></i> Email: </strong>
                            <span id="supplier_email"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-map-marker-alt icon-style1"></i> Address: </strong>
                            <span id="supplier_address"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-calendar-plus icon-style1"></i> Created At: </strong>
                            <span id="supplier_created_at"></span>
                        </p>

                        <div class="button mb-4" style="display: flex; justify-content: end; margin: 0 5px;">
                            @if(app('hasPermission')(31, 'update'))
                            <a href="#" class="btn btn-primary btn-rounded edit-supplier-btn"
                                style="color:black; margin-right:10px">
                                <i class="fa fa-pencil-alt"></i> Edit Supplier
                            </a>
                            @endif
                            @if(app('hasPermission')(31, 'delete'))
                            <button type="button" class="btn btn-danger btn-rounded delete-supplier"
                                data-id="{{ $supplier_id }}">
                                <i class="fa fa-trash"></i> Delete Supplier
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="successMessage" class="alert alert-success" style="display:none;"></div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>

<script>
    $(document).ready(function () {
        var supplierId = "{{ $supplier_id }}";

        $.ajax({
            url: '/api/suppliers/' + supplierId,
            type: 'GET',
            dataType: 'json',
            success: function (supplier) {
                $('.company_name').text(supplier.name);
                $('#contact_person').text(supplier.contact_person);
                $('#supplier_phone').text(supplier.phone);
                $('#supplier_email').text(supplier.email);
                $('#supplier_address').text(supplier.address);
                $('#supplier_created_at').text(supplier.created_at);
            },
            error: function () {
                alert('Failed to fetch supplier details.');
            }
        });
    });

    $(document).on('click', '.delete-supplier', function () {
        var supplierId = $(this).data('id');
        console.log("Deleting Supplier ID:", supplierId);
        if (!supplierId) {
            alert('Supplier ID is missing!');
            return;
        }

        if (confirm('Are you sure you want to delete this supplier?')) {
            $.ajax({
                url: '/api/suppliers/' + supplierId,
                type: 'DELETE',

                success: function (response) {
                    $("#successMessage").text("Supplier deleted successfully!").fadeIn().delay(3000).fadeOut();
                    setTimeout(function () {
                        window.location.href = "{{ route('supplier.index') }}";
                    }, 2000);
                },
                error: function () {
                    alert('Error deleting supplier.');
                }
            });
        }
    });

    $(document).ready(function () {
        var pathParts = window.location.pathname.split('/');
        var supplierId = pathParts[pathParts.length - 1];

        console.log("Extracted Supplier ID from URL:", supplierId);

        if (!supplierId || isNaN(supplierId)) {
            alert("Error: Supplier ID is missing or invalid.");
            return;
        }

        $.ajax({
            url: "/api/suppliers/" + supplierId,
            type: "GET",
            success: function (supplier) {
                $(".edit-supplier-btn").attr("href", "/supplier/edit/" + supplier.id);
            },
            error: function () {
                alert("Failed to fetch supplier details.");
            }
        });
    });

</script>

<style>
    .icon-style1 {
        background-color: white;
        color: rgb(157 195 179);
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }

    .icon-style2 {
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }
</style>

@endsection
