    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Staff Member</title>
</head>
<body>
    <h1>Edit Staff Member</h1>

    <form action="{{ route('staff.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button type="submit">Update Staff Member</button>
    </form>

    <a href="{{ route('staff') }}">Cancel</a>
</body>
</html>
