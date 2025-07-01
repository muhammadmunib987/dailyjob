<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>Name: {{ $user->name ?? 'Guest' }}</p>
    <p>Email: {{ $user->email ?? 'N/A' }}</p>
</body>
</html>
