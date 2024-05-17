<?php
    require_once 'DBManager.php';
    $db = new DBManager();
    $id = $_REQUEST['id_doc'];
    $data = $db->selectDoc($id);
    unlink('../../pdf/Documents/1/'.$data);
    $db->deleteDoc($id);
    header('location: ../../Admin/Panel/Documentos.php');

?>