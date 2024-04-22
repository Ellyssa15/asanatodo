@include('sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/trash.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/task.css">
    <link rel="stylesheet" href="css/complete.css">
    <link rel="stylesheet" href="css/notepad.css">
</head>

<body>
    <table
        style="margin: 0 auto; border-collapse: collapse; width: 99%; margin-top: 80px; font-weight: bold; font-size:20px;">
        <tr style="font-size: 20px;">
            <td style="border: 1px solid black; border-left: none; width: 36%; padding: 15px; text-align: left; ">Name
            </td>
            <td style="border: 1px solid black; padding: 15px; width: 33.3%; text-align: left;">Email
            </td>
            <td style="border: 1px solid black; border-right: none; padding: 15px; text-align: left;">Action</td>
        </tr>
    </table>


    <table id="staff-table" style="margin: 0 auto; border-collapse: collapse; width: 99%;">
        @foreach ($users as $user)
            @if ($user->role === 'user')
                <tr style="font-size: 18px;">
                    <td
                        style="border: 1px solid black; border-left: none; border-top: none; padding: 15px; text-align: left; width: 36%;">
                        <section style="display: flex;">
                            {{ $user->name }}
                        </section>
                    </td>
                    <td
                        style="border: 1px solid black; border-top: none; padding: 15px; width:33.3%; text-align: left;">
                        {{ $user->email }}
                    </td>
                    <td
                        style="border: 1px solid black; border-right: none; border-top: none; padding: 15px; text-align: left;">
                        <a href="editstaff" class="button type--A">Edit</a>
                        <form action="{{ route('staff.destroy', $user->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button type--D">Delete</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    <div class="container">
        <a1 href="addstaff" class="button type--C" id="addStaff">
            <div class="button__line"></div>
            <div class="button__line"></div>
            <span class="button__text">+ Add Staff</span>
        </a1>
    </div>
    <div id="addStaffModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header"></div>
            <h2 style="background-color: #fff; padding:10px; ">Add New Staff Member</h2>
            <form action="{{ route('staff.store') }}" method="post" style="margin: 10px;">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>

                <button type="submit">Create Staff Member</button>
            </form>
        </div>
    </div>
    <div class="container">
        <a1 href="editstaff" class="button type--C" id="editstaff">
            <div class="button__line"></div>
            <div class="button__line"></div>
            <span class="button__text">+ Edit Staff</span>
        </a1>
    </div>
    <div id="editStaffModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header"></div>
            <h2 style="background-color: #fff; padding:10px; ">Add New Staff Member</h2>
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
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("addStaffModal").style.display = "block";
        }
        document.getElementById('addStaff').addEventListener('click', function() {
            document.getElementById('addStaffModal').style.display = 'block';
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('addStaffModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('addStaffModal')) {
                document.getElementById('addStaffModal').style.display = 'none';
            }
        });

        function openModal() {
            document.getElementById("editStaffModal").style.display = "block";
        }
        document.getElementById('editstaff').addEventListener('click', function() {
            document.getElementById('editStaffModal').style.display = 'block';
        });

        document.getElementsByClassName('close')[1].addEventListener('click', function() {
            document.getElementById('editStaffModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('editStaffModal')) {
                document.getElementById('editStaffModal').style.display = 'none';
            }
        });
    </script>

</body>

</html>
