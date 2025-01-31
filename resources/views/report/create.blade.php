@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title text-center" style="padding-left: 90px;">Add Medical Report</h4>
            </div>
            <div class="col-6 text-center m-b-2" style="padding-right: 55px;">
                <a href="{{ route('report.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Medical report
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:60%; padding-bottom: 30px;">
                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user icon-style"></i>Patient Name</label>
                                    <select class="form-control" name="item_name">
                                        <option>Select</option>
                                        <option>Item 1</option>
                                        <option>Item 2</option>
                                        <option>Item 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fa fa-user-md icon-style" ></i> Doctor Name</label>
                                    <select class="form-control" name="category">
                                        <option>Select</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-cogs icon-style"></i> Service Name</label>
                                    <select class="form-control" name="supplier_name">
                                        <option>Select</option>
                                        <option>Supplier 1</option>
                                        <option>Supplier 2</option>
                                        <option>Supplier 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fa fa-calendar-check-o icon-style"></i> Treatment Name</label>
                                    <select class="form-control" name="supplier_name">
                                        <option>Select</option>
                                        <option>Supplier 1</option>
                                        <option>Supplier 2</option>
                                        <option>Supplier 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-align-left icon-style"></i> Description</label>
                                    <textarea class="form-control" rows="3" name="description"
                                        style="border-radius:10px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-file-upload icon-style"></i> File Path</label>
                                    <input type="file" class="form-control" name="file_path">
                                </div>
                            </div>
                        </div>




                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn"> Create Report</button>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.timepicker').timepicker({
            showMeridian: true,
            defaultTime: '12:00 PM',

        });
    });


    // function nextStep() {
    //     document.getElementById('step-1').style.display = 'none';
    //     document.getElementById('step-2').style.display = 'block';
    // }

    // function prevStep() {
    //     document.getElementById('step-2').style.display = 'none';
    //     document.getElementById('step-1').style.display = 'block';
    // }

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