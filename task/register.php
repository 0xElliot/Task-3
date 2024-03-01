<?php include("server.php");?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>
        <form method="post" action="register.php">
            <!--Display errors-->
            <?php require("errors.php")?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Email">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_pass" placeholder="Confirm password">
            </div>
            <div>
                <button type="submit" name="register">Register</button>
            </div>
            <div>
                <p>
                    Already have an account? <a href="login.php"> sign in</a>
                </p>
            </div>
        </form>
    </body>
</html>