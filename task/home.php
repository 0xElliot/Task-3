<?php include("server.php");?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Home page</h2>
        </div>
        <div class="form content" id="content">
            <?php if(isset($_SESSION["seccess"])):?>
                <div class="error seccess">
                    <h3>
                        <?php
                            echo $_SESSION["seccess"];
                            unset($_SESSION["seccess"]);
                        ?>
                    </h3>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION["username"])): ?>
                <p>Welcome <strong><?php echo $_SESSION["username"];?></strong></p>
                <p><a href="home.php?logout='1'" style="color:red;">Logout</a></p>
            <?php endif; ?>
        </div>
        <br>
        <div class="form content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <h3>Add Task:</h3>
            </div>
                <div>
                    <input type="text" name="task">
                </div>
                <div>
                    <input type="submit" name="add" value="Add">
                </div>
            </form>
            <div id="taskList">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task'])) {
            // Get task from the form
            $task = $_POST['task'];

            // Insert task into the database
            $sql2 = "INSERT INTO tasks (task_name) VALUES ('$task')";
            mysqli_query($db, $sql2);
        }

        // Retrieve tasks from the database
        $sql2 = "SELECT (task_name) FROM tasks";
        $result = $db->query($sql2);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["task_name"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No tasks found</p>";
        }

        // Close database connection
        $db->close();
        ?>
    </div>
    </div>


    </body>
</html>