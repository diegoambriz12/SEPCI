<?php

require 'DBManager.php';

$db = new DBMAnager();

$id_complaint = $_REQUEST['id'];


$data = $db->updateCompliintCancel($id_complaint);
echo "<script>
    alert('Cancelado correctamente');
    window.location.href = '../../Admin/Panel/index.php';
    </script>";
?>