<style>
    .header .custom-btn {
        background-color: #cfece0;
        color: #2e2e2e;
        margin-top: 0px;
        border: none;
        padding: 8px 18px;
        border-radius: 11px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
    }

    .header .custom-btn1 {
        background-color: #cfece0;
        color: #2e2e2e;
        margin: 0px 6px;
        border: none;
        padding: 8px 14px;
        border-radius: 50px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
    }

    .header .search {
        width: 100%;
        position: relative;
        display: flex;
    }

    .header .searchTerm {
        width: 100%;
        border: none;
        border-right: none;
        padding: 10px;
        height: 42px;
        border-radius: 30px 0px 0px 30px;
        outline: none;
        color: rgba(136, 136, 136, 0.78);
        background: #f8f6f5;
    }

    .header .searchTerm:focus {
        color: #888888;
    }

    .header .searchButton {
        width: 75px;
        height: 42px;
        border: none;
        background: #f8f6f5;
        text-align: center;
        color: #888888;
        border-radius: 0 30px 30px 0;
        cursor: pointer;
        font-size: 20px;
    }

    .header .wrap {
        width: 30%;
        position: absolute;
        top: 50%;
        left: 34%;
        transform: translate(-50%, -50%);
    }

    .header #toggle_btn {
        color: #888;
    }

    .regular-logo {
        display: block;
    }

    .mini-logo {
        display: none;
    }

  .mini-sidebar .regular-logo {
        display: none;
    }

   .mini-sidebar .mini-logo {
        display: block;
    }
</style>
<div class="header">
    <div class="header-left d-flex align-items-center h-100">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{asset('admin/assets/img/cliniclogo.png')}}" class="regular-logo" alt="" style="height:auto;width:60%;">
            </a>
            <a href="{{ route('dashboard') }}" class="logo1">
            <img src="{{asset('admin/assets/img/cliniclogohalf.png')}}" alt="Mini Logo" class="mini-logo"
                style="height:auto;width:70%;">
            <!-- <span>Preclinic</span> -->
        </a>
    </div>
    <a id="toggle_btn" class="h-100 d-flex align-items-center" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>

    <div class="wrap">
        <div class="search">
            <input type="text" class="searchTerm" placeholder="What are you looking for?">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <ul class="nav user-menu float-right d-flex align-items-center h-100">

        <li class="nav-item dropdown has-arrow" >
            <a href="{{ route('appointment.create') }}" style="padding-right:0">
            <button class="btn custom-btn"><i class="fa-solid fa-plus"></i> Create Appointment</button>
            </a>
        </li>
        <li class="nav-item dropdown has-arrow">
            <button class="btn custom-btn1 mx-2">
                <i class="fa-regular fa-bell"></i> <!-- Notification icon -->
            </button>
        </li>
        <!-- <li class="nav-item dropdown has-arrow">
            <a href="{{ route('profile') }}" class=" nav-link user-link">
                <span class="user-img">
                    <img class="rounded-circle mx-1" src="{{asset('admin/assets/img/user.jpg')}}" width="24"
                        alt="Admin">
                    <span class="status online"></span>
                </span>
                <span>Admin</span>
            </a>

        </li> -->

        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle mr-1" src="{{asset('admin/assets/img/user.jpg')}}" width="24"
                        alt="Admin">
                    <span class="status online"></span>
                </span>
                <span>Admin</span>
            </a>
            <div class="dropdown-menu"
                style="position: absolute;will-change: transform;top: 8px;box-shadow: -1px 0px 4px 0px rgba(0, 0, 0, 0.15);left: -10px;transform: translate3d(0px, 50px, 0px);border: none;">
                <a class="dropdown-item" href="{{ route('profile') }}" style="font-size: 16px;"><i
                        class="fa fa-user"></i> My Profile</a>

                <!-- <a class="dropdown-item" href="settings.html" style="font-size: 16px;"><i class="fa-solid fa-file"></i>
                    User Log</a> -->
                <a class="dropdown-item" href="login.html" style="font-size: 16px;"><i class="fa fa-sign-out-alt"></i>
                    Logout</a>
            </div>
        </li>
    </ul>

</div>
