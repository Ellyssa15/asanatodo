@include('auth.header')
<html>
    <head>
        <title>Login Page</title>
        <a href="https://www.flaticon.com/free-icons/mail" title="mail icons"></a>
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
            color: #0C3D6C;
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

          .forgot-password {
            text-align: right;
            color: #7575a3;
          }
          .forgot-password a {
            color: #7575a3;
            text-decoration: none;
          }
          .forgot-password a:hover {
            color: #4c1649;
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
    <div class="topnav" id="myTopnav">
        <section>
            <header>
                {{-- <a href="#" class="logo"><img src="logoznn.png" ></a> --}}
            </header>
        </section>
    </div>
    <br>
</div>
    <div class = "content">
    <h3>Log In</h3>
    <h4>To get started, please sign in</h4>
        <form method="post">
        <div class="input-container">
            <img src="storage/mail.png" alt="mail">
          <input type="text" name="email" placeholder="Email address" required>
        </div>
        <div class="input-container">
          <img src="storage/password.png" alt="mail">
        <input type="password" name="password" placeholder="Password"required><br>
        </div>
        <div class="forgot-password">
            <a href="forgetpassword.php">Forgot Password?</a>
        </div><br>
        <form method="post" action="{{ route('register') }}">
            @csrf
               <input type="submit" name="submit" value="Get Started">
        </form>
               <br><br>
               Doesn't has a account yet?
               <a href="register" style="text-decoration: none; color: #e14eca; font-weight: bold;"> Register now</a>

              </form>
    </div>

    </body>
</html>
