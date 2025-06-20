<form method="POST" action="{{ url('firebase/interests/store') }}">
    @csrf
    <label>Select User:</label>
    <select name="user_id" required>
        @foreach($users as $id => $user)
            <option value="{{ $id }}">{{ $user['name'] }}</option>
        @endforeach
    </select>

    <label>Select Interests:</label><br>
    @foreach($interests as $key => $value)
        <input type="checkbox" name="interests[]" value="{{ $value }}"> {{ $value }}<br>
    @endforeach

    <button type="submit">Save Interests</button>
</form>
