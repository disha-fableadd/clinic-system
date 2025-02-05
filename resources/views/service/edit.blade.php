@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content" style="height:100vh;">
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center;padding-left: 170px;">Edit Service</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2">
                <a href="{{ route('service.index') }}" class="btn btn-primary btn-rounded" style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Services
                </a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container" style="width:60% ;padding-bottom: 60px;" id="editServiceForm">
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
                        <button type="submit" class="btn btn-primary submit-btn">Update Service</button>
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
        var serviceId = "{{ $service_id }}";

        if (!serviceId || isNaN(serviceId)) {
            alert("Error: Service ID is missing or invalid.");
            return;
        }

        // Fetch service data using API
        $.ajax({
            url: "/api/services/" + serviceId,
            type: "GET",
            success: function (service) {
                $("#name").val(service.name);
                $("#description").val(service.description);
                $("#type").val(service.type);
                $("#price").val(service.price);
                $("input[name='status'][value='" + service.status + "']").prop("checked", true);
            },
            error: function () {
                alert("Failed to fetch service details.");
            }
        });

        // Handle form submission
        $("#editServiceForm").submit(function (event) {
            event.preventDefault();

            let serviceData = {
                name: $("#name").val(),
                description: $("#description").val(),
                type: $("#type").val(),
                price: $("#price").val(),
                status: $("input[name='status']:checked").val(),
            };

            $.ajax({
                url: "/api/services/" + serviceId,
                type: "PUT",
                data: JSON.stringify(serviceData),
                contentType: "application/json",
                success: function (response) {
                    $("#successMessage").text("Service updated successfully!").fadeIn().delay(3000).fadeOut();
                    setTimeout(function () {
                        window.location.href = "{{ route('service.index') }}";
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
