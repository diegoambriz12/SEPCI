<?php

//require 'DBManager.php';

//$db = new DBMAnager();

$info = $_POST['descripcion'];

if (isset($_FILES['archivo']) && !empty($_FILES['archivo']['tmp_name'])) {
    if (is_uploaded_file($_FILES['archivo']['tmp_name']) && $_FILES['archivo']["error"] === 0) {
        $limite_kb = 20000;
        $rutaArchivo = $db->showFileAboutUs();
        if (!unlink('../../pdf/About Us'.'/'.$rutaArchivo)) { // Elimina el contenido de la carpeta donde esta la imagen
            echo "no se elimino";
        }
        if ($_FILES["archivo"]["type"]=="application/pdf" && $_FILES["archivo"]["size"] <= $limite_kb * 1024) { //se verifica que el archivo ingresado sea el permitido y que no exceda el limite de peso
            $ruta = '../../pdf/About Us/1'.'/'.$_FILES['archivo']['name'];
            if (!file_exists($ruta)) { // se copia la imagen a la ruta si esta imagen no existe, si ya hay una imagen repetida no deja volver a sunbirla
                echo $ruta;
                $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
                if ($resultado) { // Si la funcion @move_uploaded_file copio exitosamente el archivo procede a guardar la ruta y los datos en la base de datos
                    $db->updateAboutUs(1, $info, '1'.'/'.$_FILES['archivo']['name']);
                    header('location: ../../Admin/Panel/QuienesSomos.php');
                } else {
                    echo "No se guardo imagen";
                }
            } else {
                echo "La imagen que intenta guardar ya existe";
            }
        } else {
            echo "Imagen no permitida o pesada";
        }
    }
} else {
    $db->updateAboutUsTwo(1,$info);
    header('location: ../../Admin/Panel/QuienesSomos.php');
}

?>