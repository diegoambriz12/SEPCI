<?php

    session_start();

    require 'DBManager.php';

    $db = new DBManager();

    $name = $_POST['inputName'];
    $password = $_POST['inputPassword'];

    $db -> login($name, $password);

?>