@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-8 col-8">
                <h4 class="page-title" style="text-align:left; !important">All Services Details</h4>
            </div>
            <!-- <div class="col-sm-4 col-4 text-right  ">
            <a href="{{ route('dashboard') }}" class="btn  btn-rounded" style="background-color:#fed9cf;">
                    <i class="fa fa-arrow-left m-r-1"></i> Back to Dashboard
                </a>
            </div> -->
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header"
                        style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"><i class="fa fa-hospital-o px-2" style="font-size:20px"></i>All Services </h3>
                        <a href="{{ route('service.create') }}" class="btn  btn-rounded float-right"
                            style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add Services
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:#ff8e29;" class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Services Name</th>
                                        <th>Contact_no</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>

                                        <td>1</td>
                                        <td>Dentists</td>
                                        <td>1236987452</td>
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

                                        <td>2</td>
                                        <td>Neurology</td>
                                        <td>1236987452</td>
                                        <td><span class="custom-badge btn btn-danger btn-rounded">Inactive</span></td>
                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i>
                                                <i class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>3</td>
                                        <td>Opthalmology</td>
                                        <td>1236987452</td>
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

                                        <td>4</td>
                                        <td>Orthopedics</td>
                                        <td>1236987452</td>
                                        <td><span class="custom-badge btn btn-danger btn-rounded">Inactive</span></td>
                                        <td>
                                            <div class="icon">
                                                <i class="fa fa-eye m-r-5 icon3"></i> <i
                                                    class="fa fa-pencil m-r-5 icon1"></i>
                                                <i class="fa fa-trash-o m-r-5 icon2"></i>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>5</td>
                                        <td>Cancer Department</td>
                                        <td>1236987452</td>
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

                                        <td>6</td>
                                        <td>ENT Department</td>
                                        <td>1236987452</td>
                                        <td><span class="custom-badge btn btn-primary  btn-rounded">Active</span></td>
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