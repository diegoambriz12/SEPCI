<?php

    require_once 'DBManager.php';

    $db = new DBMAnager();

    $data = $db->showMembers();

?>