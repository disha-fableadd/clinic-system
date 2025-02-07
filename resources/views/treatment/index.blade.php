@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-12 col-12">
                <h4 class="page-title" style="text-align:left; !important">All Treatment Details</h4>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:#f89884;">
                        <h3 class="card-title d-inline-block text-white"><i class="fa fa-calendar-check-o px-2"
                                style="font-size:20px"></i> All Treatment </h3>
                        @if(app('hasPermission')(30, 'create'))
                            <a href="{{ route('treatment.create') }}" class="btn  btn-rounded float-right"
                                style="background-color: #fed9cf;"><i class="fa fa-plus"></i> Add Treatment
                            </a>
                        @endif
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div id="demo_info" class="box"></div>
                            <table id="example" class="table  custom-table">
                                <thead style="background-color:#ff8e29;" class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Treatment Name</th>
                                        <th>Doctor Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="treatmentTableBody">
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
    $(document).ready(function () {
        let token = localStorage.getItem('token');
        if (!token) {
            window.location.href = "{{ route('login') }}";
        }

        $.ajax({
            url: '/api/treatments', // Adjust API endpoint for treatments
            type: 'GET',
            dataType: 'json',
            headers: { "Authorization": "Bearer " + token },
            success: function (data) {
                console.log(data);
                var treatments = data;
                var table = $('#example').DataTable();
                if ($.fn.DataTable.isDataTable("#example")) {
                    table.destroy();
                }
                var tableBody = $('#treatmentTableBody');
                tableBody.empty();
                treatments.forEach(function (treatment, index) {
                    var row = '<tr>';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + treatment.name + '</td>';
                    row += '<td>' + treatment.doctor_name + '</td>';
                    row += '<td>' + treatment.description + '</td>';
                    row += '<td>';
                    row += '<div class="icon" style="cursor:pointer">';
                    row += '   @if(app('hasPermission')(31, 'view'))<i class="fa fa-eye m-r-5 icon3 view-treatment" data-id="' + treatment.id + '"></i>@endif';
                    row += '   @if(app('hasPermission')(31, 'update'))<i class="fa fa-pencil m-r-5 icon1 edit-treatment" data-id="' + treatment.id + '"></i>@endif';
                    row += '   @if(app('hasPermission')(31, 'delete'))<i class="fa fa-trash-o m-r-5 icon2 delete-treatment" data-id="' + treatment.id + '"></i>@endif';
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
                $('#treatmentTableBody').append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
            }
        });
    });
</script>
@endsection
