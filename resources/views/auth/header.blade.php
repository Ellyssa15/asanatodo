<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/laptop.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <style>
.topnav {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.topnav a:hover {
    cursor: pointer;
}

.topnav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: row;
}

.topnav i{
    margin: 10px;
    height: 16px;
    width: 20px;
}
.topnav i::after{
    width: 25px;
}
.topnav u{
    margin: 10px;

}

.topnav ul li a {
    display: flex;
   align-items: center;
    text-decoration: none;
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
    color: #fff;
    padding: 18px 20px;
    white-space: nowrap;
}
    </style>
</head>
<body>
    <header>
    <div class="topnav">
        <ul>
            <li>
                <a href="register" ><i class="gg-laptop"></i>Register</a></li>

            <li><a href="/"><u class="gg-profile"></u>Login</a></li>
         <a href="javascript:void(0);" class="icon" onclick="myFunction()"></a>
        </ul>
        </div></header>
</body>
</html>
