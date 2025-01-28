@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left; !important">All Discharge Details</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2 ">
                <a href="{{ route('discharge.create') }}" class="btn btn-primary  btn-rounded"><i class="fa fa-plus"></i>
                    Add Discharge</a>
            </div>
        </div>
       
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div id="demo_info" class="box"></div> 
                     <table id="example"  class="table  custom-table">
                        <thead style="background-color:#ff8e29;"  class="text-center">
                            <tr>
                                <th> ID</th>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Treatment</th>
                               
                                <th>Discharge Date</th>
                              
                               
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                            <td>1</td>
										<td> Denise Stevens</td>
									
										<td>Henry Daniels</td>
										<td>Cardiology</td>
										<td>30 Dec 2018</td>
										
										
                                <td >
                                    <div class="icon">
                                        <i class="fa fa-eye m-r-5 icon3"></i> <i class="fa fa-pencil m-r-5 icon1"></i>
                                        <i class="fa fa-trash-o m-r-5 icon2"></i>

                                    </div>

                                </td>
                            </tr>
                            <tr>
                            <td>2</td>
										<td> Denise Stevens</td>
										
										<td>Henry Daniels</td>
										<td>Cardiology</td>
										<td>30 Dec 2018</td>
									
										
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