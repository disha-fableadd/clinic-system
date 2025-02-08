@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    <i class="fa fa-cogs"></i> Treatments Details
                </h4>
            </div>
            @if(app('hasPermission')(30, 'view'))
                <div class="col-sm-8 col-9 text-right m-b-2" style="padding-right: 65px;">
                    <a href="{{ route('treatment.index') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-eye m-r-5 icon3"></i>
                        Back To All Treatments
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
                            <span class="treatment_name"></span> Details
                        </h3>
                    </div>

                    <div class="card-body mt-3">
                        <p class="text-dark">
                            <strong><i class="fa fa-id-badge icon-style1"></i> Treatment Name: </strong>
                            <span class="treatment_name"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-user icon-style1"></i>Doctor Name: </strong>
                            <span id="doctor_name"></span>
                        </p>
                        <hr>

                        <p class="text-dark">
                            <strong><i class="fa fa-phone icon-style1"></i> Description: </strong>
                            <span id="description"></span>
                        </p>
                        <hr>



                        <p class="text-dark">
                            <strong><i class="fa fa-calendar-plus icon-style1"></i> Created At: </strong>
                            <span id="treatment_created_at"></span>
                        </p>

                        <div class="button mb-4" style="display: flex; justify-content: end; margin: 0 5px;">
                            @if(app('hasPermission')(31, 'update'))
                                <a href="#" class="btn btn-primary btn-rounded edit-treatment-btn"
                                    style="color:black; margin-right:10px">
                                    <i class="fa fa-pencil-alt"></i> Edit Treatment
                                </a>
                            @endif
                            @if(app('hasPermission')(31, 'delete'))
                                <button type="button" class="btn btn-danger btn-rounded delete-treatment"
                                    data-id="{{ $treatment_id }}">
                                    <i class="fa fa-trash"></i> Delete Treatment
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
        var pathParts = window.location.pathname.split('/');
        var treatmentId = pathParts[pathParts.length - 1];
        let token = localStorage.getItem('token');
        console.log("Extracted Treatment ID from URL:", treatmentId);

        if (!treatmentId || isNaN(treatmentId)) {
            alert("Error: Treatment ID is missing or invalid.");
            return;
        }

        $.ajax({
            url: "/api/treatments/" + treatmentId,
            type: "GET",
            dataType: "json",
            headers: { "Authorization": "Bearer " + token },
            success: function (treatment) {
                console.log("Fetched Treatment Data:", treatment);

                $(".treatment_name").text(treatment.name);
                $("#doctor_name").text(treatment.doctor_name || 'N/A');
                $("#description").text(treatment.description);
                $("#treatment_created_at").text(treatment.created_at);

                // Update the edit button link
                $(".edit-treatment-btn").attr("href", "/treatment/edit/" + treatment.id);
            },
            error: function () {
                alert("Failed to fetch treatment details.");
            }
        });
    });


    $(document).on('click', '.delete-treatment', function () {
        var treatmentId = $(this).data('id');
        let token = localStorage.getItem('token');

        if (!token) {
            window.location.href = "{{ route('login') }}";
        }

        if (confirm('Are you sure you want to delete this treatment?')) {
            $.ajax({
                url: '/api/treatments/' + treatmentId, // Adjust API endpoint
                type: 'DELETE',
                headers: { "Authorization": "Bearer " + token },
                success: function (response) {
                    $('button[data-id="' + treatmentId + '"]').closest('tr').remove();


                    $("#successMessage").text("medicine delete successfully!").fadeIn().delay(3000).fadeOut();
                    setTimeout(function () {
                        window.location.href = "{{ route('treatment.index') }}";
                    }, 2000);
                },
                error: function () {
                    alert("Error deleting treatment.");
                }
            });
        }
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