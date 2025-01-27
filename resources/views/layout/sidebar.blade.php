<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"> <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu {{ request()->is('role*') ? 'active' : '' }}">
                    <a href=""><i class="fa fa-user"></i> <span>Role</span><span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('role.create') }}">Add Role</a></li>
                        <li><a href="{{ route('role.index') }}">All Role</a></li>

                    </ul>
                </li>

                <li class="submenu {{ request()->is('user*') ? 'active' : '' }}">
                    <a href=""><i class="fa fa-user-md"></i><span>User</span><span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.create') }}">Add User</a></li>
                        <li><a href="{{ route('user.index') }}">All User</a></li>

                    </ul>
                </li>

                <li class="submenu {{ request()->is('medicine*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-pills"></i> <span>Medicines</span><span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('medicine.create') }}">Add Medicines</a></li>
                        <li><a href="{{ route('medicine.index') }}">All Medicines</a></li>

                    </ul>
                </li>
                <li class="submenu {{ request()->is('patients*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-wheelchair"></i> <span>Patients</span><span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('patients.create') }}">Add Patients</a></li>
                        <li><a href="{{ route('patients.index') }}">All Patients</a></li>

                    </ul>
                </li>
                <li class="submenu {{ request()->is('appointments*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-calendar"></i>
                        <span>Appointments</span><span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('appointment.create') }}">Add Appointments</a></li>
                        <li><a href="{{ route('appointment.index') }}">All Appointments</a></li>

                    </ul>
                </li>
                <li class="submenu {{ request()->is('treatment*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Treatments
                        </span><span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('treatment.create') }}">Add Treatments</a></li>
                        <li><a href="{{ route('treatment.index') }}">All Treatments</a></li>

                    </ul>
                </li>
                <li class="submenu {{ request()->is('departments*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-hospital-o"></i>
                        <span>Departments</span><span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                        <li><a href="{{ route('department.create') }}">Add Departments</a></li>
                        <li><a href="{{ route('department.index') }}">All Departments</a></li>

                    </ul>
                </li>
                <li class="menu-link {{ request()->is('calendar*') ? 'active' : '' }}">
                    <a href="{{ route('calender.index') }}"><i class="fa fa-calendar"></i><span>Calendar</span></a>
                </li>
                <li class="submenu {{ request()->is('discharge*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-hospital-o"></i>
                        <span>Discharge</span><span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                        <li><a href="{{ route('discharge.create') }}">Add Discharge Details</a></li>
                        <li><a href="{{ route('discharge.index') }}">All Discharge</a></li>

                    </ul>
                </li>
                <li class="menu-link {{ request()->is('chart*') ? 'active' : '' }}">
                    <a href="{{ route('chart') }}"> <i class="fas fa-chart-line"></i> <span>Chart</span></a>
                </li>
                <li class="menu-link {{ request()->is('profile*') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a>
                </li>
                <li class="menu-link">
                    <a href="#"> <i class="fa fa-sign-out-alt"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const menuLinks = document.querySelectorAll('#sidebar-menu .menu-link a');
        const currentUrl = window.location.href;

        menuLinks.forEach(link => {
            if (currentUrl.includes(link.getAttribute('href'))) {
                link.closest('.menu-link').classList.add('active');
            }


            link.addEventListener('click', function () {
                document.querySelectorAll('.menu-link.active').forEach(activeLink => {
                    activeLink.classList.remove('active');
                });
                this.closest('.menu-link').classList.add('active');
            });
        });
    });

</script>