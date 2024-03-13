@include('auth.header')
<html>
    <head>
        <title>Register Page</title>

        <style>
          body {
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
            background-color: #151522;
            color: black;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          }
          h3 {
              font-size: 30px;
              color: black;
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          }
          h4 {
              color: #7575a3;
          }
          .content {
            background: #fff;
            padding: 20px 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 300px;
            margin: 120px auto;
            border-radius: 10px;
          }
          .content input[type="text"], .content input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid rgba(29, 37, 59, .2);
            border-radius: 4px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.2);
            color: black;
          }
          .content input[type="submit"] {
            background-color: white;
            cursor: pointer;
            height: 40px;
            width: 300px;
            background: #e14eca;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 20px;
          }
          .content input[type="submit"]:hover {
            background-color: #a03c91;
          }
          .input-container {
            position: relative;
            width: 100%;
            margin-bottom: 10px;
          }
          .input-container input[type="text"] {
            padding-left: 30px;
          }
          .input-container input[type="password"] {
            padding-left: 30px;
          }
          .input-container img {
            position: absolute;
            left: 5px;
            top: 40%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
          }
        </style>
    </head>
    <body>

    </div>
    <div class="content">
    <h3>Register</h3>
    <form method="post" onsubmit="return alertName()">
    <div class="input-container">
          <img src="storage/user.png" alt="user">
      <input type="text" name="name" placeholder="Full Name">
    </div>
    <div class="input-container">
          <img src="storage/mail.png" alt="mail">
      <input type="text" name="email" placeholder="Email Address">
    </div>
    <div class="input-container">
          <img src="storage/password.png" alt="password">
      <input type="password" name="password" placeholder="Password">
</div>
<div class="input-container">
          <img src="storage/confirm.png" alt="confirm">
      <input type="password" name="cpassword" placeholder="Confirm password">
</div>
<form method="post" action="{{ route('register') }}">
    @csrf
      <input type="submit" name="add" value="Get Started">
</form>
      <br><br>
      Already have an account? <a href="login.php" style="text-decoration: none; color: #e14eca; font-weight: bold;"> Login here</a>
    </form>
  </div>
    </body>
</html>
