<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.ico')}}">
    <title>clinic system</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
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
            background-color: #ff8e29;
            color: white;
            border-radius: 10px;

        }

        .icon .icon2 {
            padding: 8px;
            background-color: #ff8e29;
            color: white;
            border-radius: 10px;
        }

        .icon .icon3 {
            padding: 8px;
            background-color: #ff8e29;
            color: white;
            border-radius: 10px;
        }

        .table thead tr {
            background-color: #ff8e29;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('layout.header')
        @include('layout.sidebar')

        @yield('content')
        @yield('scripts')

        @include('layout.footer')
