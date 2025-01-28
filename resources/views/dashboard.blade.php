@extends('layout.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget1">
                    <span class="dash-widget-bg1"><i class="fa fa-user"></i></span>
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
                    <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
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
                    <div class="card-body" style="height:608px">
                        <div class="chart-title">
                            <div style="margin-top:20px">
                                <h4>Doctors & Patients</h4>
                                <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher
                                    than
                                    Last Month</span>
                                <canvas id="linegraph" class="mt-5" style="
                                    display: block;
                                    width: 475px;
                                    height: 400px;  margin-top:80px">
                                </canvas>

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
                        <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a
                            href="{{ route('appointment.index') }}" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table  custom-table">
                                <thead style="background-color:#ff8e29;" class="text-center">
                                    <tr>
                                        <th>Appointment ID</th>
                                        <th>Patient Name</th>

                                        <th>Doctor Name</th>
                                        <th>Treatment</th>
                                        <th>Appointment Date</th>



                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td> Denise Stevens</td>

                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>



                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td> Denise Stevens</td>

                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>


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
                        <h4 class="card-title d-inline-block">New Patients </h4> <a href="{{ route('patients.index') }}"
                            class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                        <table class="table  custom-table">
                        <thead style="background-color:#ff8e29;"> 
                            <tr>
                                <th>Id</th>
                            <th >Image</th>
                                <th >Name</th>
                                <th>age</th>
                                <th>Email</th>
                                <th>Treatment</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>1</td>
                                <td>  <img width="28" height="28" src="{{asset('admin/assets/img/user.jpg')}}"
                                class="rounded-circle" alt=""></td>
                                <td>
                                  
                                    <h2>Albina Simonis</h2>
                                </td>
                                <td>25</td>
                             
                                <td>albinasimonis@example.com</td>
                                <td>fddfg</td>
                                
                               
                            </tr>
                            <tr>
                            <td>1</td>
                                <td><img width="28" height="28" src="{{asset('admin/assets/img/user.jpg')}}"
                                class="rounded-circle" alt=""></td>
                                <td>
                                    
                                    <h2>Cristina Groves</h2>
                                </td>
                                <td>25</td>
                                <td>cristinagroves@example.com</td>
                                <td>fdgsrtgh</td>
                              
                                
                            </tr>
                            <tr>
                            <td>1</td>
                                <td>    <img width="28" height="28" src="{{asset('admin/assets/img/user.jpg')}}"
                                class="rounded-circle" alt=""></td>
                                <td>
                                
                                    <h2>Mary Mericle</h2>
                                </td>
                                <td>25</td>
                                <td>marymericle@example.com</td>
                                <td>gfhfgh</td>
                                
                              
                            </tr>
                            <tr>
                            <td>1</td>
                                <td> <img width="28" height="28" src="{{asset('admin/assets/img/user.jpg')}}"
                                class="rounded-circle" alt=""></td>
                                <td>
                                   
                                    <h2>Haylie Feeney</h2>
                                </td>
                                <td>25</td>
                                <td>hayliefeeney@example.com</td>
                                <td>yhgjhhk</td>
                              
                               
                            </tr>
                            <tr>
                            <td>1</td>
                            <td> <img width="28" height="28" src="{{asset('admin/assets/img/user.jpg')}}"
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
                        <h4 class="card-title mb-0">Doctors</h4>
                    </div>
                    <div class="card-body">
                        <ul class="contact-list">
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src="{{asset('admin/assets/img/user.jpg')}}" alt=""
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
                                                src="{{asset('admin/assets/img/user.jpg')}}" alt=""
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
                                                src="{{asset('admin/assets/img/user.jpg')}}" alt=""
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
                                                src="{{asset('admin/assets/img/user.jpg')}}" alt=""
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
                                                src="{{asset('admin/assets/img/user.jpg')}}" alt=""
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
                                                src="{{asset('admin/assets/img/user.jpg')}}" alt=""
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
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Default view
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
</script>

<style>
    #calendar {
        max-width: 100%;
        margin: 0;
        padding: 10px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>



@endsection