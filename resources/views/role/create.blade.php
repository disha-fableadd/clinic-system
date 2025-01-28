@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:center; !important">Add Role</h4>
            </div>
            <div class="col-sm-8 col-9 text-center m-b-2 ">
                <a href="{{ route('role.index') }}" class="btn btn-primary  btn-rounded" style="margin-left: 430px;">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Role</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-tag  icon-style"></i> Role Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label> <i class="fas fa-info-circle  icon-style"></i> Description</label>
                                <textarea cols="30" rows="4" class="form-control"
                                    style="border-radius:10px !important"></textarea>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <label> <i class="fas fa-key  icon-style"></i> Permissions</label>
                            <div class="row m-0">
                                <div class="form-control">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_user">
                                                <label class="form-check-label" for="add_user">Add User</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_user">
                                                <label class="form-check-label" for="show_user">Show User</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_medicine">
                                                <label class="form-check-label" for="add_medicine">Add Medicine</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_medicine">
                                                <label class="form-check-label" for="show_medicine">Show
                                                    Medicine</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-control mt-3">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_patients">
                                                <label class="form-check-label" for="add_patients">Add Patients</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_patients">
                                                <label class="form-check-label" for="show_patients">Show
                                                    Patients</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_appointment">
                                                <label class="form-check-label" for="add_appointment">Add
                                                    Appointment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_appointment">
                                                <label class="form-check-label" for="show_appointment">Show
                                                    Appointment</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-control mt-3">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_treatment">
                                                <label class="form-check-label" for="add_treatment">Add
                                                    Treatment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_treatment">
                                                <label class="form-check-label" for="show_treatment">Show
                                                    Treatment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_department">
                                                <label class="form-check-label" for="add_department">Add
                                                    Department</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_department">
                                                <label class="form-check-label" for="show_department">Show
                                                    Department</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-control mt-3">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_discharge">
                                                <label class="form-check-label" for="add_discharge">Add
                                                    Discharge</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_discharge">
                                                <label class="form-check-label" for="show_discharge">Show
                                                    Discharge</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_chart">
                                                <label class="form-check-label" for="show_chart">Show Chart</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                   
                     
                 
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Create Role</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
        });
    });




</script>

@endsection