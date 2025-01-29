<style>
    .menu-link.active{
        color: black;
        background-color: #cfece0;
        border-radius: 15px;
        margin: 0 10px;
    }
    .submenu.active>a {
        color: black;
        background-color: #cfece0;
        border-radius: 15px;
        margin: 0 10px;
    }

    .menu-link1.active {
        background-color: #cfece0;
        color: black;
        border-radius: 15px;
        /* margin: 0 10px ; */

    }

    .submenu ul {
        /* padding-left: 20px; */
        color: black;
    }

    .submenu.active>a .menu-arrow {
        transform: rotate(90deg);
        transition: transform 0.3s ease;
    }
   

</style>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"> <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu {{ request()->routeIs('role.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-user"></i> <span>Role</span><span class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('role.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('role.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('role.create') }}"><i class="fa fa-plus-circle icons"></i> Add Role</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('role.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('role.index') }}"><i class="fa fa-list icons"></i> All Role</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu {{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-user-md"></i><span>User</span><span class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('user.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('user.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('user.create') }}"><i class="fa fa-user-plus icons"></i> Add User</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('user.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('user.index') }}"><i class="fa fa-users icons "></i> All Users</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu {{ request()->routeIs('medicine.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-pills"></i> <span>Medicines</span><span class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('medicine.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('medicine.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('medicine.create') }}"><i class="fa fa-capsules icons"></i> Add Medicines</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('medicine.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('medicine.index') }}"><i class="fa fa-pills icons"></i> All Medicines</a>
                        </li>

                    </ul>
                </li>

                <li class="submenu {{ request()->routeIs('patients.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-wheelchair"></i> <span>Patients</span><span
                            class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('patients.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('patients.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('patients.create') }}"><i class="fa fa-user-injured icons"></i> Add Patients</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('patients.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('patients.index') }}"><i class="fa fa-procedures icons"></i> All Patients</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu {{ request()->routeIs('appointment.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-calendar"></i>
                        <span>Appointments</span><span class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('appointment.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('appointment.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('appointment.create') }}"><i class="fa fa-calendar-plus icons"></i> Add
                                Appointment</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('appointment.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('appointment.index') }}"><i class="fa fa-calendar-check icons"></i> All
                                Appointments</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('treatment.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Treatments</span><span
                            class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('treatment.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('treatment.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('treatment.create') }}"><i class="fa fa-notes-medical icons"></i> Add
                                Treatment</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('treatment.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('treatment.index') }}"><i class="fa fa-stethoscope icons"></i> All
                                Treatments</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu {{ request()->routeIs('department.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-hospital-o"></i>
                        <span>Departments</span><span class="menu-arrow"></span></a>
                    <ul style="{{ request()->routeIs('department.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('department.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('department.create') }}"><i class="fa fa-building icons"></i> Add Department</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('department.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('department.index') }}"><i class="fa fa-hospital icons"></i> All Departments</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-link {{ request()->routeIs('calender.index') ? 'active' : '' }}">
                    <a href="{{ route('calender.index') }}"><i class="fa fa-calendar"></i><span>Calendar</span></a>
                </li>

                <li class="submenu {{ request()->routeIs('discharge.*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-procedures"></i>
                        <span>Discharge</span><span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->routeIs('discharge.*') ? 'display: block;' : 'display: none;' }}">
                        <li class="menu-link1 {{ request()->routeIs('discharge.create') ? 'active' : '' }} mt-1">
                            <a href="{{ route('discharge.create') }}"><i class="fa fa-file-medical icons"></i> Add Discharge
                                Details</a>
                        </li>
                        <li class="menu-link1 {{ request()->routeIs('discharge.index') ? 'active' : '' }} mt-1">
                            <a href="{{ route('discharge.index') }}"><i class="fa fa-clipboard-list icons"></i> All
                                Discharges</a>
                        </li>
                    </ul>
                </li>


                <li class="menu-link {{ request()->routeIs('chart') ? 'active' : '' }}">
                    <a href="{{ route('chart') }}"> <i class="fas fa-chart-line"></i> <span>Chart</span></a>
                </li>

                <li class="menu-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a>
                </li>

                <li class="menu-link ">
                    <a href="#"> <i class="fa fa-sign-out-alt"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>