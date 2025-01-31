@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title text-center" style="padding-left: 130px;">Add Inventory</h4>
            </div>
            <div class="col-6 text-center m-b-2" style="padding-right: 75px;">
                <a href="{{ route('inventory.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Inventory
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
                                    <label><i class="fas fa-cogs icon-style"></i> Item Name</label>
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
                                    <label><i class="fas fa-box icon-style"></i> Category</label>
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-truck icon-style"></i> Supplier Name</label>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-alt icon-style"></i> Purchase Date</label>
                                    <input type="date" class="form-control" name="purchase_date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-times icon-style"></i> Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-toggle-on icon-style"></i> Status</label>
                                    <select class="form-control" name="status">
                                        <option>Select</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                        <option>Expired</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Create Inventory</button>
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