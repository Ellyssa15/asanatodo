<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">

</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
    <i class="fas fa-bars" id="btn" style="position: fixed;"></i>
        <i class="fas fa-times" id="cancel" style="position: fixed;"></i>
    </label>
    <div class="sidebar">
        <header>Menu</header>
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-qrcode"></i>
            <span>Dashboard</span>
        </a>
        <a href="/task" class="{{ request()->is('task') ? 'active' : '' }}">
            <i class="fa fa-tasks" aria-hidden="true"></i>
            <span>Tasks</span>
        </a>
        <a href="/notepad" class="{{ request()->is('notepad') ? 'active' : '' }}">
            <i class="fa fa-sticky-note" aria-hidden="true"></i>
            <span>Notepad</span>
        </a>
        <a href="/staff" class="{{ request()->is('staff') ? 'active' : '' }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Staff</span>
        </a>
        <a href="/test" class="{{ request()->is('test') ? 'active' : '' }}">
            <i class="fa fa-pencil-square" aria-hidden="true"></i>
            <span>Test</span>
        </a>
        <a href="/" id="logout-link" onclick="return confirmLogout()" style="margin-top: 300px;">
            <i class="fa fa-power-off" aria-hidden="true"></i>
            <span>LogOut</span>
        </a>
    </div>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                document.getElementById("logout-form").submit();
            }
            return false;
        }


    </script>
</body>

</html>
