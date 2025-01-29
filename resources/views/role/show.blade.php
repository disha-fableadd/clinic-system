@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">
                    <i class="fa fa-user-shield"></i> Role Details
                </h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('role.index') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Roles
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer text-right" style="background-color:#87ceb0">

                        <h3 style="float:left" class="text-dark"><i class="fa fa-info-circle icon-style2"></i> {{ $role->name }} Details
                        </h3>

                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary btn-rounded"
                            style="color:black">
                            <i class="fa fa-pencil-alt "></i> Edit Role
                        </a>
                        <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-rounded">
                                <i class="fa fa-trash"></i> Delete Role
                            </button>
                        </form>
                    </div>

                    <div class="card-body">
                        <p class="text-dark"><strong><i class="fa fa-id-badge icon-style1"></i> Role Name:</strong>
                            {{ $role->name }}</p>
                        <hr>
                        <p class="text-dark"><strong><i class="fa fa-align-left icon-style1"></i> Description:</strong>
                            {{ $role->description }}</p>
                        <hr>
                        <p class="text-dark"><strong><i class="fa fa-key icon-style1"></i> Permissions:</strong></p>

                        @if (is_array($role->permissions) && count($role->permissions) > 0)
                            <div class="row">
                                @foreach ($role->permissions as $index => $permission)
                                    <div class="col-md-3 col-sm-6 mb-2"> 
                                        <span class="btn btn-primary btn-rounded p-2 w-100 ">
                                            <i class="fa fa-check-circle" style="float:left"></i> {{ $permission }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @elseif (is_string($role->permissions))
                            <span class="badge badge-pill badge-warning p-2"><i class="fa fa-exclamation-circle"></i>
                                {{ $role->permissions }}</span>
                        @else
                            <span class="badge badge-pill badge-secondary p-2"><i class="fa fa-ban"></i> No
                                Permissions</span>
                        @endif



                        <hr>
                        <p class="text-dark"><strong><i class="fa fa-calendar-plus icon-style1"></i> Joining
                                Date:</strong>
                            {{ $role->created_at->format('d/m/Y') }}</p>
                        <hr>
                        <p class="text-dark"><strong><i class="fa fa-calendar-check icon-style1"></i> Last
                                Updated:</strong>
                            {{ $role->updated_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* .card-footer {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    } */

    .icon-style1 {
        background-color: white;
        color: rgb(157 195 179);
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }

    .icon-style2 {
        /* background-color: white; */
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 50%;
    }
</style>
@endsection