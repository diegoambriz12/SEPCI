<?php

    require_once 'DBManager.php';

    $db = new DBMAnager();

    $data = $db->showAboutUs();

    //header('../../Admin/Panel/QuienesSomos.php');

?>