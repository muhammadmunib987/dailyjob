<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Survey Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h1 {
            font-size: 28px;
            font-weight: 600;
        }

        .form-header p {
            color: #6c757d;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .select2-container .select2-selection {
            height: 38px !important;
            line-height: 24px !important;
            padding: 0 10px;
            width: -webkit-fill-available;
        }
    </style>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Survey Form</h1>
                <p>We value your input. Please fill out the survey below.</p>
            </div>

            <form method="POST" novalidate action="{{ route('survey.submit') }}">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" value="{{ old('name') }}" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required>
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Hobbies -->
                <div class="mb-4">
                    <label for="hobbies" class="form-label">Hobbies</label>
                    <select name="hobbies[]" id="hobbies" class="form-select select2" multiple>
                        <option value="Cricket" {{ collect(old('hobbies'))->contains('Cricket') ? 'selected' : '' }}>Cricket</option>
                        <option value="Movies" {{ collect(old('hobbies'))->contains('Movies') ? 'selected' : '' }}>Movies</option>
                        <!-- Other options -->
                    </select>
                    @error('hobbies')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- User Type -->
                <div class="mb-4">
                    <label class="form-label">User Type</label>
                    <div class="form-check">
                        <input type="radio" name="user_type" value="Student" id="user_type_student" class="form-check-input" {{ old('user_type') == 'Student' ? 'checked' : '' }} onclick="toggleFields()">
                        <label for="user_type_student" class="form-check-label">Student</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="user_type" value="Job Holder" id="user_type_job" class="form-check-input" {{ old('user_type') == 'Job Holder' ? 'checked' : '' }} onclick="toggleFields()">
                        <label for="user_type_job" class="form-check-label">Job Holder</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="user_type" value="Other" id="user_type_other" class="form-check-input" {{ old('user_type') == 'Other' ? 'checked' : '' }} onclick="toggleFields()">
                        <label for="user_type_other" class="form-check-label">Other</label>
                    </div>
                    @error('user_type')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Conditional Fields -->
                <div id="student_field" style="{{ old('user_type') == 'Student' ? '' : 'display: none;' }}" class="mb-4">
                    <label for="field_of_study" class="form-label">Field of Study</label>
                    <input type="text" name="field_of_study" id="field_of_study" class="form-control" value="{{ old('field_of_study') }}">
                    @error('field_of_study')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div id="job_field" style="{{ old('user_type') == 'Job Holder' ? '' : 'display: none;' }}" class="mb-4">
                    <label for="job_field" class="form-label">Job Field</label>
                    <input type="text" name="job_field" id="job_field" class="form-control" value="{{ old('job_field') }}">
                    @error('job_field')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div id="other_details_field" style="{{ old('user_type') == 'Other' ? '' : 'display: none;' }}" class="mb-4">
                    <label for="other_details" class="form-label">Other Details</label>
                    <input type="text" name="other_details" id="other_details" class="form-control" value="{{ old('other_details') }}">
                    @error('other_details')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Country Crisis Opinion -->
                <div class="mb-4">
                    <label for="country_crisis_opinion" class="form-label">Your Opinion on Country Crisis</label>
                    <textarea name="country_crisis_opinion" id="country_crisis_opinion" rows="4" class="form-control">{{ old('country_crisis_opinion') }}</textarea>
                    @error('country_crisis_opinion')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-submit w-100">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                placeholder: "Select your hobbies",
                allowClear: true
            });

            // Debugging
            console.log("Select2 Initialized");
        });

        function toggleFields() {
            const userType = document.querySelector('input[name="user_type"]:checked')?.value;
            document.getElementById('student_field').style.display = userType === 'Student' ? 'block' : 'none';
            document.getElementById('job_field').style.display = userType === 'Job Holder' ? 'block' : 'none';
            document.getElementById('other_details_field').style.display = userType === 'Other' ? 'block' : 'none';
        }
    </script>
</body>

</html>