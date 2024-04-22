<html>

<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="css/register.css">

</head>

<body style="background-color: #151522;">
    <div>
        <img src="img/logo2.png" alt="logo"
            style="position: absolute; top: 50%; left: 35%; transform: translate(-50%, -50%); width: 40%;">
        <div class = "content"
            style="background: #fff; padding: 10px 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 300px; border-radius: 10px; margin-left:60%;">
            <h3
                style="font-size: 30px; color: black; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-bottom:0;  margin-top:0;">
                Register</h3>
            <h4 style="color: #7575a3; margin-top: 10px;">Create a new account</h4>
            <p id="cpassword-error" class="error" style="color: red;"></p>
            <form method="post" onsubmit="return confirmPassword()">
                <div class="input-container" style="position: relative; width: 100%; margin-bottom: 10px;">
                    <img src="storage/user.png" alt="user"
                        style="position: absolute; left: 5px; top: 40%; transform: translateY(-50%); width: 24px; height: 24px;">
                    <input type="text"
                        style="width: 100%; padding: 10px; padding-left: 35px; margin-bottom: 10px; border: 2px solid rgba(29, 37, 59, .2); border-radius: 4px; box-sizing: border-box;background-color: rgba(255, 255, 255, 0.2); color: black;"
                        name="name" placeholder="Username">
                </div>

                <div class="input-container" style="position: relative; width: 100%; margin-bottom: 10px;">
                    <img src="storage/mail.png" alt="mail"
                        style="position: absolute; left: 5px; top: 40%; transform: translateY(-50%); width: 24px; height: 24px;">
                    <input type="text"
                        style="width: 100%; padding: 10px; padding-left: 35px; margin-bottom: 10px; border: 2px solid rgba(29, 37, 59, .2); border-radius: 4px; box-sizing: border-box;background-color: rgba(255, 255, 255, 0.2); color: black;"
                        name="email" placeholder="Email Address">
                </div>

                <div class="input-container" style="position: relative; width: 100%; margin-bottom: 10px;">
                    <img src="storage/password.png" alt="password"
                        style="position: absolute; left: 5px; top: 40%; transform: translateY(-50%); width: 24px; height: 24px;">
                    <input type="password"
                        style="width: 100%; padding: 10px; padding-left: 35px; margin-bottom: 10px; border: 2px solid rgba(29, 37, 59, .2); border-radius: 4px; box-sizing: border-box;background-color: rgba(255, 255, 255, 0.2); color: black;"
                        id="password" name="password" placeholder="Password">
                </div>

                <div class="input-container" style="position: relative; width: 100%; margin-bottom: 10px;">
                    <img src="storage/confirm.png" alt="confirm"
                        style="position: absolute; left: 5px; top: 40%; transform: translateY(-50%); width: 24px; height: 24px;">
                    <input type="password"
                        style="width: 100%; padding: 10px; padding-left: 35px; margin-bottom: 10px; border: 2px solid rgba(29, 37, 59, .2); border-radius: 4px; box-sizing: border-box;background-color: rgba(255, 255, 255, 0.2); color: black;"
                        id="cpassword" name="cpassword" placeholder="Confirm password">

                </div>

                <input type="submit" value="Get Started">
                @csrf
            </form>
            Already have an account? <a href="/"
                style="text-decoration: none; color: #4e499e; font-weight: bold;"> Login here</a>

            </form>
        </div>
    </div>
</body>
<script>
    function confirmPassword() {
        var password = document.getElementById("password").value;
        var cpassword = document.getElementById("cpassword").value;
        var cpasswordError = document.getElementById("cpassword-error");

        if (password !== cpassword) {
            cpasswordError.textContent = "*Passwords do not match. Please try again.";
            cpasswordError.style.display = "block";
            return false;
        } else {
            cpasswordError.style.display = "none";
        }

        return true;
    }
</script>

</html>
