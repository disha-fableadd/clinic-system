@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:center; !important">Edit Role</h4>
            </div>
            <div class="col-sm-8 col-9 text-center m-b-2 ">
                <a href="{{ route('role.index') }}" class="btn btn-primary  btn-rounded" style="margin-left: 430px;">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Role</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form action="{{ route('role.update', $role->id) }}" method="POST" class="form-container">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-tag  icon-style"></i> Role Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $role->name }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label> <i class="fas fa-info-circle  icon-style"></i> Description</label>
                                <textarea cols="30" rows="4" class="form-control" style="border-radius:10px !important"
                                    name="description">{{ $role->description }}</textarea>
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
                                                    id="add_user" value="add_user" {{ in_array('add_user', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_user">Add User</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_user" value="show_user" {{ in_array('show_user', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_user">Show User</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_medicine" value="add_medicine" {{ in_array('add_medicine', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_medicine">Add Medicine</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_medicine" value="show_medicine" {{ in_array('show_medicine', $role->permissions) ? 'checked' : '' }}>
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
                                                    id="add_patients" value="add_patients" {{ in_array('add_patients', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_patients">Add Patients</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_patients" value="show_patients" {{ in_array('show_patients', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_patients">Show
                                                    Patients</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_appointment" value="add_appointment" {{ in_array('add_appointment', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_appointment">Add
                                                    Appointment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_appointment" value="show_appointment" {{ in_array('show_appointment', $role->permissions) ? 'checked' : '' }}>
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
                                                    id="add_treatment" value="add_treatment" {{ in_array('add_treatment', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_treatment">Add
                                                    Treatment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_treatment" value="show_treatment" {{ in_array('show_treatment', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_treatment">Show
                                                    Treatment</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="add_department" value="add_department" {{ in_array('add_department', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_department">Add
                                                    Department</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_department" value="show_department" {{ in_array('show_department', $role->permissions) ? 'checked' : '' }}>
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
                                                    id="add_discharge" value="add_discharge" {{ in_array('add_discharge', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="add_discharge">Add
                                                    Discharge</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_discharge" value="show_discharge" {{ in_array('show_discharge', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_discharge">Show
                                                    Discharge</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="show_chart" value="show_chart" {{ in_array('show_chart', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_chart">Show Chart</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="all" value="all" {{ in_array('show_discharge', $role->permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="all" >All</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Update Role</button>
                    </div>
            </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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

    document.addEventListener('DOMContentLoaded', function () {
        const allCheckbox = document.getElementById('all');
        const permissionCheckboxes = document.querySelectorAll('input[name="permissions[]"]:not(#all)');

        allCheckbox.addEventListener('change', function () {
            permissionCheckboxes.forEach((checkbox) => {
                checkbox.checked = allCheckbox.checked;
            });
        });

        permissionCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function () {
                if (!checkbox.checked) {
                    allCheckbox.checked = false;
                } else {
                    const allChecked = Array.from(permissionCheckboxes).every(cb => cb.checked);
                    allCheckbox.checked = allChecked;
                }
            });
        });
    });
</script>


@endsection