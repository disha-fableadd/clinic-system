@extends('layout.app')


@section('content')  


<div class="page-wrapper">
    <div class="content" style="height:100vh; !important">
        <div class="row">
            <!-- <div class="col-lg-12">
                <h4 class="page-title">Add Department</h4>
            </div> -->
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center; margin-right: 80px ;!important">Add Department</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2 ">
                <a href="{{ route('department.index') }}" class="btn btn-primary  btn-rounded" style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3"></i>
                    All Department</a>
            </div>
        </div>
        <div class="row">
            <div class=" offset-lg-2">
                <form class="form-container">

                    <div class="form-group">
                        <label>Department Name</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea cols="30" rows="4" class="form-control" style="border-radius:10px !important"></textarea>
                    </div>


                 


                    <div class="form-group">
                        <label class="display-block">Schedule Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="doctor_active"
                                value="option1" checked>
                            <label class="form-check-label" for="doctor_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="doctor_inactive"
                                value="option2">
                            <label class="form-check-label" for="doctor_inactive">
                                Inactive
                            </label>
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

    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
</script>
@endsection