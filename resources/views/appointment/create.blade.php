@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title text-center" style="padding-left: 130px;">Add Appointment</h4>
            </div>
            <div class="col-6 text-center m-b-2" style="padding-right: 75px;">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Appointment
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:60% ;padding-bottom: 60px;">
                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user-injured icon-style"></i> Patient Name</label>
                                    <select class="form-control " name="patient_name">
                                        <option>Select</option>
                                        <option>Jennifer Robinson</option>
                                        <option>Terry Baker</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-stethoscope icon-style"></i> Treatment</label>
                                    <select class="form-control" name="treatment">
                                        <option>Select</option>
                                        <option>Dentists</option>
                                        <option>Neurology</option>
                                        <option>Opthalmology</option>
                                        <option>Orthopedics</option>
                                        <option>Cancer Department</option>
                                        <option>ENT Department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user-md icon-style"></i> Doctor</label>
                                    <select class="form-control" name="doctor_name">
                                        <option>Select</option>
                                        <option>Cristina Groves</option>
                                        <option>Marie Wells</option>
                                        <option>Henry Daniels</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-day icon-style"></i> Appointment Type</label>
                                    <select class="form-control" name="appointment_type">
                                        <option>Select</option>
                                        <option>Virtual</option>
                                        <option>In-person</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-alt icon-style"></i> Status</label>
                                    <select class="form-control" name="appointment_status">
                                        <option>Select</option>
                                        <option>Today's Appointment</option>
                                        <option>Upcoming Appointment</option>
                                        <option>Pending</option>
                                        <option>Completed</option>
                                        <option>Cancelled</option>
                                        <option>Confirmed</option>
                                        <option>Rejected</option>
                                        <option>Follow-up</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary"
                            style="margin-left:5px;padding:8px 50px;float:right;" onclick="nextStep()">
                            Next
                        </button>
                    </div>

                    <!-- Step 2 -->
                    <div class="form-step" id="step-2" style="display: none;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-clock icon-style"></i> Time</label>
                                    <input type="text" class="form-control timepicker" name="appointment_time"
                                        placeholder="Select Time">
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-hourglass-half icon-style"></i> Duration</label>
                                    <input type="text" class="form-control" name="duration">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt icon-style"></i> Clinic Location</label>
                                    <input type="text" class="form-control" name="clinic_location">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-check icon-style"></i> Follow-up Required</label>
                                    <select class="form-control" name="followup_required">
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-pencil-alt icon-style"></i> Follow-up Update</label>
                                    <textarea class="form-control" name="followup_update" rows="4"
                                        style="border-radius:10px"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-danger"
                            style="padding:8px 50px;border-radius:50px; float:left" onclick="prevStep()">
                            Previous
                        </button>

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
  $(document).ready(function() {
    $('.timepicker').timepicker({
        showMeridian: true,  
        defaultTime: '12:00 PM',
    
    });
});


    function nextStep() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar');
            }
        });
    });
</script>

@endsection