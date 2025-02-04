@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    <i class="fa fa-pills icons"></i> Medicine Details
                </h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('medicine.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Medicine Details
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">
                        <h3 style="float:left" class="text-dark">
                            <i class="fa fa-info-circle icon-style2"></i>
                            <span class="">Medicine Details</span>
                        </h3>
                    </div>

                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-3 ">
                                <p class="text-dark">
                                    <strong><i class="fa fa-image icon-style1 "></i> Image: </strong><br>
                                    <img id="medicine_image" src="" width="200" height="200" alt="Medicine Image"
                                        style="border-radius:20px">
                                </p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-dark">
                                            <strong><i class="fa fa-id-badge icon-style1"></i> Medicine Name: </strong>
                                            <span id="medicine_name"></span>
                                        </p>

                                        <hr>
                                        <p class="text-dark">
                                            <strong><i class="fa fa-align-left icon-style1"></i> Description: </strong>
                                            <span id="medicine_description"></span>
                                        </p>
                                        <hr>
                                        <p class="text-dark">
                                            <strong><i class="fa fa-align-left icon-style1"></i> Category: </strong>
                                            <span id="medicine_category"></span>
                                        </p>
                                        <hr>
                                        <p class="text-dark">
                                            <strong><i class="fa fa-cogs icon-style1"></i> Unit: </strong>
                                            <span id="medicine_unit"></span>
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-dark">
                                            <strong><i class="fa fa-check-circle icon-style1"></i> Status: </strong>
                                            <span id="medicine_status"></span>
                                        </p>
                                        <hr>

                                        <p class="text-dark">
                                            <strong><i class="fa fa-cubes icon-style1"></i> Quantity: </strong>
                                            <span id="medicine_quantity"></span>
                                        </p>
                                        <hr>

                                        <p class="text-dark">
                                            <strong><i class="fa fa-calendar-plus icon-style1"></i> Manufacture Date:
                                            </strong>
                                            <span id="medicine_manufacture_date"></span>
                                        </p>
                                        <hr>

                                        <p class="text-dark">
                                            <strong><i class="fa fa-calendar-check icon-style1"></i> Expiry Date:
                                            </strong>
                                            <span id="medicine_expiry_date"></span>
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button mb-4" style="display: flex; justify-content: end; margin: 0 5px;">
                            <a href="#" class="btn btn-primary btn-rounded edit-medicine-btn"
                                style="color:black; margin-right:10px">
                                <i class="fa fa-pencil-alt"></i> Edit Medicine
                            </a>

                            <button type="button" class="btn btn-danger btn-rounded delete-medicine"
                                data-id="{{ $medicine_id }}">
                                <i class="fa fa-trash"></i> Delete Medicine
                            </button>
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
        var medicineId = "{{ $medicine_id }}";

        $.ajax({
            url: '/api/medicines/' + medicineId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('#medicine_name').text(data.name);
                $('#medicine_description').text(data.description);
                $('#medicine_unit').text(data.unit);
                $('#medicine_status').text(data.status);
                $('#medicine_quantity').text(data.quantity);
                $('#medicine_manufacture_date').text(data.manufacture_date);
                $('#medicine_expiry_date').text(data.expiry_date);


                $('#medicine_image').attr('src', '/storage/' + data.image);




                $('#medicine_category').text(data.category_name);
            },
            error: function () {
                alert('Failed to fetch Medicine details.');
            }
        });
    });

    $(document).ready(function () {
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
                $(".edit-medicine-btn").attr("href", "/medicine/edit/" + data.id);
            },
            error: function () {
                alert('Failed to fetch medicine details.');
            }
        });
    });


    $(document).on('click', '.delete-medicine', function () {
        var medicineId = $(this).data('id');

        if (!medicineId) {
            alert('Medicine ID not found!');
            return;
        }

        if (confirm('Are you sure you want to delete this medicine?')) {
            $.ajax({
                url: '/api/medicines/' + medicineId,
                type: 'DELETE',
                success: function (response) {


                    $('button[data-id="' + medicineId + '"]').closest('tr').remove();


                    $("#successMessage").text("medicine delete successfully!").fadeIn().delay(3000).fadeOut();
                    setTimeout(function () {
                        window.location.href = "{{ route('medicine.index') }}";
                    }, 2000);
                },

            });
        }
    });



</script>













<style>
    /* .card-footer {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    } */

    .icon-style1 {
        background-color: white;
        color: rgb(157 195 179);
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }

    .icon-style2 {
        /* background-color: white; */
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }
</style>
@endsection