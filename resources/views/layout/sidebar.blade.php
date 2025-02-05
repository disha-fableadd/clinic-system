<style>
    .menu-link.active {
        color: black;
        background-color: #cfece0;
        border-radius: 15px;
        margin: 0 10px;
        padding: 0 1px;
    }

    .submenu.active>a {
        color: black;
        background-color: #cfece0;
        border-radius: 15px;
        margin: 0 10px;
        padding: 12px 15px !important;
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
        <div id="sidebar-menu" class="sidebar-menu mt-3">
            <ul>
               
                    <!-- <li class="menu-title">Main</li> -->

                    <li class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"> <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="submenu {{ request()->routeIs('role.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-user"></i> <span>Role</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('role.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('role.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('role.index') }}"><i class="fa fa-list icons"></i><span> All
                                        Role</span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('role.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('role.create') }}"><i class="fa fa-plus-circle icons"></i><span> Add Role
                                    </span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('user.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-user-md"></i><span>User</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('user.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('user.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('user.index') }}"><i class="fa fa-users icons "></i><span> All Users
                                    </span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('user.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('user.create') }}"><i class="fa fa-user-plus icons"></i><span> Add User
                                    </span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('medicine.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-pills"></i> <span>Medicines</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('medicine.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('medicine.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('medicine.index') }}"><i class="fa fa-pills icons"></i><span>All
                                        Medicines</span> </a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('medicine.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('medicine.create') }}"><i class="fa fa-capsules icons"></i><span> Add
                                        Medicines</span></a>
                            </li>


                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('patients.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-wheelchair"></i> <span>Patients</span><span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('patients.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('patients.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('patients.index') }}"><i class="fa fa-procedures icons"></i><span> All
                                        Patients</span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('patients.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('patients.create') }}"><i class="fa fa-user-injured icons"></i> <span>Add
                                        Patients</span> </a>
                            </li>

                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('appointment.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-calendar"></i>
                            <span>Appointments</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('appointment.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('appointment.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('appointment.index') }}"><i
                                        class="fa fa-calendar-check icons"></i><span>All
                                        Appointments</span> </a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('appointment.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('appointment.create') }}"><i class="fa fa-calendar-plus icons"></i><span>
                                        Add
                                        Appointment</span></a>
                            </li>

                        </ul>
                    </li>
                    <li class="submenu {{ request()->routeIs('treatment.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Treatments</span><span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('treatment.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('treatment.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('treatment.index') }}"><i class="fa fa-stethoscope icons"></i><span> All
                                        Treatments</span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('treatment.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('treatment.create') }}"><i class="fa fa-notes-medical icons"></i><span>
                                        Add
                                        Treatment</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('service.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-hospital-o"></i>
                            <span>Services</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('service.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('service.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('service.index') }}"><i class="fa fa-hospital icons"></i><span> All
                                        Services</a></span>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('service.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('service.create') }}"><i class="fa fa-building icons"></i><span>Add
                                        Services</span> </a>
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
                            <li class="menu-link1 {{ request()->routeIs('discharge.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('discharge.index') }}"><i class="fa fa-clipboard-list icons"></i><span>All
                                        Discharges</span> </a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('discharge.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('discharge.create') }}"><i class="fa fa-file-medical icons"></i><span> Add
                                        Discharge
                                    </span></a>
                            </li>

                        </ul>
                    </li>




                    <li class="submenu {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Inventory</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('inventory.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('inventory.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('inventory.index') }}"><i class="fa fa-cogs icons"></i><span>All
                                        Inventory</span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('inventory.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('inventory.create') }}"><i class="fa fa-plus-circle icons"></i><span>Add
                                        Inventory</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-truck"></i> <span>Supplier</span><span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('supplier.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('supplier.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('supplier.index') }}"><i class="fa fa-truck icons"></i><span>All
                                        Suppliers</span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('supplier.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('supplier.create') }}"><i class="fa fa-plus-circle icons"></i><span>Add
                                        Supplier</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('report.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-file-medical"></i> <span>Medical Report</span><span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('report.*') ? 'display: block;' : 'display: none;' }}">
                            <li class="menu-link1 {{ request()->routeIs('medicalreport.index') ? 'active' : '' }} mt-1">
                                <a href="{{ route('report.index') }}"><i class="fa fa-file-medical icons"></i><span>All
                                        Medical Reports</span></a>
                            </li>
                            <li class="menu-link1 {{ request()->routeIs('report.create') ? 'active' : '' }} mt-1">
                                <a href="{{ route('report.create') }}"><i class="fa fa-plus-circle icons"></i><span>Add
                                        Medical Report</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-link {{ request()->routeIs('chart') ? 'active' : '' }}">
                        <a href="{{ route('chart') }}"> <i class="fas fa-chart-line"></i> <span>Chart</span></a>
                    </li>
                    <!-- <li class="menu-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <a href="{{ route('profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a>
                        </li>

                        <li class="menu-link ">
                            <a href="#"> <i class="fa fa-sign-out-alt"></i> <span>Logout</span></a>
                        </li> -->
               
            </ul>
        </div>
    </div>
</div>