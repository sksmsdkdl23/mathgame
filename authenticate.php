<?php
    session_start();
    extract($_POST);
    if ($emails == "a@a.a" && $passwords == "aaa") {
        $_SESSION["authenticated"] = 1;
        header("Location: index.php");
    } else {
        $msg = "Invalid login credentials.";
        header("Location: login.php?msg=$msg");
    }
?>