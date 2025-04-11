<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    @livewireStyles
</head>
<body>

    <h1>User List</h1>

    <livewire:user-list />

    <br>
    <a href="{{ route('counter') }}">
        <button>Back to Counter</button>
    </a>

    @livewireScripts
</body>
</html>
