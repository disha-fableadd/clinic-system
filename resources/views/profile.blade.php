@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">
                    <i class="fa fa-user"></i> Profile Details
                </h4>
            </div>
            <div class="col-sm-8 col-9 text-right">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">
                        <h3 style="float:left" class="text-dark">
                            <i class="fa fa-info-circle icon-style2"></i> <span class="user-name"></span>'s Profile
                        </h3>
                        <a href="#" class="btn btn-primary btn-rounded">
                            <i class="fa fa-pencil-alt"></i> Edit Profile
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mt-4">
                                <img id="" class="avatar user-image" src="" alt="Profile Image"
                                    style="width: 180px; height: 180px; border-radius: 50%; border: 3px solid #4caf50;">
                            </div>
                            <div class="col-md-9 mt-3">
                                <div class="row">
                                    <div class="col-md-6">

                                        <p class="text-dark"><strong>Role:</strong> <span id="role-select"></span>
                                        </p>
                                        <hr>
                                        <p class="text-dark"><strong>UserName:</strong> <span
                                                id="user-name-detail"></span>
                                        </p>
                                        <hr>
                                        <p class="text-dark"><strong>Email:</strong> <span id="user-email"></span></p>
                                        <hr>
                                        <p class="text-dark"><strong>Phone:</strong> <span id="user-phone"></span></p>
                                        <hr>
                                        <p class="text-dark"><strong>Birthday:</strong> <span id="user-dob"></span></p>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-dark"><strong>Address:</strong> <span id="user-address"></span>
                                        </p>
                                        <hr>
                                        <p class="text-dark"><strong>Gender:</strong> <span id="user-gender"></span></p>
                                        <hr>
                                        <p class="text-dark"><strong>City:</strong> <span id="city"></span>
                                        </p>
                                        <hr>
                                        <p class="text-dark"><strong>State:</strong> <span id="state"></span></p>
                                        <hr>
                                        <p class="text-dark"><strong>Shift:</strong> <span id="shift"></span></p>
                                        <hr>
                                        <p class="text-dark"><strong>Salary:</strong> <span id="salary"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  

  $(document).ready(function() {
    let token = localStorage.getItem('token');



    $.ajax({
        url: '/api/profile',  // Adjust the URL if needed
        method: 'GET',
        headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
        success: function(response) {
            if(response.user && response.userDetails) {
                $('.user-name').text(response.user.fullname);
                $('#role-select').text(response.user.role ? response.user.role.name : 'N/A');
                $('#user-name-detail').text(response.user.username);
                $('#user-email').text(response.user.email);
                $('#user-phone').text(response.user.phone);
                $('#user-dob').text(response.userDetails.birth_date);
                $('#user-address').text(response.userDetails.address);
                $('#user-gender').text(response.userDetails.gender);
                $('#city').text(response.userDetails.city);
                $('#state').text(response.userDetails.state);
                $('#shift').text(response.userDetails.shift);
                $('#salary').text(response.userDetails.salary);
                // If there's a profile image path, update it
                $('.user-image').attr('src', response.user.profile ? '/storage/' + response.user.profile : 'default-avatar.jpg');
            } else {
                console.log('User or user details not found');
            }
        },
        error: function(error) {
            console.log('Error fetching profile:', error);
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

    .experience-list {
        list-style-type: none;
        padding-left: 0;
    }

    .experience-list li {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
    }

    .experience-user .before-circle {
        width: 12px;
        /* Increased size of the dot */
        height: 12px;
        /* Increased size of the dot */
        background-color: #4caf50;
        border-radius: 50%;
        position: absolute;
        left: 0;
        /* No margin to the left */
        top: 50%;
        /* Align the dot vertically */
        transform: translateY(-50%);
        /* Ensure it's centered vertically */
    }

    .experience-content {
        flex: 1;
        padding-left: 20px;
        /* Space for the line to go through the dot */
        position: relative;
    }

    .experience-content::before {
        content: "";
        position: absolute;
        left: -5px;
        /* Align with the dot */
        top: 50%;
        width: 1px;
        /* Line thickness */
        height: 100%;
        /* Full height of the item */
        background-color: #4caf50;
        /* Green line color */
        transform: translateY(-50%);
        /* Center the line vertically */
    }

    .timeline-content a {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .timeline-content .time {
        display: block;
        font-size: 14px;
        color: #888;
        margin-top: 5px;
    }

    .card-body {
        padding: 20px;
    }
</style>
@endsection