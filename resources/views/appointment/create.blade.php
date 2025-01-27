@extends('layout.app')


@section('content')  


<div class="page-wrapper">
    <div class="content" style="height:100vh; !important">
        <div class="row">
           
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center; margin-right: 48px ;!important">Add Appointment</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2 ">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary  btn-rounded" style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3"></i>
                    All Appointment</a>
            </div>
        </div>
        <div class="row">
            <div class=" offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group">
                                <label>Patient Name</label>
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
                                <label>Department</label>
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
                                <label>Doctor</label>
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
                                <label>Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Time</label>
                                <div class="time-icon">
                                    <input type="text" class="form-control" id="datetimepicker3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Patient Email</label>
                                <input class="form-control" type="email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Patient Phone Number</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                   
                   
                    
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Create Appointment</button>
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