@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class=" col-6">
                <h4 class="page-title text-center" style="padding-left: 70px;">Add Medicine</h4>
            </div>
            <div class=" col-6 text-center m-b-2" style="padding-right: 60px;">
                <a href="{{ route('medicine.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5"></i> All Medicines
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:60% ;padding-bottom: 60px;">
                    @csrf

                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-boxes icon-style"></i> Category <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="Antibiotic">Antibiotic</option>
                                        <option value="Painkiller">Painkiller</option>
                                        <option value="Vitamin">Vitamin</option>
                                        <option value="Antiseptic">Antiseptic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-pills icon-style"></i> Medicine Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="medicine_name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-align-left icon-style"></i> Description</label>
                                    <textarea class="form-control" rows="3" name="description"
                                        style="border-radius:10px"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-image icon-style"></i> Upload Image</label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="{{ asset('admin/assets/img/medicine.jpg') }}">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" class="form-control" name="medicine_image">
                                        </div>
                                    </div>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-weight icon-style"></i> Unit <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="unit" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-sort-numeric-up icon-style"></i> Quantity <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="quantity" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-alt icon-style"></i> Manufacture Date <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="manufacture_date"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-times icon-style"></i> Expiry Date <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="expiry_date"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><i class="fas fa-toggle-on icon-style"></i> Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option value="Available">Available</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
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
    function nextStep() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    }

    $(document).ready(function () {
        $('.datetimepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

@endsection