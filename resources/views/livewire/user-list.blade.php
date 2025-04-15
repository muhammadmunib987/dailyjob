<div class="p-4 max-w-2xl mx-auto">
    <!-- Search Input -->
    <div class="mb-4">
        <input 
            type="text"
            wire:model.debounce.300ms="search"
            placeholder="Search by name or email..."
            class="w-full border border-gray-300 p-2 rounded"
        />
        <div wire:loading>Searching...</div>
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-b">Name</th>
                    <th class="px-4 py-2 text-left border-b">Email</th>
                    <th class="px-4 py-2 text-left border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr wire:key="user-{{ $user->id }}">
                        <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                        <td class="px-4 py-2 border-b">
                            <!-- Delete Button -->
                            <button wire:click="deleteUser({{ $user->id }})" 
                                    class="bg-red-600 text-white px-2 py-1 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
