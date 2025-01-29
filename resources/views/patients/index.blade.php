@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-12 col-12">
                <h4 class="page-title" style="text-align:left; !important">All Patients Details</h4>
            </div>
            <!-- <div class="col-sm-8 col-9 text-right m-b-2 ">
                <a href="{{ route('patients.create') }}" class="btn btn-primary  btn-rounded"><i class="fa fa-plus"></i>
                    Add Patients</a>
            </div> -->
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header"
                        style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"> <i class="fa fa-wheelchair px-2" style="font-size:20px"></i>All Patients </h3>
                        <a href="{{ route('patients.create') }}" class="btn  btn-rounded float-right"
                            style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add Patients
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:#ff8e29;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>age</th>
                                        <th>Email</th>
                                        <th>Treatment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>1</td>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-02.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Albina Simonis</h2>
                                        </td>
                                        <td>25</td>

                                        <td>albinasimonis@example.com</td>
                                        <td>fddfg</td>

                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><img width="28" height="28" src="{{asset('admin/assets/img/user-03.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Cristina Groves</h2>
                                        </td>
                                        <td>25</td>
                                        <td>cristinagroves@example.com</td>
                                        <td>fdgsrtgh</td>

                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-04.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Mary Mericle</h2>
                                        </td>
                                        <td>25</td>
                                        <td>marymericle@example.com</td>
                                        <td>gfhfgh</td>

                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-05.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Haylie Feeney</h2>
                                        </td>
                                        <td>25</td>
                                        <td>hayliefeeney@example.com</td>
                                        <td>yhgjhhk</td>

                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i> <i
                                                    class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-06
                                        
                                        
                                        .jpg')}}"
                                                class="rounded-circle" alt=""></td>

                                        <td>

                                            <h2>Zoe Butler</h2>
                                        </td>
                                        <td>25</td>
                                        <td>zoebutler@example.com</td>
                                        <td>tghgfhg</td>

                                        <td>
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
<div id="delete_employee" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{asset('admin/assets/img/sent.png')}}" alt="" width="50" height="46">
                <h3>Are you sure want to delete this User?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
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