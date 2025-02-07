@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-8 col-8">
                <h4 class="page-title" style="text-align:left; !important">All Supplier Details</h4>
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
                        <h3 class="card-title d-inline-block text-white"><i class="fa fa-truck px-2"
                                style="font-size:20px"></i>All Supplier </h3>
                        @if(app('hasPermission')(35, 'create'))
                            <a href="{{ route('supplier.create') }}" class="btn  btn-rounded float-right"
                                style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add Supplier
                            </a>
                        @endif
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:#ff8e29;" class="text-center">
                                    <tr>

                                        <th>Company Name</th>
                                        <th>Contact_Person Name</th>
                                        <th>phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="supplierTableBody">

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








    $(document).ready(function () {
        let token = localStorage.getItem('token');

        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }
    });



    $(document).ready(function () {
        $.ajax({
            url: '/api/suppliers',
            type: 'GET',
            dataType: 'json',
            headers: { "Authorization": "Bearer " + localStorage.getItem('token') },

            success: function (data) {
                var suppliers = data;
                var table = $('#example').DataTable();
                if ($.fn.DataTable.isDataTable("#example")) {
                    table.destroy();
                }

                var tableBody = $('#supplierTableBody'); // Update the correct table body ID
                tableBody.empty();

                suppliers.forEach(function (supplier, index) {
                    var row = '<tr>';
                    row += '<td>' + supplier.name + '</td>';
                    row += '<td>' + supplier.contact_person + '</td>';
                    row += '<td>' + supplier.phone + '</td>';
                    row += '<td>' + supplier.email + '</td>';
                    row += '<td>' + supplier.address + '</td>';
                    row += '<td>';
                    row += '<div class="icon" style="cursor:pointer">';
                    row += '@if(app("hasPermission")(35, "view"))<i class="fa fa-eye m-r-5 icon3 view-supplier" data-id="' + supplier.id + '"></i>@endif';
                    row += '@if(app("hasPermission")(35, "update"))<i class="fa fa-pencil m-r-5 icon1 edit-supplier" data-id="' + supplier.id + '"></i>@endif';
                    row += '@if(app("hasPermission")(35, "delete"))<i class="fa fa-trash-o m-r-5 icon2 delete-supplier" data-id="' + supplier.id + '"></i>@endif';
                    row += '</div>';
                    row += '</td>';
                    row += '</tr>';

                    tableBody.append(row);
                });

                $('#example').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    destroy: true
                });
            },
            error: function () {
                $('#supplierTableBody').append('<tr><td colspan="6" class="text-center">No data available</td></tr>');
            }
        });
    });


    $(document).on('click', '.view-supplier', function () {
        var supplierId = $(this).data('id');
        window.location.href = '/supplier/show/' + supplierId;
    });

    $(document).on('click', '.edit-supplier', function () {
        var supplierId = $(this).data('id');
        window.location.href = '/supplier/edit/' + supplierId;
    });

    $(document).on('click', '.delete-supplier', function () {
    var supplierId = $(this).data('id');

    if (!supplierId) {
        alert('Supplier ID is missing!');
        return;
    }

    if (confirm('Are you sure you want to delete this supplier?')) {
        $.ajax({
            url: '/api/suppliers/' + supplierId,
            type: 'DELETE',
            headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
            success: function (response) {
                // alert('Supplier deleted successfully!');
                
                // Remove row from table
                $('#supplierTableBody').find('tr').each(function () {
                    if ($(this).find('.delete-supplier').data('id') == supplierId) {
                        $(this).remove();
                    }
                });

                // Reload DataTable
                $('#example').DataTable().ajax.reload();
            },
            error: function (xhr) {
                alert('Error deleting supplier: ' + (xhr.responseJSON.message || 'Please try again.'));
            }
        });
    }
});


</script>
@endsection