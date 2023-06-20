<?php
function authSession(){
    if(isset($_SESSION["usuario"])){
        header("Location: ./views/dashboard.php");
        exit;
    }

}
function noAuth(){
    if(!isset($_SESSION["usuario"])){
        header("Location: ../index.php");
        exit;
    }
}
