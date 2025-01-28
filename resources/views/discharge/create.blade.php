@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content" style="height:100vh;">
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center; margin-right: 48px;">Add Discharge Details</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2">
                <a href="{{ route('discharge.index') }}" class="btn btn-primary btn-rounded"
                    style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Discharge Details
                </a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-injured icon-style"></i> Patient Name</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Jennifer Robinson</option>
                                    <option>Terry Baker</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><i class="fas fa-stethoscope icon-style"></i> Treatment</label>
                                <select class="form-control">
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><i class="fas fa-user-md icon-style"></i> Doctor</label>
                                <select class="form-control">
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
                                <label><i class="fas fa-calendar-day icon-style"></i> Admit Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-day icon-style"></i> Discharge Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label><i class="fas fa-key icon-style"></i> Reason for Discharge</label>
                            <div class="form-control">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discharge_reason"
                                                id="patient_deceased" value="Patient Deceased">
                                            <label class="form-check-label" for="patient_deceased">Patient
                                                Deceased</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discharge_reason"
                                                id="treatment_complete" value="Patient Treated">
                                            <label class="form-check-label" for="treatment_complete">Treatment
                                            Complete</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discharge_reason"
                                                id="patient_transferred" value="Patient Transferred">
                                            <label class="form-check-label" for="patient_transferred">Patient
                                                Transferred</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discharge_reason"
                                                id="other" value="Treatment Complete">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">
                            Create Discharge Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar'); // Assuming the sidebar has this class

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar'); // This toggles the class on the sidebar
            }
        });
    });
</script>

@endsection