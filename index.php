<?php
session_start();
include "./helpers/session.php";
authSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Login</title>
    <link rel="stylesheet" href="assets/css/master.css">
</head>
<body>
<main class="login">
    <form action="./controller/authController.php" method="post">

        <?php
        include "./helpers/DialogError.php"
        ?>
        <input type="text" name="email" placeholder="Correo Electrónico">
        <input type="password" name="clave" placeholder="Contraseña">
        <button type="submit">Ingresar</button>
    </form>
</main>
</body>
</html>