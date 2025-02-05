<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/cliniclogohalf.png')}}">
    <title>Clinic System</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f6f5;
        }

        .login-container {
            display: flex;
            width: 900px;
            height: 500px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-image {
            flex: 1;
            background: url('{{asset("admin/assets/img/dr.avif")}}') no-repeat center center/cover;
        }

        .login-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
        }

        .account-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: rgb(159 217 193);
            border-color: rgb(159 217 193);
            transition: all 0.3s;
            color: black;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: rgb(139 197 173);
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 50px;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                width: 90%;
                height: auto;
            }

            .login-image {
                height: 250px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image">

        </div>
        <div class="login-form">
            <form action="" method="POST" id="login-form">
                @csrf
                <div class="account-logo">
                    <img src="{{asset('admin/assets/img/cliniclogo.png')}}" width="50" height="50" alt="Clinic Logo">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
</body>

<script>
    $(document).ready(function () {
        // Check if the user is already logged in
        if (localStorage.getItem('token')) {
            window.location.href = "{{ route('dashboard') }}";  // Redirect to dashboard if logged in
        }

        // Login form submission
        $(document).ready(function () {
            $('#login-form').on('submit', function (e) {
                e.preventDefault();

                var email = $('#email').val().trim();
                var password = $('#password').val().trim();

                $.ajax({
                    url: "http://127.0.0.1:8000/api/login", // Explicit API URL
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        email: email,
                        password: password
                    }),
                    success: function (response) {
                        console.log(response);
                        localStorage.setItem('token', response.access_token);
                        window.location.href = "{{ route('dashboard') }}";
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // Debug response
                        alert(xhr.responseJSON?.message || "Login failed");
                    }
                });
            });
        });

    });




</script>

</html>