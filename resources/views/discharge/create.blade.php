@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6 ">
                <h4 class="page-title" style="text-align:center;padding-left: 180px;">Add Discharge Details</h4>
            </div>
            @if(app('hasPermission')(33, 'view'))
            <div class="col-6 text-center m-b-2" style="padding-right: 100px;">
                <a href="{{ route('discharge.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Discharge Details
                </a>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container" id="multiStepForm" method="POST" action=""
                    style="width:60% ;padding-bottom: 60px;">

                    <!-- Step 1 -->
                    <div class="form-step" id="step-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user-injured icon-style"></i> Patient Name</label>
                                    <select class="form-control" name="patient_name">
                                        <option>Select</option>
                                        <option>Jennifer Robinson</option>
                                        <option>Terry Baker</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-stethoscope icon-style"></i> Treatment</label>
                                    <select class="form-control" name="treatment">
                                        <option>Select</option>
                                        <option>Dentists</option>
                                        <option>Neurology</option>
                                        <option>Opthalmology</option>
                                        <option>Orthopedics</option>
                                        <option>Cancer Department</option>
                                        <option>ENT Department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-user-md icon-style"></i> Doctor</label>
                                    <select class="form-control" name="doctor_name">
                                        <option>Select</option>
                                        <option>Cristina Groves</option>
                                        <option>Marie Wells</option>
                                        <option>Henry Daniels</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-day icon-style"></i> Admit Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="admit_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-day icon-style"></i> Discharge Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="discharge_date">
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-hotel icon-style"></i> Room Number</label>
                                    <input type="text" class="form-control" name="room_number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-bed icon-style"></i> Bed Number</label>
                                    <input type="text" class="form-control" name="bed_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-money-bill-wave icon-style"></i> Total Bill</label>
                                    <input type="text" class="form-control" name="total_bill">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-credit-card icon-style"></i> Amount Paid</label>
                                    <input type="text" class="form-control" name="amount_paid">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-check-circle icon-style"></i> Payment Status</label>
                                    <select class="form-control" name="payment_status">
                                        <option>Select</option>
                                        <option>Paid</option>
                                        <option>Pending</option>
                                        <option>Partial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><i class="fas fa-shield-alt icon-style"></i> Insurance Coverage</label>
                                    <select class="form-control" name="insurance_coverage">
                                        <option>Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note icon-style"></i> Discharge Note</label>
                                    <textarea class="form-control" name="discharge_note"
                                        style="border-radius:10px"></textarea>
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
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar'); // Assuming the sidebar has this class

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar'); // This toggles the class on the sidebar
            }
        });
    });
    function nextStep() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    }
</script>

@endsection