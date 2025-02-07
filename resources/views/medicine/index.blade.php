@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-12 col-12">
                <h4 class="page-title" style="text-align:left; !important">All Medicines Details</h4>
            </div>
            <!-- <div class="col-sm-8 col-9 text-right m-b-2 ">
                <a href="{{ route('medicine.create') }}" class="btn btn-primary  btn-rounded"><i class="fa fa-plus"></i>
                    Add Medicine</a>
            </div> -->
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"> <i class="fas fa-pills px-2"
                                style="font-size:20px"></i>All Medicines </h3>
                        @if(app('hasPermission')(27, 'create'))

                            <a href="{{ route('medicine.create') }}" class="btn  btn-rounded float-right"
                                style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add Medicines
                            </a>
                        @endif
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
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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
    new DataTable('#example');
    function eventFired(type) {
        let n = document.querySelector('#demo_info');

        n.scrollTop = n.scrollHeight;
    }

    new DataTable('#example')
        .on('order.dt', () => eventFired('Order'))
        .on('search.dt', () => eventFired('Search'))
        .on('page.dt', () => eventFired('Page'));






    $(document).ready(function () {

        $.ajax({
            url: '{{ url("/api/medicines") }}',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                var table = $('#example').DataTable();
                if ($.fn.DataTable.isDataTable("#example")) {
                    table.destroy();
                }

                let tableBody = $(' tbody');
                tableBody.empty();


                data.forEach(function (medicine, index) {
                    tableBody.append(`
                        <tr>
                             <td>${index + 1}</td>
                            <td><img width="50" height="50" src="${medicine.image}" class="rounded-circle" alt=""></td>
                            <td><h2>${medicine.name}</h2></td>
                              <td>${medicine.category_name}</td>
                            <td>${medicine.description}</td>
                            <td>
                                <div class="icon" style="cursor:pointer">
                                   @if(app('hasPermission')(27, 'view'))  <i class="fa fa-eye m-r-5 icon3 view-medicine" data-id="${medicine.id}"></i>@endif
                                     @if(app('hasPermission')(27, 'update'))<i class="fa fa-pencil m-r-5 icon1 edit-medicine" data-id="${medicine.id}"></i>@endif
                                     @if(app('hasPermission')(27, 'delete'))<i class="fa fa-trash-o m-r-5 icon2 delete-medicine" data-id="${medicine.id}"></i>@endif
                                </div>
                            </td>
                        </tr>
                    `);
                });

                $('#example').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "destroy": true
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data: " + error);
            }
        });
    });

    $(document).on('click', '.view-medicine', function () {
        var medicineId = $(this).data('id');
        window.location.href = '/medicine/show/' + medicineId;
    });

    $(document).on('click', '.edit-medicine', function () {
        var medicineId = $(this).data('id');
        window.location.href = '/medicine/edit/' + medicineId;
    });

    $(document).on('click', '.delete-medicine', function () {
        var medicineId = $(this).data('id');

        if (!medicineId) {
            alert('Medicine ID not found!');
            return;
        }

        if (confirm('Are you sure you want to delete this medicine?')) {
            $.ajax({
                url: '/api/medicines/' + medicineId, // Ensure this matches your route
                type: 'DELETE',
                success: function (response) {

                    location.reload(); // Reload the page to update the list
                },
                error: function (xhr) {
                    console.log(xhr.responseText); // Log error response
                    alert('Failed to delete medicine.');
                }
            });
        }
    });


</script>
@endsection