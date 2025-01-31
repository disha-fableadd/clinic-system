@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content" >
        <div class="row">
            <div class="col-sm-6 col-5">
                <h4 class="page-title text-center" style="padding-left: 95px;">Add Treatment</h4>
            </div>
            <div class="col-sm-6 col-7 text-center m-b-2" style="padding-right: 65px;">
                <a href="{{ route('treatment.index') }}" class="btn btn-primary btn-rounded" >
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Treatment
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-container"  style="width:60% ;padding-bottom: 60px;">

                    <div class="form-group">
                        <label><i class="fas fa-cogs  icon-style"></i> Treatment Name</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-user-md  icon-style"></i> Doctor Name</label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>Cristina Groves</option>
                            <option>Marie Wells</option>
                            <option>Henry Daniels</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-clipboard-list  icon-style"></i> Description</label>
                        <textarea cols="30" rows="4" class="form-control" style="border-radius:10px !important"></textarea>
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn"> Create Treatment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        const sidebar = document.querySelector('.sidebar'); // Assuming the sidebar has this class

        toggleBtn.addEventListener('click', function () {
            if (sidebar) {
                sidebar.classList.toggle('mini-sidebar'); // This toggles the class on the sidebar
            }
        });
    });

    
</script>

@endsection
