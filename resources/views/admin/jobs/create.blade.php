<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Job Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf

                    <!-- Job Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter job title" required>
                    </div>

                     <!-- Category Selector (Dynamic) -->
                    <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                        <option value="0">Other</option>
                    </select>
                    <input type="text" name="category_name" id="category_name" class="mt-2 hidden w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter Category Name">
                    </div>

                    <!-- Designation Selector (Dynamic) -->
                    <div class="mb-4">
                    <label for="designation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Designation</label>
                    <select name="designation_id" id="designation_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="">Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                        @endforeach
                        <option value="0">Other</option>
                    </select>
                    <input type="text" name="designation_name" id="designation_name" class="mt-2 hidden w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter Designation Name">
                    </div>
                        <!-- Job Type Selector (Dynamic) -->
                        <div class="mb-4">
                            <label for="job_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Type</label>
                            <select name="job_type_id" id="job_type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >
                                <option value="">Select Job Type</option>
                                @foreach($jobTypes as $jobType)
                                    <option value="{{ $jobType->id }}">{{ $jobType->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Skills Multi-Selector (Dynamic) -->
                        <div class="mb-4">
                            <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skills</label>
                            <select name="skills[]" id="skills" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <!-- Location -->
                           <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                            <input type="text" name="location" id="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter location" required>
                        </div>
                        <!-- Job Description -->
                        <div class="mb-4">
                            <label for="job_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Description</label>
                            <textarea name="job_description" id="job_description" class="summernote"></textarea>
                        </div>

                        <!-- Job Requirement -->
                        <div class="mb-4">
                            <label for="job_requirement" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Requirements</label>
                            <textarea name="job_requirement" id="job_requirement" class="summernote"></textarea>
                        </div>

                        <!-- Experience Fields -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="min_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Min Experience (Years)</label>
                                <input type="number" name="min_experience" id="min_experience" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="max_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Max Experience (Years)</label>
                                <input type="number" name="max_experience" id="max_experience" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" required>
                            </div>
                        </div>
                                 <!-- salary -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="min_salary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Min Salary</label>
                                <input type="number" name="min_salary" id="min_salary" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="max_salary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Max Salary</label>
                                <input type="number" name="max_salary" id="max_salary" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" required>
                            </div>
                        </div>
                           <!-- Experience Fields -->
                           <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="no_of_position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No Of Position</label>
                                <input type="number" name="no_of_position" id="no_of_position" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="max_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                                <select name="gender" id="gender"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="Any">Any</option>
                                </select>
                            </div>
                            <div>
                                <label for="no_of_position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No Of Position</label>
                                <select name="job_shift" id="job_shift"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="Morning">Morning</option>
                                    <option value="Evening">Evening</option>
                                    <option value="Night">Night</option>
                                </select>
                            </div>

                            <div>
                                <label for="no_of_position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Expiry Date </label>
                                <input type="date" name="job_expiry_date" id="job_expiry_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" >
                            </div>

                            <div>
                                <label for="no_of_position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Employeer Email </label>
                                <input type="email" name="job_contact_email" id="job_contact_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm"  placeholder="Enter contact email" >
                            </div>

                                 <!-- Job Contact Number -->
                        <div class="mb-4">
                            <label for="job_contact_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Employer Contact Number</label>
                            <input type="text" name="job_contact_no" id="job_contact_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" placeholder="Enter contact number">
                        </div>
                          <!-- Apply Via -->
                          <div class="mb-4">
                            <label for="apply_via" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apply Via</label>
                            <select name="apply_via" id="apply_via" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">Select Apply Method</option>
                                <option value="website">Website</option>
                                <option value="email">Email</option>
                                <option value="phone">Phone Number</option>
                                <option value="other">Other</option>
                            </select>
                            <input type="text" name="external_website_link" id="external_website_link" class="mt-2 hidden w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter Website Link">
                            <input type="text" name="job_contact_no" id="job_contact_no" class="mt-2 hidden w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter Contact Number">
                        </div>
                        <!-- External Website Link -->
                        <div class="mb-4">
                            <label for="external_website_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">External Website Link</label>
                            <input type="url" name="external_website_link" id="external_website_link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 sm:text-sm" placeholder="Enter external job link">
                        </div>

                      
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded shadow">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Select2 and Summernote -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet" />
    
    <script>
        $(document).ready(function() {
            $('#skills').select2({
                placeholder: 'Select skills',
                allowClear: true,
                width: '100%'
            });
            
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            if ($(this).val() == '0') {
                $('#category_name').removeClass('hidden');
            } else {
                $('#category_name').addClass('hidden');
            }
        });
        
        $('#designation_id').change(function() {
            if ($(this).val() == '0') {
                $('#designation_name').removeClass('hidden');
            } else {
                $('#designation_name').addClass('hidden');
            }
        });
    });
</script>
</x-app-layout>
