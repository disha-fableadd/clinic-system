@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <h4 class="page-title" style="padding-left: 140px;text-align:center; !important">Add Role</h4>
            </div>
            <div class="col-6 text-center m-b-2 " style="padding-right:150px">
                <a href="{{ route('role.index') }}" class="btn btn-primary  btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Role</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form id="roleForm" class="form-container" method="POST" action="{{ url('api/rolee') }}"
                    style="width:60% ;padding-bottom: 60px;">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-tag  icon-style"></i> Role Name</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label> <i class="fas fa-info-circle  icon-style"></i> Description</label>
                                <textarea cols="30" rows="4" class="form-control" style="border-radius:10px !important"
                                    name="description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Create Role</button>
                    </div>
                </form>

                <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        let token = localStorage.getItem('token');

        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }
    });



    $(document).ready(function () {
        $('#roleForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('api/rolee') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: { "Authorization": "Bearer " + localStorage.getItem('token') },
                
                success: function (response) {
                    $('#successMessage').text(response.message || 'Role created successfully').show();
                    $('#roleForm')[0].reset();
                    setTimeout(function () {
                        window.location.href = "{{ route('role.index') }}";
                    }, 1500);
                },
                error: function (xhr) {
                    let errorMessage = xhr.responseJSON.message || 'Something went wrong.';
                    $('#errorMessage').text(errorMessage).show();
                }
            });

        });
    });
</script>



@endsection