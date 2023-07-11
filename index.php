<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login System OOP & PDO</title>
</head>
<body>
    <nav>
        <ul>
            <?php
                if(isset($_SESSION["userid"])) {
            ?>
            <li><a><?php echo $_SESSION["useruid"]; ?></a></li>
            <li><a href="includes/logout.php">Logout</a></li>
            <?php
                }
                else
                {
            ?>
                    <li>Login</a></li>
                    <li>Signup</li>
            <?php
                }
            ?>
        </ul>
    </nav>

    <h4>Sign Up</h4>
    <form action="login_system_oop/includes/signup.php" method="post">
        <input type="text" name="uid" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <input type="password" name="pwdrepeat" placeholder="repeat_password">
        <input type="email" name="email" placeholder="E-mail">
        <button type="submit" name="submit">SIGN UP</button>
    </form>
    <br>

    <h4>Login</h4>
    <form action="includes/login.php" method="post">
        <input type="text" name="uid" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <button type="submit" name="submit">LOGIN</button>
    </form>
</body>
</html>

