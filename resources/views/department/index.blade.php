@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left; !important">All Department</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2 ">
                <a href="{{ route('department.create') }}" class="btn btn-primary  btn-rounded"><i class="fa fa-plus"></i>
                    Add Department</a>
            </div>
        </div>
        <div class="row filter-row mt-2 mb-2">

            <div class="col-sm-6 col-md-3">
                <div class="form-group">

                    <input class="form-control" type="text" placeholder="Search Department..">

                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-primary  btn-rounded"> Search </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table  custom-table">
                        <thead style="background-color:#ff8e29;" class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Status</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>

                                <td>1</td>
                                <td>Dentists</td>
                                <td><span class="custom-badge status-green">Active</span></td>
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
                                        <i class="fa fa-trash-o m-r-5 icon2"></i>

                                    </div>

                                </td>
                            </tr>
                            <tr>

                            <td>2</td>
                                        <td>Neurology</td>
										<td><span class="custom-badge status-red">Inactive</span></td>
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
                                        <i class="fa fa-trash-o m-r-5 icon2"></i>

                                    </div>

                                </td>
                            </tr>
                            <tr>

                            <td>3</td>
                                        <td>Opthalmology</td>
										<td><span class="custom-badge status-green">Active</span></td>
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
                                        <i class="fa fa-trash-o m-r-5 icon2"></i>

                                    </div>

                                </td>
                            </tr>
                            <tr>

                            <td>4</td>
                                        <td>Orthopedics</td>
										<td><span class="custom-badge status-red">Inactive</span></td>
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
                                        <i class="fa fa-trash-o m-r-5 icon2"></i>

                                    </div>

                                </td>
                            </tr>
                            <tr>

                            <td>5</td>
                                        <td>Cancer Department</td>
										<td><span class="custom-badge status-green">Active</span></td>
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
                                        <i class="fa fa-trash-o m-r-5 icon2"></i>

                                    </div>

                                </td>
                            </tr>
                            <tr>

                            <td>6</td>
                                        <td>ENT Department</td>
										<td><span class="custom-badge status-green">Active</span></td>
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
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
</script>
@endsection