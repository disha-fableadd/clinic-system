@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-8 col-8">
                <h4 class="page-title" style="text-align:left; !important">All Role Details</h4>
            </div>
            <!-- <div class="col-sm-4 col-4 text-right ">
            <a href="{{ route('dashboard') }}" class="btn  btn-rounded" style="background-color:#fed9cf;">
                    <i class="fa fa-arrow-left m-r-1"></i> Back to Dashboard
                </a>
            </div> -->
        </div>




        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header " style="background-color:#f89884;">
                        <h2 class="card-title d-inline-block text-white">
                            <i class="fas fa-user-tag  px-2" style="font-size:20px"></i> All Role
                        </h2>
                        <a href="{{ route('role.create') }}" class="btn btn-rounded float-right"
                            style="background-color: #fed9cf; padding: 6px 12px;">
                            <i class="fa fa-plus"></i> Add Role
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table custom-table mt-3">
                                <thead style="background-color:#ff8e29;">
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Joining Date</th>
                                        <th style="width: 145px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>1</td>
                                        <td>Dentists</td>
                                        <td>ddfdfdgfhgfghgfhdfggg</td>
                                        <td>01-12-2024</td>
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
                                        <td>Dentists</td>
                                        <td>ddfdfdgfhgfghgfhdfggg</td>
                                        <td>01-12-2024</td>
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
        const sidebar = document.querySelector('.sidebar'); // Assuming the sidebar has this class

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar'); // This toggles the class on the sidebar
            }
        });
    });


</script>

@endsection