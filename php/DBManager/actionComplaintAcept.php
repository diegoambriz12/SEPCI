<?php

require 'DBManager.php';

$db = new DBMAnager();

$id_complaint = $_REQUEST['id'];


$data = $db->updateCompliintAcept($id_complaint);
echo "<script>
    alert('Aceptado correctamente');
    window.location.href = '../../Admin/Panel/index.php';
    </script>";
?>