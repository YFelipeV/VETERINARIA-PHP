<?php
include "../config/dbConnect.php";
session_start();
$con = connection();
$race_id =$_POST["race_id"];
$category_id =$_POST["category_id"];
$gender_id =$_POST["gender_id"];

if (empty($race_id) || empty($category_id) || empty($gender_id)) {
    $_SESSION["error"] = "complete todos los campos";
    header("Location:../views/add.php");
    exit;
}
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    $upload_name = $_FILES["photo"]["name"];
    $upload_tmp = $_FILES["photo"]["tmp_name"];
    $destination = "../uploads/" . $upload_name;

    if (move_uploaded_file($upload_tmp, $destination)) {

        $sql = "INSERT INTO pets (id,race_id,category_id,photo,gender_id)

            VALUES  (null,'$race_id','$category_id','$destination','$gender_id')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            header("Location:../views/dashboard.php");
            exit;
        } else {
            $_SESSION["error"] = "error al insertar datos";
            header("Location:../html/add.php");
            exit;
        }

    } else {

        $_SESSION["error"] = "error al insertar datos";
        header("Location:../html/add.php");
        exit;

    }
} else {
    $_SESSION["error"] = "complete todos los campos";
    header("Location:../views/add.php");
    exit;
}
