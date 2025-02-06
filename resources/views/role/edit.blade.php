@extends('layout.app')

@section('content')  

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class=" col-6">
                <h4 class="page-title" style="padding-left: 140px;text-align:center; !important">Edit Role</h4>
            </div>
            <div class="col-6 text-center m-b-2 " style="padding-right:150px">
                <a href="{{ route('role.index') }}" class="btn btn-primary  btn-rounded">
                    <i class="fa fa-eye m-r-5 icon3  "></i>
                    All Role</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2">
                <form id="editRoleForm" class="form-container" style="width:60% ;padding-bottom: 60px;">
                    @csrf
                    <input type="hidden" id="roleId">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-tag icon-style"></i> Role Name</label>
                                <input class="form-control" type="text" id="roleName" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><i class="fas fa-info-circle icon-style"></i> Description</label>
                                <textarea cols="30" rows="4" class="form-control" id="roleDescription"
                                    style="border-radius:10px !important" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Update Role</button>
                    </div>
                </form>

                <!-- Success Message -->
                <div id="successMessage" class="alert alert-success" style="display:none;"></div>


                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle_btn');
        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('mini-sidebar');
        });
    });

    $(document).ready(function () {
        let token = localStorage.getItem('token');

        if (!token) {
            // Redirect to login if no token is found
            window.location.href = "{{ route('login') }}";
        }
    });

    $(document).ready(function () {
        var pathParts = window.location.pathname.split('/');
        var roleId = pathParts[pathParts.length - 1]; // Get last part

        console.log("Extracted Role ID from URL:", roleId); // Debugging

        if (!roleId || isNaN(roleId)) {
            alert("Error: Role ID is missing or invalid.");
            return;
        }

        $("#roleId").val(roleId); // Set hidden input field

        // Fetch role data using API
        $.ajax({
            url: "/api/rolee/" + roleId,
            type: "GET",
            headers: { "Authorization": "Bearer " + localStorage.getItem('token') },

            success: function (role) {
                $("#roleName").val(role.name);
                $("#roleDescription").val(role.description);
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    // alert("Unauthorized: Please log in first.");
                    window.location.href = "{{ route('login') }}";
                }
            },
        });











        $("#editRoleForm").submit(function (event) {
            event.preventDefault();

            let roleId = $("#roleId").val(); // Fetch from input
            let roleName = $("#roleName").val();
            let roleDescription = $("#roleDescription").val();

            console.log("Submitting Role ID:", roleId); // Debugging log

            if (!roleId) {
                alert("Error: Role ID is missing before updating.");
                return;
            }

            $.ajax({
                url: "/api/rolee/" + roleId,
                type: "PUT",
                data: JSON.stringify({
                    name: roleName,
                    description: roleDescription
                }),
                contentType: "application/json",
                headers: { "Authorization": "Bearer " + localStorage.getItem('token') },

                success: function (response) {
                    console.log("Update Success:", response);
                    $("#successMessage").text("Role updated successfully!").fadeIn().delay(3000).fadeOut();

                    setTimeout(function () {
                        window.location.href = "{{ route('role.index') }}";
                    }, 2000);
                },
                error: function (xhr) {
                    if (xhr.status === 401) {
                        // alert("Unauthorized: Please log in first.");
                        window.location.href = "{{ route('login') }}";
                    }
                },

            });
        });
    });



</script>


@endsection