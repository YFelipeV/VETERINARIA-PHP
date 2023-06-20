<?php

session_start();

include "../config/dbConnect.php";
$con = connection();
$email = $_POST["email"];
$clave = $_POST["clave"];
$sql = "SELECT * FROM users WHERE email='$email'";

if (empty($email) || empty($clave)) {
    $_SESSION["error"] = "complete todos los campos";
    header("Location: ../index.php");
    exit;
}
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) === 1) {
    $row = mysqli_fetch_assoc($query);
    $pass = password_verify($clave, $row["clave"]);
    if (!$pass) {
        $_SESSION["error"] = "usuario o contraseña incorrectos";
        header("Location: ../index.php");

        exit;
    } else {
        $_SESSION["usuario"] = $row["email"];
        header("Location: ../views/dashboard.php");
    }
} else {
    $_SESSION["error"] = "usuario o contraseña incorrectos";
    header("Location: ../index.php");

    exit;
}


