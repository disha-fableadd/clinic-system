@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left;">Role Details</h4>
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
                    <div class="card-header">
                        <h5>{{ $role->name }} Details</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Role Name:</strong> {{ $role->name }}</p>
                        <p><strong>Description:</strong> {{ $role->description }}</p>
                        <p><strong>Permissions:</strong> 
                            @if (is_array($role->permissions))
                                {{ implode(', ', $role->permissions) }}
                            @elseif (is_string($role->permissions))
                                {{ $role->permissions }}
                            @else
                                -
                            @endif
                        </p>
                        <p><strong>Joining Date:</strong> {{ $role->created_at->format('d/m/Y') }}</p>
                        <p><strong>Last Updated:</strong> {{ $role->updated_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="card-footer text-right" style="background-color:#87ceb0">
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary btn-rounded" style="color:black">
                            <i class="fa fa-pencil"></i> Edit Role
                        </a>
                        <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-rounded">
                                <i class="fa fa-trash-o"></i> Delete Role
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
