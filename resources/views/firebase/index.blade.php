<!DOCTYPE html>
<html>
<head>
    <title>Firebase Users</title>
</head>
<body>
    <h2>Users</h2>

    <a href="{{ url('firebase/create') }}">Create New User</a> |
    <a href="{{ url('firebase/interests/create') }}">Assign Interests</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Interests</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $key => $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user['name'] ?? 'N/A' }}</td>
                    <td>{{ $user['email'] ?? 'N/A' }}</td>
                    <td>
                        @php
                            $interests = app(\App\Services\FirebaseService::class)
                                ->getDatabase()
                                ->getReference("user_interests/{$key}")
                                ->getValue();
                        @endphp

                        @if(!empty($interests))
                            {{ is_array($interests) ? implode(', ', $interests) : $interests }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('firebase/edit/'.$key) }}">Edit</a> |
                        <form action="{{ url('firebase/delete/'.$key) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
