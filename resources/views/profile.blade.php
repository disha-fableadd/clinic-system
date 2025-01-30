@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    <i class="fa fa-user"></i> Profile Details
                </h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">
                        <h3 style="float:left" class="text-dark"><i class="fa fa-info-circle icon-style2"></i> John
                            Doe's Profile</h3>
                        <a href="" class="btn btn-primary btn-rounded" style="color:black">
                            <i class="fa fa-pencil-alt "></i> Edit Profile
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mt-4">
                                <img class="avatar" src="{{ asset('admin/assets/img/user-02.jpg') }}"
                                    alt="Profile Image"
                                    style="width: 180px; height: 180px; border-radius: 50%; border: 3px solid #4caf50;">
                            </div>
                            <div class="col-md-9 mt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-dark"><strong><i class="fa fa-user icon-style1"></i>
                                                Name:</strong> John Doe</p>
                                        <hr>
                                        <p class="text-dark"><strong><i class="fa fa-envelope icon-style1"></i>
                                                Email:</strong> johndoe@example.com</p>
                                        <hr>
                                        <p class="text-dark"><strong><i class="fa fa-phone icon-style1"></i>
                                                Phone:</strong> 123-456-7890</p>
                                        <hr>
                                        <p class="text-dark"><strong><i class="fa fa-birthday-cake icon-style1"></i>
                                                Birthday:</strong> 01/01/1990</p>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-dark"><strong><i class="fa fa-map-marker icon-style1"></i>
                                                Address:</strong> 123 Main Street, City, Country</p>
                                        <hr>
                                        <p class="text-dark"><strong><i class="fa fa-venus-mars icon-style1"></i>
                                                Gender:</strong> Male</p>
                                        <hr>
                                        <p class="text-dark"><strong><i class="fa fa-calendar-plus icon-style1"></i>
                                                Joining Date:</strong> 01/01/2020</p>
                                        <hr>
                                        <p class="text-dark"><strong><i class="fa fa-calendar-check icon-style1"></i>
                                                Last Updated:</strong> 01/01/2025</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education and Experience Sections -->
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-footer text-left" style="background-color:#87ceb0">
                        <h3 class="text-dark"><i class="fa fa-graduation-cap icon-style2"></i> Education</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mt-3">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">International College of Medical Science (UG)</a>
                                            <div>MBBS</div>
                                            <span class="time">2001 - 2003</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">International College of Medical Science (PG)</a>
                                            <div>MD - Obstetrics & Gynaecology</div>
                                            <span class="time">1997 - 2001</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-footer text-left" style="background-color:#87ceb0">
                        <h3 class="text-dark"><i class="fa fa-briefcase icon-style2"></i> Experience</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mt-3">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Consultant Gynecologist</a>
                                            <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Consultant Gynecologist</a>
                                            <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Consultant Gynecologist</a>
                                            <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    width: 12px; /* Increased size of the dot */
    height: 12px; /* Increased size of the dot */
    background-color: #4caf50;
    border-radius: 50%;
    position: absolute;
    left: 0; /* No margin to the left */
    top: 50%; /* Align the dot vertically */
    transform: translateY(-50%); /* Ensure it's centered vertically */
}

.experience-content {
    flex: 1;
    padding-left: 20px; /* Space for the line to go through the dot */
    position: relative;
}

.experience-content::before {
    content: "";
    position: absolute;
    left: -5px; /* Align with the dot */
    top: 50%;
    width: 1px; /* Line thickness */
    height: 100%; /* Full height of the item */
    background-color: #4caf50; /* Green line color */
    transform: translateY(-50%); /* Center the line vertically */
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
