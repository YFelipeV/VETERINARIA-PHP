<?php
session_start();
include "../helpers/session.php";
include "../controller/animalesController.php";

noAuth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Add</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>
<body>
<main class="add">
    <header>
        <h2>Adicionar Mascota</h2>
        <a href="dashboard.php" class="back"></a>
        <a href="../index.php" class="close"></a>
    </header>
    <figure class="photo-preview">
        <img src="../assets/imgs/photo-lg-0.svg" alt="">
    </figure>
    <form action="../controller/createController.php" method="post" enctype="multipart/form-data">
        <?php
        include("../helpers/DialogError.php");

        ?>
        <input type="text" name="name" placeholder="Nombre">
        <div class="select">
            <select name="race_id">
                <option value="">Seleccione Raza...</option>
                <?php
                $query = getAtributo("races");
                while ($rowRaza = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?= $rowRaza["id"]?>"><?= $rowRaza["name"] ?></option>
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
                    <option value="<?= $rowCategories["id"]?>"><?= $rowCategories["name"] ?></option>
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
                    <option value="<?= $rowgender["id"]?>"><?= $rowgender["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="save" type="submit">Guardar</button>
    </form>
</main>
</body>
</html>