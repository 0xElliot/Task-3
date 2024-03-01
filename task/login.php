<?php include("server.php") ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Login</h2>
        </div>
        <form method="post" action="login.php">
             <!--Display errors-->
             <?php require("errors.php")?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password">
            <div>
                <button type="submit" name="login">Login</button>
            </div>
            <div>
                <p>
                    Don't have an account yet! <a href="register.php"> sign up</a>
                </p>
            </div>
        </form>
    </body>
</html>