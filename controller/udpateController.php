<?php

include "../config/dbConnect.php";
include "./animalesController.php";
session_start();
$con = connection();
$id = $_POST["id"];
$race_id = $_POST["race_id"];
$category_id = $_POST["category_id"];
$gender_id = $_POST["gender_id"];
$row = getMascotasId($id);
$current = $row["photo"];


if (empty($race_id) || empty($category_id) || empty($gender_id)) {
    $_SESSION["error"] = "complete todos los campos";
    header("Location:../views/add.php");
    exit;
}
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    $upload_name = $_FILES["photo"]["name"];
    $upload_tmp = $_FILES["photo"]["tmp_name"];
    $destination = "../uploads/" . $upload_name;
    move_uploaded_file($upload_tmp, $destination);
} else {
    $destination = $current;
}
$sql = "UPDATE  pets  SET race_id='$race_id',category_id='$category_id',photo='$destination',gender_id='$gender_id'

            WHERE id='$id'";
$query = mysqli_query($con, $sql);
if ($query) {
    header("Location:../views/dashboard.php");
    exit;
} else {
    $_SESSION["error"] = "error al insertar datos";
    header("Location:../html/add.php");
    exit;
}





