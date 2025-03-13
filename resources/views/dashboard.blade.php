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

                        <!-- Category Selector -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">Select Category</option>
                                <option value="1">IT</option>
                                <option value="2">Healthcare</option>
                                <option value="3">Finance</option>
                            </select>
                        </div>

                        <!-- Designation Selector -->
                        <div class="mb-4">
                            <label for="designation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Designation</label>
                            <select name="designation_id" id="designation_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">Select Designation</option>
                                <option value="1">Software Engineer</option>
                                <option value="2">Project Manager</option>
                            </select>
                        </div>

                        <!-- Job Type Selector -->
                        <div class="mb-4">
                            <label for="job_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Type</label>
                            <select name="job_type_id" id="job_type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">Select Job Type</option>
                                <option value="1">Full-Time</option>
                                <option value="2">Part-Time</option>
                            </select>
                        </div>

                        <!-- Skills Multi-Selector -->
                        <div class="mb-4">
                            <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skills</label>
                            <select name="skills[]" id="skills" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="php">PHP</option>
                                <option value="javascript">JavaScript</option>
                                <option value="python">Python</option>
                                <option value="java">Java</option>
                            </select>
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
</x-app-layout>
