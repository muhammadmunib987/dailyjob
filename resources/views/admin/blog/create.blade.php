<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Blog Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Blog Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter blog title" required>
                        </div>

                        <!-- Slug -->
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
                            <input type="text" name="slug" id="slug" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter slug">
                        </div>

                        <!-- Designation Selector -->
                        <div class="mb-4">
                            <label for="designation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Designation</label>
                            <select name="designation_id" id="designation_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Select Designation</option>
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Short Description</label>
                            <textarea name="short_description" id="short_description" class="summernote"></textarea>
                        </div>

                        <!-- Blog Content -->
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                            <textarea name="content" id="content" class="summernote"></textarea>
                        </div>

                        <!-- Feature Image -->
                        <div class="mb-4">
                            <label for="feature_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Feature Image</label>
                            <input type="file" name="feature_image" id="feature_image" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300">
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tags</label>
                            <input type="text" name="tags" id="tags" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter tags, separated by commas">
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>

                

                        <!-- SEO Meta Fields -->
                        <div class="mb-4">
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>

                        <div class="mb-4">
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet" />
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
</x-app-layout>