<html>

<head>
    <title>Login Page</title>
    <a href="https://www.flaticon.com/free-icons/mail" title="mail icons"></a>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div>
        <img src="img/logo2.png" alt="logo"
            style="position: absolute; top: 50%; left: 35%; transform: translate(-50%, -50%); width: 40%;">
        <div class = "content"
            style="background: #fff; padding: 3px 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 300px; border-radius: 10px; margin-left:60%;">
            <h3
                style="font-size: 30px; color: black; margin-bottom:0;  margin-top:10px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                Log In</h3>
            <h4 style="color: #7575a3; margin-top: 10px; margin-bottom:10px;">To get started, please log in</h4>
            <div style="color: red; font-weight: bold; margin-bottom: 10px;">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            </div>
            <form method="post">
                <div class="input-container" style="position: relative; width: 100%; margin-bottom: 10px; margin-top: 10px;">
                    <img src="storage/mail.png" alt="mail"
                        style="position: absolute; left: 5px; top: 40%; transform: translateY(-50%); width: 24px; height: 24px;">
                    <input type="text"
                        style="width: 100%; padding: 10px; padding-left: 35px; margin-bottom: 10px; border: 2px solid rgba(29, 37, 59, .2); border-radius: 4px; box-sizing: border-box;background-color: rgba(255, 255, 255, 0.2); color: black;"
                        name="email" placeholder="Email address"required>
                </div>
                <div class="input-container" style="position: relative; width: 100%; margin-bottom: 10px;">
                    <img src="storage/password.png" alt="mail"
                        style="position: absolute; left: 5px; top: 40%; transform: translateY(-50%); width: 24px; height: 24px;">
                    <input type="password"
                        style="width: 100%; padding: 10px; padding-left: 35px; margin-bottom: 10px;border: 2px solid rgba(29, 37, 59, .2); border-radius: 4px; box-sizing: border-box;background-color: rgba(255, 255, 255, 0.2); color: black;"
                        name="password" placeholder="Password"required><br>
                </div>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <input type="submit" name="submit" value="Get Started" style="margin-bottom:10px;">
                </form>
            </form>
        </div>
    </div>

</body>

</html>
