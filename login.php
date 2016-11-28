<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Math Game</title>
        <link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="style/style.css" type="text/css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="container">
            <header class="content">
            <div class="row">
                <div class="col-lg-offset-1">
                    <h1>Please login to enjoy our math game.</h1>
                </div>
            </div>
            <form action="authenticate.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label" for="email">Email:</label>
                    <div class="col-sm-3">
                    <input class="form-control" type="text" id="email" name="emails" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label" for="password">Password:</label>
                    <div class="col-sm-3">
                    <input class="form-control" type="password" id="password" name="passwords" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-2">
                        <input type="submit" name="submit" class="btn btn-primary form-control" value="Login" />
                    </div>
                </div>
                <?php
                    if (isset($_GET["msg"])) {
                        echo "<p class='col-sm-3 col-sm-offset-4 text-danger'>" . $_GET["msg"] . "</p>";
                    }
                ?>
            </form>
        </div>
    </body>
</html>