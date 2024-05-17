<?php

include 'DBManager.php';

$db = new DBManager();

if (isset($_POST['name'])) {
    $fullName = $_POST['name'];
} else {
    $fullName = "";
}

if (isset($_POST['email'])) {
    $mail = $_POST['email'];
} else {
    $mail = "";
}

$telPhone = $_POST['phone'];
$denunced = $_POST['name_Denounced'];
$post = $_POST['post_Denounced'];
$succint = $_POST['succint'];
$title = $_POST['post_Denounced'];

$id = $db->insertComplaint($fullName, $mail, $telPhone, $denunced, $title, $succint);

$limite_kb = 20000;
if ($_FILES["archivo"]["type"] == "application/pdf" && $_FILES["archivo"]["size"] <= $limite_kb * 1024) {
    $rootCM = '../../pdf/Complains' . '/' . $id . '/' . $_FILES["archivo"]["name"];
    $ruta = '../../pdf/Complains' . '/' . $id;
    if (!file_exists($ruta)) {
        mkdir($ruta);
    }
    if (!file_exists($rootCM)) {
        $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $rootCM);
        if ($resultado) { // Si la funcion @move_uploaded_file copio exitosamente la imagen procede a guardar la ruta y los datos en la base de datos
            $db->updateComplaint($id . '/' . $_FILES["archivo"]["name"], $id);
            echo '<script type="text/javascript">
                alert("Su denuncia ha sido enviada, se le comunicara el estado de la denuncia realizada lo mas pronto posible");
                window.location.href="../../Buzon-de-atencion.html";
            </script>';
        } else {
            echo "No se guardo archivo";
        }
    }
} else {
    echo '<script type="text/javascript">
            alert("Su denuncia ha sido enviada, se le comunicara el estado de la denuncia realizada lo mas pronto posible");
            window.location.href="../../Buzon-de-atencion.html";
        </script>';
}

?>