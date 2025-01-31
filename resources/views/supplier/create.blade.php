@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title text-center" style="padding-left: 75px;">Add Supplier</h4>
            </div>
            <div class="col-6 text-center m-b-2" style="padding-right: 55px;">
                <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Supplier
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
                                    <label><i class="fa fa-hospital-o icon-style"></i> Company Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user icon-style"></i> Contact_Person</label>
                                    <input type="text" class="form-control" name="Contact_Person">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-phone icon-style"></i> Phone</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope icon-style"></i> Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            </div>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label><i class="fas fa-map-marker-alt icon-style"></i> Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>

                     

                        <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Create Supplier Details</button>
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