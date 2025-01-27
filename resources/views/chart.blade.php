@extends('layout.app')
@section('content')  
<div class="page-wrapper">
    <div class="content">
     
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Patient Total</h4>
                            <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than
                                Last Month</span>
                        </div>
                        <canvas id="linegraph"></canvas>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Doctors</h4>
                           
                        </div>
                        <canvas id="bargraph"></canvas>
                    </div>
                </div>
            </div>
        </div>
     
     
    </div>
  
</div>
@endsection