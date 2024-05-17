<?php
    session_start();
    $name = $_SESSION['name'];
    if(isset($_SESSION['name'])){
        return $sesion=true;
    }else{
        return $sesion=false;
    }
?>