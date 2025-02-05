@extends('layout.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget1">
                    <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <span class="widget-title1">Total Users </span>
                        <h3>98</h3>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget2">
                    <span class="dash-widget-bg2"><i class="fa fa-stethoscope" aria-hidden="true"></i> </span>
                    <div class="dash-widget-info text-right">
                        <span class="widget-title2 mb-3"> Doctors </span>
                        <h3>1072</h3>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget1">
                    <span class="dash-widget-bg3"><i class="fa fa-user"></i></span>
                    <div class="dash-widget-info text-right">
                        <span class="widget-title3"> Patients </span>
                        <h3>72</h3>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget2">
                    <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <span class="widget-title2 mb-3"> Department </span>
                        <h3>618</h3>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <div>
                                <h4><i class="fa fa-user-md icon-style1" aria-hidden="true"></i> Doctors & Patients</h4>
                                <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher
                                    than
                                    Last Month</span>
                                <div class="chart-container">
                                    <canvas id="bargraph" style="
                                    display: block;
                                    width: 512px;
                                    height: 430px;"></canvas>
                                </div>

                                <!-- <canvas id="linegraph" class="mt-5" style="
                                    display: block;
                                    width: 475px;
                                    height: 370px;  margin-top:80px">
                                </canvas> -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">


                    <div id="calendar"></div>


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block"><i class="fa fa-stethoscope icon-style1"
                                aria-hidden="true"></i> Upcoming Appointments</h4>
                        <a href="{{ route('appointment.index') }}"
                            class="btn btn-primary btn-rounded float-right button">View
                            all <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table  custom-table">
                                <thead style="background-color:rgb(233 152 136);" class="text-center">
                                    <tr>
                                        <th style="border-right: 1px solid #ffffff75;">Image</th>
                                        <th style="border-right: 1px solid #ffffff75;">Patient Name</th>

                                        <th style="border-right: 1px solid #ffffff75;">Doctor Name</th>
                                        <th style="border-right: 1px solid #ffffff75;">Treatment</th>
                                        <th style="border-right: 1px solid #ffffff75;">Appointment Date</th>
                                        <th style="border-right: 1px solid #ffffff75;">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>

                                        <td><img width="28" height="28" src="{{asset('admin/assets/img/user-03.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td> Denise Stevens</td>

                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>
                                        <td><span class="custom-badge btn btn-primary  btn-rounded">Active</span></td>


                                    </tr>
                                    <tr>
                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-02.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td> Denise Stevens</td>
                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>
                                        <td><span class="custom-badge btn btn-danger  btn-rounded">InActive</span></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block"><i class="fa fa-user icon-style1"></i> New Patients</h4>
                        <a href="{{ route('patients.index') }}" class="btn btn-primary btn-rounded float-right button">
                            View all <i class="fas fa-arrow-right ml-1"></i>
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  custom-table">
                                <thead style="background-color:#ff8e29;">
                                    <tr>

                                        <th style="border-right: 1px solid #ffffff75; ">Image</th>
                                        <th style="border-right: 1px solid #ffffff75;">Name</th>
                                        <th style="border-right: 1px solid #ffffff75;">Age
                                        </th>
                                        <th style="border-right: 1px solid #ffffff75;">Email</th>
                                        <th style="border-right: 1px solid #ffffff75;">Treatment</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    <tr>

                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-02.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Albina Simonis</h2>
                                        </td>
                                        <td>25</td>

                                        <td>albinasimonis@example.com</td>
                                        <td>fddfg</td>


                                    </tr>
                                    <tr>

                                        <td><img width="28" height="28" src="{{asset('admin/assets/img/user-03.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Cristina Groves</h2>
                                        </td>
                                        <td>25</td>
                                        <td>cristinagroves@example.com</td>
                                        <td>fdgsrtgh</td>


                                    </tr>
                                    <tr>

                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-04.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Mary Mericle</h2>
                                        </td>
                                        <td>25</td>
                                        <td>marymericle@example.com</td>
                                        <td>gfhfgh</td>


                                    </tr>
                                    <tr>

                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-05.jpg')}}"
                                                class="rounded-circle" alt=""></td>
                                        <td>

                                            <h2>Haylie Feeney</h2>
                                        </td>
                                        <td>25</td>
                                        <td>hayliefeeney@example.com</td>
                                        <td>yhgjhhk</td>


                                    </tr>
                                    <tr>

                                        <td> <img width="28" height="28" src="{{asset('admin/assets/img/user-06.jpg')}}"
                                                class="rounded-circle" alt=""></td>

                                        <td>

                                            <h2>Zoe Butler</h2>
                                        </td>
                                        <td>25</td>
                                        <td>zoebutler@example.com</td>
                                        <td>tghgfhg</td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card member-panel">
                    <div class="card-header ">
                        <h4 class="card-title mb-0"><i class="fa fa-user-md icon-style1" aria-hidden="true"></i>Doctors
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="contact-list">
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src="{{asset('admin/assets/img/user-02.jpg')}}" alt=""
                                                class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">John Doe</span>
                                        <span class="contact-date">MBBS, MD</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="Richard Miles"><img
                                                src="{{asset('admin/assets/img/user-03.jpg')}}" alt=""
                                                class="w-40 rounded-circle"><span class="status offline"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">Richard Miles</span>
                                        <span class="contact-date">MD</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src="{{asset('admin/assets/img/user-04.jpg')}}" alt=""
                                                class="w-40 rounded-circle"><span class="status away"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">John Doe</span>
                                        <span class="contact-date">BMBS</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="Richard Miles"><img
                                                src="{{asset('admin/assets/img/user-05.jpg')}}" alt=""
                                                class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">Richard Miles</span>
                                        <span class="contact-date">MS, MD</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src="{{asset('admin/assets/img/user-06.jpg')}}" alt=""
                                                class="w-40 rounded-circle"><span class="status offline"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">John Doe</span>
                                        <span class="contact-date">MBBS</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="Richard Miles"><img
                                                src="{{asset('admin/assets/img/user-02.jpg')}}" alt=""
                                                class="w-40 rounded-circle"><span class="status away"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">Richard Miles</span>
                                        <span class="contact-date">MBBS, MD</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center " style="background-color:rgb(207 236 224);color:black">
                        <a href="#" class="text-muted"> All Doctors</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            height: 300,
            events: [
                {
                    title: 'Doctor Meeting',
                    start: '2025-01-29',
                    end: '2025-01-30',
                    description: 'Discussion about patient progress'
                },
                {
                    title: 'Surgery Appointment',
                    start: '2025-02-02',
                    allDay: true
                },
                {
                    title: 'Follow-Up',
                    start: '2025-02-05T10:30:00',
                    description: 'Follow-up with patient #1001'
                }
            ],
            eventClick: function (info) {
                alert('Event: ' + info.event.title + '\nDescription: ' + info.event.extendedProps.description);
            }


        });

        calendar.render();
    });




    $(document).ready(function () {
        let token = localStorage.getItem('token');

         else {
            $.ajax({
                url: "{{ url('/api/user') }}",
                type: "GET",
                headers: { "Authorization": "Bearer " + token },
                success: function (response) {
                    console.log("User Data:", response);
                },

            });
        }


    });










</script>

<style>
    #calendar {
        max-width: 100%;
        margin: 0;
        padding: 14px;
        background-color: #fff;
        border-radius: 20px;
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    }

    .fc-scroller.fc-day-grid-container {
        height: 350px !important;
    }

    .fc-row.fc-week.fc-widget-content.fc-rigid {
        height: 58px !important;
    }
</style>



@endsection