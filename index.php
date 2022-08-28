<?php

$host        = "localhost";
$user        = "root";
$password    = "";
$db          = "IMS";
session_start();
$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql    = "select * from login where username= '" . $username . "' AND password= '" . $password . "' ";
    $result = mysqli_query($data, $sql);
    $row    = mysqli_fetch_array($result);

    if ($row["usertype"] == "user") {
        $_SESSION["username"] = $username;
        header("location:Employee/profile.php");
    } else if ($row["usertype"] == "admin") {
        $_SESSION["username"] = $username;
        header("location:Admin-Panel/admin-dashboard.php");
    } else {
        echo '<script> alert("Wrong Info")</script>';
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to IMS</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/Akmu logo.jpg" type="img/jpg">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url(images/First_Floor.jpg) repeat center center fixed;
            background-size: cover;
            height: 100%;
            overflow: hidden;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <section class="log-in">
        <div class="login-panel">
            <img id="akmuLogo" src="images/name&logo.png" alt="image Corrupted">
            <!-- <div id="top-btn">
                    action="Admin-Panel/admin.html"
                    <button class="admin"><b>Admin</b></button>
                    <button class="employee"><b>Employee</b></button>
                </div> -->
            <h3 id="loginAlert">Login to IMS of AKMU</h3>
            <form name="login" autocomplete="off" action="#" method="post">
                <div class="input">
                    <input type="text" name="username" placeholder="username" id="user-name" value="" required>
                </div>
                <div class="input">
                    <input type="password" name="password" value="" placeholder="Password" id="password" required>
                </div>

                <div id="loginError">
                    <?php $error = 'Incorrect Info' ?>
                </div>
                <div class="input">
                    <input type="submit" class="login" value="Login">
                </div>
            </form>
            <div class="forgetPassword">
                <button id="forget-btn">Forget Password?</button>
            </div>
            <div class="footer">
                <footer>Developed By Team<br>
                    <p id="logo">KDG</p>
                </footer>
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
</body>

</html>