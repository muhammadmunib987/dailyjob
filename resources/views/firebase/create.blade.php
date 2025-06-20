<form method="POST" action="{{ url('firebase/store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required />
    <input type="email" name="email" placeholder="Email" required />
    <button type="submit">Create User</button>
</form>
