@extends('layout.app')
<style>
    .container {
        width: 60%;
        margin: auto;
    }

    .header1 {
        background: #cfece0;
        color: black;
        padding: 10px 15px;
        font-size: 18px;
        font-weight: bold;
        margin-top: 50px;
        border-radius: 15px;
    }

    .card-body {

        height: auto;
        padding: 20px !important;
    }

    .card {
        margin: 0;
    }

    table {

        margin-top: 10px;
        border-radius: 10px;
        border: 2px solid #cfece0;
        border-collapse: collapse;
        width: 100%;

    }

    table thead tr th {
        background-color: #cfece0 !important;
    }


    th,
    td {
        padding: 10px;
        text-align: center;
    }

    thead,
    tr {
        border-bottom: 2px solid #cfece0;
    }

    th {
        background: #f4f4f4;
    }

    .select-all {
        margin: 10px 5px;
    }
</style>
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title" style="text-align:center;padding-right:200px">Edit Profile</h4>
            </div>
            <div class="col-6 text-center m-b-2" style="padding-left:220px">
                <a href="{{ route('profile') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5"></i>
                    Go To Profile
                </a>
            </div>
        </div>
        <div id="successMessage" class="alert alert-success" style="display:none;"></div>
        <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:80% ;padding-bottom: 30px;">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">


                    <!-- Step 1: Personal Information -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                           

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user icon-style"></i> User Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="username"
                                                placeholder="Enter Username" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user icon-style"></i> Full Name</label>
                                            <input class="form-control" type="text" name="fullname"
                                                placeholder="Enter Full Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-envelope icon-style"></i> Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-phone icon-style"></i> Phone</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="Enter Phone">
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label><i class="fas fa-venus-mars icon-style"></i> Gender</label>
                                    <div class="form-control">
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Male"
                                                required> Male
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Female"
                                                required> Female
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Other"
                                                required> Other
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">

                                            <label><i class="fas fa-image icon-style"></i> Profile Picture</label>
                                            <input type="file" class="form-control" name="profile">

                                            <div id="imagePreviewContainer">
                                                <img id="imagePreview" src="" alt="profile Image"
                                                    style="max-width: 100px; display: none;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-cake-candles icon-style"></i> Birthdate</label>
                                            <input type="date" class="form-control" name="birth_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt icon-style"></i> Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-city icon-style"></i> City</label>
                                        <select class="form-control" name="city">
                                            <option value="">Select City</option>
                                            <option value="Surat">Surat</option>
                                            <option value="Ahemdabad">Ahemdabad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-flag icon-style"></i> State</label>
                                        <select class="form-control" name="state">
                                            <option value="">Select State</option>
                                            <option value="Gujarat">Gujarat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
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



<script>
    $(document).ready(function () {
    $('#multiStepForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '/api/profile',  // PUT request to update profile
            type: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'),  // Ensure token is stored in localStorage
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#successMessage').text(response.message).show();
            },
            error: function (response) {
                $('#errorMessage').text('Error updating profile').show();
            }
        });
    });
});

</script>

@endsection