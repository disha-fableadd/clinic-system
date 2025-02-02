@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left; !important">All Users Details</h4>
            </div>
            <!-- <div class="col-sm-8 col-9 text-right m-b-2 ">
                <a href="{{ route('user.create') }}" class="btn btn-primary  btn-rounded"><i class="fa fa-plus"></i>
                    Add User</a>
            </div> -->
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header"
                        style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"><i class="fas fa-user  px-2" style="font-size:20px"></i>All User </h3>
                        <a href="{{ route('user.create') }}" class="btn  btn-rounded float-right"
                            style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add User
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:rgb(254 217 207);">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th style="min-width: 110px;">Join Date</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-02.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Albina Simonis</h2>
                                        </td>

                                        <td>albinasimonis@example.com</td>
                                        <td>828-634-2744</td>
                                        <td>7 May 2015</td>
                                        <td>
                                            Nurse
                                        </td>
                                        <td     >
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i>
                                                <i class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img width="28" height="28" src="{{asset('admin/assets/img/user-03.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Cristina Groves</h2>
                                        </td>

                                        <td>cristinagroves@example.com</td>
                                        <td>928-344-5176</td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            Doctor
                                        </td>
                                        <td     >
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-04.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Mary Mericle</h2>
                                        </td>

                                        <td>marymericle@example.com</td>
                                        <td>603-831-4983</td>
                                        <td>27 Dec 2017</td>
                                        <td>
                                            Accountant
                                        </td>
                                        <td     >
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-05.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Haylie Feeney</h2>
                                        </td>

                                        <td>hayliefeeney@example.com</td>
                                        <td>616-774-4962</td>
                                        <td>21 Apr 2017</td>
                                        <td>
                                            Laboratorist
                                        </td>
                                        <td     >
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-06.jpg')}}"
                                                class="rounded-circle" alt=""></td>

                                        <td>

                                            <h2>Zoe Butler</h2>
                                        </td>

                                        <td>zoebutler@example.com</td>
                                        <td>444-555-9999</td>
                                        <td>19 May 2012</td>
                                        <td>
                                            Pharmacist
                                        </td>
                                        <td     >
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

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
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
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