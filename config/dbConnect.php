<?php


if (!function_exists('connection')) {
    function connection()
    {
        $con = mysqli_connect("localhost", "root", "", "prueba1");
        return $con;
    }

}
