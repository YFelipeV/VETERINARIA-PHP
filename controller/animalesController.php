<?php
include "../config/dbConnect.php";
function getMascotas()
{
    $con = connection();
    $sql = "SELECT p.id ,p.photo,r.name AS raza  FROM pets p JOIN races r ON p.race_id=r.id ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function showMascota($id)
{
    $con = connection();
    $sql = "SELECT p.id ,p.photo,r.name AS raza ,c.name AS categoria ,g.name AS  genero FROM pets p 
        JOIN races r ON p.race_id=r.id 
        JOIN categories c ON p.category_id = c.id
        JOIN  genders g ON p.gender_id=g.id WHERE p.id='$id'";
    $query = mysqli_query($con, $sql);
    $data=mysqli_fetch_assoc($query);

    return $data;
}

function getMascotasId($id)
{
    $con = connection();
    $sql = "SELECT * FROM pets WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    return $data;
}

function getAtributo($tabla)
{
    $con = connection();
    $sql = "SELECT * FROM $tabla ";
    $query = mysqli_query($con, $sql);
    return $query;
}
