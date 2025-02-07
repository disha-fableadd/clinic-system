<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.ico')}}"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/cliniclogohalf.png')}}">
    <title>clinic system</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">






    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add jQuery and Bootstrap Datepicker -->
    <!-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
 -->

    <!-- jQuery Library -->

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css"
        rel="stylesheet"> -->

    <!-- Include jQuery and Timepicker JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
    <script src=" https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">




    <style>
        .fc-toolbar.fc-header-toolbar {
            margin-bottom: 0 !important;
        }




        table.dataTable thead>tr>th.dt-ordering-asc span.dt-column-order:before,
        table.dataTable thead>tr>th.dt-ordering-desc span.dt-column-order:after,
        table.dataTable thead>tr>td.dt-ordering-asc span.dt-column-order:before,
        table.dataTable thead>tr>td.dt-ordering-desc span.dt-column-order:after {
            opacity: 6 !important;
        }

        table.dataTable th.dt-type-numeric,
        table.dataTable th.dt-type-date,
        table.dataTable td.dt-type-numeric,
        table.dataTable td.dt-type-date {
            text-align: left !important;
        }



        .chart-container {
            width: 512px;
            height: 430px;
            /* Adjust as needed */
        }

        .icon-style {
            background-color: white;

            color: rgb(157 195 179);
            padding: 10px;
            border-radius: 50%;

        }

        .icon-style1 {
            background-color: white;
            font-size: 25px;
            color: rgb(157 195 179);
            padding: 10px;
            border-radius: 50%;

        }


        .form-container {
            width: 100%;

            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        .offset-lg-2 {
            margin: auto;
            width: 80%;
        }

        .icon {
            font-size: 15px;

        }

        .icon .icon1 {
            padding: 8px;
            background-color: #f89884;
            color: white;
            border-radius: 10px;

        }

        .icon .icon2 {
            padding: 8px;
            background-color: #f89884;
            color: white;
            border-radius: 10px;
        }

        .icon .icon3 {
            padding: 8px;
            background-color: #f89884;
            color: white;
            border-radius: 10px;
        }

        .icon .icon4 {
            padding: 8px;
            background-color: #f89884;
            color: white;
            border-radius: 10px;
        }

        .table thead tr {
            background-color: #f89884;
            color: white;
            text-align: center;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
        }

        .table thead th {
            text-align: center;
            border-right: 1px solid #ffffff75;
        }

        .page-title {
            color: #565656;
            font-size: 25px;
            font-weight: normal;
            margin-bottom: 10px;
            text-align: left;
            padding-left: 12px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('layout.header')
        @include('layout.sidebar')

        @yield('content')
        @yield('scripts')
        @php
            $permissions = \App\Models\UserPermission::where('user_id', auth()->id())
                ->with('module')
                ->get()
                ->mapWithKeys(function ($permission) {
                    return [
                        $permission->module->name => [
                            'view' => $permission->view,
                            'create' => $permission->create,
                            'update' => $permission->update,
                            'delete' => $permission->delete,
                        ],
                    ];
                });
        @endphp

        <script>
            localStorage.setItem('permissions', {!! json_encode($permissions) !!});
            new DataTable('#example');
            // function eventFired(type) {
            //     let n = document.querySelector('#demo_info');

            //     n.scrollTop = n.scrollHeight;
            // }

            // new DataTable('#example')
            //     .on('order.dt', () => eventFired('Order'))
            //     .on('search.dt', () => eventFired('Search'))
            //     .on('page.dt', () => eventFired('Page'));
        </script>
        @include('layout.footer')
      