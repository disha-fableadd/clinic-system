@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content" style="height:100vh;">
        <div class="row">
            <!-- <div class="col-lg-12">
                <h4 class="page-title">Add Department</h4>
            </div> -->
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center;padding-left: 170px;">Add Service</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2">
                <a href="{{ route('service.index') }}" class="btn btn-primary btn-rounded"
                    style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Services
                </a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container" style="width:60% ;padding-bottom: 60px;">

                    <div class="form-group">
                        <label><i class="fas fa-cogs icon-style"></i> Service Name</label>
                        <input class="form-control" type="text" name="service_name" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-align-left icon-style"></i> Description</label>
                        <textarea cols="30" rows="4" class="form-control" name="description"
                            style="border-radius:10px !important" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><i class="fas fa-list icon-style"></i> Type</label>
                                <select class="form-control" name="type" required>
                                    <option>Select</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Diagnostics">Diagnostics</option>
                                    <option value="Surgery">Surgery</option>
                                    <option value="Treatment">Treatment</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><i class="fas fa-dollar-sign icon-style"></i> Price</label>
                                <input class="form-control" type="number" name="price" min="0" step="0.01" required>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="display-block"><i class="fas fa-check-circle icon-style"></i> Status</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="active" value="Active"
                                    checked>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactive"
                                    value="Inactive">
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Create Service</button>
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