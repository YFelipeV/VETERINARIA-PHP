<?php
session_start();
include "../helpers/session.php";
noAuth();
$id = $_GET["id"];
include "../controller/animalesController.php";
$row = getMascotasId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Edit</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>
<body>
<main class="edit">
    <header>
        <h2>Modificar Mascota</h2>
        <a href="dashboard.php" class="back"></a>
        <a href="../controller/logoutController.php" class="close"></a>
    </header>
    <figure class="photo-preview">
        <img src="<?= $row["photo"] ?>" alt="">
    </figure>
    <form action="../controller/udpateController.php" method="post" enctype="multipart/form-data">
        <?php include "../helpers/DialogError.php" ?>
        <input type="text" name="name" placeholder="Nombre" value="Reigner">
        <input type="hidden" name="id"  value="<?= $row["id"]?>">
        <div class="select">
            <select name="race_id">
                <option value="">Seleccione Raza...</option>
                <?php
                $query = getAtributo("races");
                while ($rowRaza = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?= $rowRaza["id"] ?>" <?= ($rowRaza["id"] == $row["race_id"] ? "selected" : "") ?> ><?= $rowRaza["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="select">
            <select name="category_id">
                <option value="">Seleccione Categoría...</option>
                <?php
                $query = getAtributo("categories");
                while ($rowCategories = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?= $rowCategories["id"] ?>" <?= ($rowCategories["id"] == $row["category_id"] ? "selected" : "") ?>><?= $rowCategories["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="file" name="photo" class="upload">Subir Foto</input>

        <div class="select">
            <select name="gender_id">
                <option value="">Seleccione Genero...</option>
                <?php
                $query = getAtributo("genders");
                while ($rowgender = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?= $rowgender["id"] ?>" <?= ($rowgender["id"] == $row["gender_id"] ? "selected" : "") ?> ><?= $rowgender["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="update" type="submit">Modificar</button>
    </form>
</main>
</body>
</html>