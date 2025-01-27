<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"> <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-link {{ request()->is('user*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>User</span></a>
                </li>
                <li class="menu-link {{ request()->is('doctor*') ? 'active' : '' }}">
                    <a href="{{ route('doctor.index') }}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                </li>
                <li class="menu-link {{ request()->is('patients') ? 'active' : '' }}">
                    <a href="{{ route('patients.index') }}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                </li>
                <li class="menu-link {{ request()->is('appointments') ? 'active' : '' }}">
                    <a href="{{ route('appointment.index') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                <li class="menu-link {{ request()->is('schedule') ? 'active' : '' }}">
                    <a href="{{ route('schedule.index') }}"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                </li>
                <li class="menu-link {{ request()->is('departments') ? 'active' : '' }}">
                    <a href="{{ route('department.index') }}"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                </li>
                <li class="menu-link {{ request()->is('calendar') ? 'active' : '' }}">
                    <a href="{{ route('calender.index') }}"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                </li>
                <li class="menu-link {{ request()->is('chart') ? 'active' : '' }}">
                    <a href="{{ route('chart') }}"> <i class="fas fa-chart-line"></i> <span>Chart</span></a>
                </li>
                <li class="menu-link {{ request()->is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a>
                </li>
                <li class="menu-link">
                    <a href="logout.html"> <i class="fa fa-sign-out-alt"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Get all menu links
    const menuLinks = document.querySelectorAll('#sidebar-menu .menu-link a');
    const currentUrl = window.location.href;

    menuLinks.forEach(link => {
        if (currentUrl.includes(link.getAttribute('href'))) {
            link.closest('.menu-link').classList.add('active');
        }

        // Add click event for manual interaction
        link.addEventListener('click', function () {
            document.querySelectorAll('.menu-link.active').forEach(activeLink => {
                activeLink.classList.remove('active');
            });
            this.closest('.menu-link').classList.add('active');
        });
    });
});

</script>