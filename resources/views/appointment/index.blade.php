@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-8 col-8">
                <h4 class="page-title" style="text-align:left; !important">All Appointments Details</h4>
            </div>
            <!-- <div class="col-sm-4 col-4 text-right  ">
               <a href="{{ route('dashboard') }}" class="btn  btn-rounded" style="background-color:#fed9cf;">
                    <i class="fa fa-arrow-left m-r-1"></i> Back to Dashboard
                </a>
            </div> -->
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"><i class="fa fa-calendar px-2"
                                style="font-size:20px"></i>All Appointment </h3>
                        @if(app('hasPermission')(29, 'create'))
                            <a href="{{ route('appointment.create') }}" class="btn  btn-rounded float-right"
                                style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add Appointment
                            </a>
                        @endif
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:#ff8e29;" class="text-center">
                                    <tr>
                                        <th>Image</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Treatment</th>
                                        <th>Appointment Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img width="28" height="28" src="{{asset('admin/assets/img/user-03.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td> Denise Stevens</td>
                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>

                                        <td><span class="custom-badge btn btn-primary  btn-rounded">Active</span></td>
                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i>
                                                <i class="fa fa-trash-o m-r-5 icon2"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-02.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td> Denise Stevens</td>
                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>
                                        <td><span class="custom-badge btn btn-danger  btn-rounded">InActive</span></td>
                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i>
                                                <i class="fa fa-trash-o m-r-5 icon2"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar');
            }
        });
    });
    new DataTable('#example');
    function eventFired(type) {
        let n = document.querySelector('#demo_info');

        n.scrollTop = n.scrollHeight;
    }

    new DataTable('#example')
        .on('order.dt', () => eventFired('Order'))
        .on('search.dt', () => eventFired('Search'))
        .on('page.dt', () => eventFired('Page'));

</script>
@endsection