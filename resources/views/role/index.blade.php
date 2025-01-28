@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title" style="text-align:left; !important">All Role</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-2">
                <a href="{{ route('role.create') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>
                    Add Role</a>
            </div>
        </div>




        <div class="row mt-5">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div id="demo_info" class="box"></div>
                    <table id="example" class="table custom-table mt-3">
                        <thead style="background-color:#ff8e29;" class="text-center">
                            <tr>
                                <th>Sr.No</th>
                                <th>Role Name</th>
                                <th>Description</th>

                                <th>Joining Date</th>
                                <th style="width: 145px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($roles->isEmpty())
                                <tr>
                                    <td colspan="6">No records found.</td>
                                </tr>
                            @else
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td class="text-left">{{ $key + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>

                                        <td>{{ $role->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="icon">
                                                <a href="{{ route('role.show', $role->id) }}" class="m-r-5">
                                                    <i class="fa fa-eye icon3"></i>
                                                </a>
                                                <a href="{{ route('role.edit', $role->id) }}" class="m-r-5">
                                                    <i class="fa fa-pencil icon1"></i>
                                                </a>
                                                <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border: none; background: none;" class="m-r-5">
                                                        <i class="fa fa-trash-o icon2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>


                </div>
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