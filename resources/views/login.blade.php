<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">

    <style>
        .account-box {
            background-color: #fff;
            /* padding: 30px; */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-center {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: rgb(255, 244, 234);
        }

        .account-logo img {
            margin-right: 10px;
        }

        .btn-primary.account-btn {
            background-color: #ff8e29;
            border-color: #ff8e29;
            transition: all 0.3s;
        }

        .btn-primary.account-btn:hover {
            background-color: #ff5e57;
            border-color: #ff5e57;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="http://dreamguys.co.in/preclinic/template/index.html" class="form-signin">
                        <div class="account-logo">
                            <a href="" class="logo">
                                <img src="{{asset('admin/assets/img/logo-dark.png')}}" width="35" height="35" alt=""> <span style="color:#ff8e29">Preclinic</span>
                            </a>
                        </div>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
</body>

</html>
