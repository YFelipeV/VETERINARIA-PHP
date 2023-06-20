<?php
session_start();
$id=$_GET["id"];

include "../controller/animalesController.php";
$row=showMascota($id)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Show</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar Mascota</h2>
            <a href="dashboard.php" class="back"></a>
            <a href="../controller/logoutController.php" class="close"></a>
        </header>
        <figure class="photo-preview">
            <img src="<?= $row["photo"]?>" alt="">
        </figure>
        <div>
            <article class="info-name"><p>Reigner</p></article>
            <article class="info-race"><p><?= $row["raza"]?></p></article>
            <article class="info-category"><p><?= $row["categoria"]?></p></article>
            <article class="info-gender"><p><?= $row["genero"]?></p></article>
        </div>
    </main>
</body>
</html>