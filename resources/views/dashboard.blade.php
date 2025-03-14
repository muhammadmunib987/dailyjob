<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full border-collapse border border-gray-200 dark:border-gray-600">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Message</th>
                                <th class="border px-4 py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="border px-4 py-2">{{ $contact->id }}</td>
                                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($contact->message, 50) }}</td>
                                    <td class="border px-4 py-2">{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
