@extends('layout.app')


@section('content')  


<div class="page-wrapper">
    <div class="content" style="height:100vh; !important">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-title">Add Schedule</h4>
            </div>
        </div>
        <div class="row">
            <div class=" offset-lg-2">
                <form class="form-container">



                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Doctor Name</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Cristina Groves</option>
                                    <option>Marie Wells</option>
                                    <option>Henry Daniels</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="available-days">Available Days</label>
                                <select id="available-days" class="form-control">
                                    <option value="" disabled selected>Select Days</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>
                            <div id="selected-days" class="mt-3">
                                <!-- Selected days with cancel buttons will appear here -->
                            </div>
                        </div>
                        <script>
                            const availableDays = document.getElementById("available-days");
                            const selectedDaysContainer = document.getElementById("selected-days");

                            // Track selected days
                            const selectedDays = new Set();

                            availableDays.addEventListener("change", function () {
                                const selectedDay = this.value;

                                // Prevent adding the same day twice
                                if (selectedDays.has(selectedDay)) {
                                    alert(`${selectedDay} is already selected.`);
                                    return;
                                }

                                // Add day to the set
                                selectedDays.add(selectedDay);

                                // Create a badge with a cancel button
                                const dayBadge = document.createElement("div");
                                dayBadge.className = "badge bg-primary text-white m-1 d-inline-flex align-items-center";
                                dayBadge.innerHTML = `
                                ${selectedDay} 
                                <button type="button" class="btn btn-sm btn-danger ms-2" style="margin-left:5px">x</button> `;

                                
                                dayBadge.querySelector("button").addEventListener("click", () => {
                                    selectedDays.delete(selectedDay);
                                    dayBadge.remove(); 
                                });

                                // Add badge to the container
                                selectedDaysContainer.appendChild(dayBadge);
                            });
                        </script>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Start Time</label>
                                <div class="time-icon">
                                    <input type="text" class="form-control" id="datetimepicker3">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>End Time</label>
                                <div class="time-icon">
                                    <input type="text" class="form-control" id="datetimepicker4">
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Create Appointment</button>
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


    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
</script>
@endsection