@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    <i class="fa fa-cogs"></i> Service Details
                </h4>
            </div>
            @if(app('hasPermission')(31, 'view'))
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('service.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Services
                </a>
            </div>
            @endif
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">

                        <h3 style="float:left" class="text-dark"><i class="fa fa-info-circle icon-style2"></i> <span
                                class="service_name"></span> Details
                        </h3>

                    </div>

                    <div class="card-body mt-3">
                        <p class="text-dark"><strong><i class="fa fa-id-badge icon-style1"></i> Service Name : </strong>
                            <span class="service_name"></span>
                        </p>

                        <hr>
                        <p class="text-dark"><strong><i class="fa fa-align-left icon-style1"></i> Description :
                            </strong>
                            <span id="service_description"></span>
                        </p>
                        <hr>

                        <p class="text-dark"><strong><i class="fa fa-list icon-style1"></i> Type : </strong>
                            <span id="service_type"></span>
                        </p>
                        <hr>

                        <p class="text-dark"><strong><i class="fa fa-money-check-alt icon-style1"></i> Price : </strong>
                            <span id="service_price"></span>
                        </p>
                        <hr>

                        <p class="text-dark"><strong><i class="fa fa-calendar-plus icon-style1"></i> Created At :
                            </strong>
                            <span id="service_created_at"></span>
                        </p>

                        <div class="button mb-4" style="display: flex; justify-content: end; margin: 0 5px;">
                        @if(app('hasPermission')(31, 'update'))
                            <a href="#" class="btn btn-primary btn-rounded edit-service-btn"
                                style="color:black; margin-right:10px">
                                <i class="fa fa-pencil-alt"></i> Edit Service
                            </a>
                            @endif
                            @if(app('hasPermission')(31, 'delete'))
                            <button type="button" class="btn btn-danger btn-rounded delete-service"
                                data-id="{{ $service_id }}">
                                <i class="fa fa-trash"></i> Delete Service
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
        var serviceId = "{{ $service_id }}";

        $.ajax({
            url: '/api/services/' + serviceId,
            type: 'GET',
            dataType: 'json',
            success: function (service) {
                $('.service_name').text(service.name);
                $('#service_description').text(service.description);
                $('#service_type').text(service.type);
                $('#service_price').text(service.price);
                $('#service_created_at').text(service.created_at);
            },
            error: function () {
                alert('Failed to fetch service details.');
            }
        });
    });

    $(document).on('click', '.delete-service', function () {
        var serviceId = $(this).data('id');
        console.log("Deleting Service ID:", serviceId);
        if (!serviceId) {
            alert('Service ID is missing!');
            return;
        }

        if (confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: '/api/services/' + serviceId,
                type: 'DELETE',

                success: function (response) {
                    $("#successMessage").text("Service deleted successfully!").fadeIn().delay(3000).fadeOut();
                    setTimeout(function () {
                        window.location.href = "{{ route('service.index') }}";
                    }, 2000);
                },
                error: function () {
                    alert('Error deleting service.');
                }
            });
        }
    });


    $(document).ready(function () {
        var pathParts = window.location.pathname.split('/');
        var serviceId = pathParts[pathParts.length - 1];  

        console.log("Extracted Service ID from URL:", serviceId);

        if (!serviceId || isNaN(serviceId)) {
            alert("Error: Service ID is missing or invalid.");
            return;
        }

      
        $.ajax({
            url: "/api/services/" + serviceId,
            type: "GET",
            success: function (service) {
              
                $("#name").val(service.name);
                $("#description").val(service.description);
                $("#type").val(service.type);
                $("#price").val(service.price);
                $("input[name='status'][value='" + service.status + "']").prop("checked", true);
                $(".edit-service-btn").attr("href", "/service/edit/" + service.id);
            },
            error: function () {
                alert("Failed to fetch service details.");
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