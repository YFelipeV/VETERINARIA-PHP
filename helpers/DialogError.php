<?php
if(isset($_SESSION["error"])){
    $error=$_SESSION["error"];

    echo"<h2 style='text-align: center'>$error</h2>";
    unset($_SESSION["error"]);
}