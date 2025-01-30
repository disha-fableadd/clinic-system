@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title" style="text-align:center; margin-right: 120px !important">Add Medicine</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2">
                <a href="{{ route('medicine.index') }}" class="btn btn-primary btn-rounded" style="margin-left: 200px;">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Medicines</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-pills  icon-style"></i> Medicine Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="medicine_name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-boxes  icon-style"></i> Category <span class="text-danger">*</span></label>
                                <select class="form-control select" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Antibiotic">Antibiotic</option>
                                    <option value="Painkiller">Painkiller</option>
                                    <option value="Vitamin">Vitamin</option>
                                    <option value="Antiseptic">Antiseptic</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-rupee-sign  icon-style"></i> Price (₹) <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="price" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-image  icon-style"></i> Upload Image</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt="" src="{{asset('admin/assets/img/medicine.jpg')}}">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control" name="medicine_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt  icon-style"></i> Manufacture Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="manufacture_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-times  icon-style"></i> Expiry Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="expiry_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><i class="fas fa-align-left  icon-style"></i> Description</label>
                                <textarea class="form-control" rows="3" name="description" style="border-radius:10px !important"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Add Medicine</button>
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

    $(document).ready(function () {
        $('.datetimepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });


</script>


@endsection
