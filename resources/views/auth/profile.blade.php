@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        .container {
            width: 60%;
            padding: 15px 0px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
            margin-top: 30px;
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

        label #btn,label #cancel{
        top: 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Profile</h1>
        <form>
            <label>Name</label>
            <input type="text" id="name" name="name" value=" ">

            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="">

            <input type="submit" id="save" name="save" value="Save">
        </form>
        </div>
        <div class="container">
            <h1>Password</h1>
            <form>
            <label for="current-password">Current Password</label>
            <input type="password" id="current-password" name="current-password" value="">

            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" value="">

            <label for="confirm-new-password">Confirm New Password</label>
            <input type="password" id="confirm-new-password" name="confirm-new-password" value="">

            <input type="submit" id="change-password" name="change-password" value="Change password">
        </form>
    </div>
</body>
</html>
