<div class="p-4 max-w-md mx-auto space-y-4">
    <h1 class="text-xl font-bold">Counter: {{ $count }}</h1>

    <div class="space-x-2">
        <button wire:click="increment" class="px-3 py-1 bg-green-500 text-white rounded">+</button>
        <button wire:click="decrement" class="px-3 py-1 bg-red-500 text-white rounded">-</button>
    </div>

    @if (session()->has('success'))
        <div class="text-green-600 font-semibold">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4 mt-4">
        <div>
            <label class="block text-sm font-medium">Name</label>
            <input type="text" wire:model.debounce.500ms="name" class="border border-gray-300 rounded p-2 w-full" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" wire:model.debounce.500ms="email" class="border border-gray-300 rounded p-2 w-full" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
