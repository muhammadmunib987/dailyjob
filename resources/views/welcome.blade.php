<!DOCTYPE html>
<html>
<head>
    <title>Livewire Counter</title>
    @livewireStyles
</head>
<body>

    <h1>Livewire Counter Example</h1>

    <livewire:counter />

    <br>
    <a href="{{ route('users') }}">
        <button>Go to User List</button>
    </a>

    @livewireScripts
</body>
</html>
