<?php
session_start();
include "../helpers/session.php";
noAuth();
include "../controller/animalesController.php";
$query = getMascotas();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Dashboard</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>
<body>
<main class="dashboard">
    <header>
        <h2>Administrar Mascotas</h2>
        <a href="../controller/logoutController.php" class="close"></a>
    </header>
    <a href="add.php" class="add"></a>
    <table>
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td>
                    <figure class="photo">
                        <img src="<?= $row["photo"] ?>" alt="">
                    </figure>
                    <div class="info">
                        <h3>karsten</h3>
                        <h4><?= $row["raza"] ?></h4>
                    </div>
                    <div class="controls">
                        <a href="show.php?id=<?= $row["id"] ?>" class="show"></a>
                        <a href="edit.php?id=<?= $row["id"] ?>" class="edit"></a>
                        <a href="../controller/deleteController.php?id=<?= $row["id"] ?>" class="delete"></a>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>
</main>
</body>
</html>