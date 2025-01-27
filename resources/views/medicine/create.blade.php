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
                    <i class="fa fa-eye m-r-5 icon3"></i>
                    All Medicines</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form class="form-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Medicine Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="medicine_name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
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
                                <label>Price (₹) <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="price" required>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Upload Image</label>
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
                                <label>Manufacture Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="manufacture_date"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Expiry Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="expiry_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"
                                    style="border-radius:10px !important"></textarea>
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
</script>
@endsection