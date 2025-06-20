<form method="POST" action="{{ url('firebase/update/'.$id) }}">
    @csrf
    <input type="text" name="name" value="{{ $user['name'] ?? '' }}" required />
    <input type="email" name="email" value="{{ $user['email'] ?? '' }}" required />
    <button type="submit">Update User</button>
</form>
