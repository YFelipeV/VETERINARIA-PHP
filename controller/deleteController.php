<?php
include "../config/dbConnect.php";
$con=connection();
$id=$_GET["id"];
$sql="DELETE FROM pets WHERE id='$id'";
$query=mysqli_query($con , $sql);
header("Location: ../views/dashboard.php");
exit;
