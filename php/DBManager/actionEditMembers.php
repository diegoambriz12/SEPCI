<?php

    require 'DBManager.php';

    $db = new DBMAnager();

    $id = $_REQUEST['id'];
    $name = $_POST['name'];
    $middle_name = $_POST['middle'];
    $last_name = $_POST['last'];
    $mail = $_POST['mail'];

    $img_permitidas = array("image/jpeg","image/jpg","image/png");
    
    if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])) {
        if (is_uploaded_file($_FILES['imagen']['tmp_name']) && $_FILES['imagen']["error"] === 0) {
            $limite_kb = 50000;
            $rutaArchivo = $db->showRootImageMember($id);
            if (!unlink('../../img/Integrantes' . '/' . $rutaArchivo)) { // Elimina el contenido de la carpeta donde esta la imagen
                echo $rutaArchivo;
            }
            if (in_array($_FILES["imagen"]["type"], $img_permitidas) && $_FILES["imagen"]["size"] <= $limite_kb * 1024) { //se verifica que el archivo ingresado sea el permitido y que no exceda el limite de peso
                $ruta = '../../img/Integrantes' . '/' . $id . '/' . $_FILES['imagen']['name'];
                if (!file_exists($ruta)) { // se copia la imagen a la ruta si esta imagen no existe, si ya hay una imagen repetida no deja volver a sunbirla
                    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                    if ($resultado) { // Si la funcion @move_uploaded_file copio exitosamente el archivo procede a guardar la ruta y los datos en la base de datos
                        $db -> updateEditMembersImage($id, $name, $middle_name, $last_name, $mail, $id.'/'.$_FILES['imagen']['name']);
                        echo "Se guardo bien la imagen";
                    } else {
                        echo "No se guardo imagen";
                    }
                } else {
                    echo "La imagen que intenta guardar ya existe";
                }
            } else {
                echo "Imagen no permitida o muy pesada";
            }
        }
    }
    else{
        $db->updateEditMembers($id, $name, $middle_name, $last_name, $mail);
    }

    header('location: ../../Admin/Panel/Miembros.php');
?>