@extends('layout.app')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <form id="multiStepForm" method="POST" action="{{ route('user.store') }}">
            @csrf
            <!-- Step 1: Personal Information -->
            <div class="form-step" id="step-1">
                <!-- Personal Information Fields -->
                <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 2: Education -->
            <div class="form-step" id="step-2" style="display:none;">
                <div id="educationFields">
                    <!-- Education Fields -->
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                <button type="button" class="btn btn-primary" onclick="addEducation()">Add More Education</button>
                <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 3: Experience -->
            <div class="form-step" id="step-3" style="display:none;">
                <div id="experienceFields">
                    <!-- Experience Fields -->
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                <button type="button" class="btn btn-primary" onclick="addExperience()">Add More Experience</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentStep = 1;

    function nextStep() {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        currentStep++;
        document.getElementById(`step-${currentStep}`).style.display = 'block';
    }

    function prevStep() {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        currentStep--;
        document.getElementById(`step-${currentStep}`).style.display = 'block';
    }

    function addEducation() {
        const educationFields = document.getElementById('educationFields');
        const index = educationFields.children.length;
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>Education ${index + 1}</legend>
            <label>Degree:</label>
            <input type="text" name="education[${index}][degree]" class="form-control" required>
            <label>Institution:</label>
            <input type="text" name="education[${index}][institution]" class="form-control" required>
            <label>Year:</label>
            <input type="text" name="education[${index}][year]" class="form-control" required>
        `;
        educationFields.appendChild(fieldset);
    }

    function addExperience() {
        const experienceFields = document.getElementById('experienceFields');
        const index = experienceFields.children.length;
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>Experience ${index + 1}</legend>
            <label>Company:</label>
            <input type="text" name="experience[${index}][company]" class="form-control" required>
            <label>Role:</label>
            <input type="text" name="experience[${index}][role]" class="form-control" required>
            <label>Years:</label>
            <input type="text" name="experience[${index}][years]" class="form-control" required>
        `;
        experienceFields.appendChild(fieldset);
    }
</script>
@endsection
