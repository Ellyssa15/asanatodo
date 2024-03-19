@include('navbar')
@include('layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>

        .container {
            width: 59%;
            padding: 15px 0px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
            margin-top: 10px;
            margin-right: 100px;
            margin-left: 250px;

        }

        .container h1 {
            align-items: left;
            margin-left: 20px;
            top: 0;
            margin-bottom: 5px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: left;
            margin-left: 20px;
        }

        .container label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .container input[type="submit"] {
            width: 20%;
            padding: 10px;
            background-color: #d6adff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .container input[type="submit"]:hover {
            background-color: #e8d1ff;
        }

        button {
            width: 78px;
            padding: 8px;
            background-color: #d6adff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #e8d1ff;
        }

        label #btn,label #cancel{
        top: 0;
        }
        .card {
            background-color: #fff;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
            height: 320px;
            margin-top: 30px;
            border-radius: 5px;
        }

        .card-body {
            min-height: 1px;
            padding: 40px;
        }

        .container-wrapper {
            display: flex;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
        }

        .button-container button {
            margin-left: 5px;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="all-container">
    <div class="container-wrapper">
            <div class="container">
                <h1>Edit Profile</h1>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <label>Name</label>
                    <input type="text" id="name" name="name" value="{{ session('user')->name }}">

                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="{{ session('user')->email }}">

                    <input type="submit" id="save" name="save" value="Save">
                </form>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://ui-avatars.com/api/?name={{ session('user')->name }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=125"/>
                        <div class="mt-3"><br>
                            <h4>{{ session('user')->name }}</h4>
                            <p>{{ session('user')->email }}</p>
                            <div class="button-container">
                                <button onclick="window.location.href='message'" class="button">Message</button>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button href="/" id="logout-link" onclick="confirmLogout()">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

            <div class="container">
                <h1>Password</h1>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <label for="current-password">Current Password</label>
                    <input type="password" id="current-password" name="current_password" value="">

                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new_password" value="">

                    <label for="confirm-new-password">Confirm New Password</label>
                    <input type="password" id="confirm-new-password" name="cpassword" value="">

                    <input type="submit" id="change-password" name="change-password" value="Change password">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function confirmPassword() {
      var new_password = document.getElementById("new_password").value;
      var cpassword = document.getElementById("cpassword").value;
      var cpasswordError = document.getElementById("cpassword-error");

      if (password !== cpassword) {
        cpasswordError.textContent = "Passwords do not match. Please try again.";
        cpasswordError.style.display = "block";
        return false;
      } else {
        cpasswordError.style.display = "none";
      }

      return true;
    }

    function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                document.getElementById("logout-form").submit();
            }
            return false;
            }
    </script>
</html>
