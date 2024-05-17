<?php

include 'DBManager.php';

$db = new DBManager();

if (isset($_POST['Agregar'])) {
    $titulo = $_POST['titulo'];
    echo "Agregar";
    $id = $db -> insertImage(); 

    $limite_kb = 50000;

    $img_permitidas = array("image/jpeg","image/jpg","image/png");

    if(in_array($_FILES["archivo"]["type"], $img_permitidas) && $_FILES["archivo"]["size"] <= $limite_kb*1024){
        $rootCM = '../../img/Carrusel'.'/'.$id.'/'.$_FILES["archivo"]["name"];
        $ruta = '../../img/Carrusel'.'/'.$id; 
        if(!file_exists($ruta)){
            mkdir($ruta);
        }
        if(!file_exists($rootCM)){
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"],$rootCM);
            if($resultado){ // Si la funcion @move_uploaded_file copio exitosamente la imagen procede a guardar la ruta y los datos en la base de datos
                $db -> updateImageSlider($id, $id.'/'.$_FILES['archivo']['name']);
                header('location: ../../Admin/Panel/SliderCRUD.php');
            }
            else{
                echo "No se guardo imagen";
            } 
        }
    }
    else{
        echo "Imagen no permitida o pesada";
    }
}

if (isset($_POST['Editar'])) {

    $id = $_REQUEST['id'];

    $img_permitidas = array("image/jpeg","image/jpg","image/png");

    if (isset($_FILES['archivo']) && !empty($_FILES['archivo']['tmp_name'])) {
        if (is_uploaded_file($_FILES['archivo']['tmp_name']) && $_FILES['archivo']["error"] === 0) {
            $limite_kb = 50000;
            $rutaArchivo = $db->showRootImageSlider($id);
            if (!unlink('../../img/Carrusel' . '/' . $rutaArchivo)) { // Elimina el contenido de la carpeta donde esta la imagen
                echo "no se elimino";
            }
            if (in_array($_FILES["archivo"]["type"], $img_permitidas) && $_FILES["archivo"]["size"] <= $limite_kb * 1024) { //se verifica que el archivo ingresado sea el permitido y que no exceda el limite de peso
                $ruta = '../../img/Carrusel' . '/' . $id . '/' . $_FILES['archivo']['name'];
                if (!file_exists($ruta)) { // se copia la imagen a la ruta si esta imagen no existe, si ya hay una imagen repetida no deja volver a sunbirla
                    $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
                    if ($resultado) { // Si la funcion @move_uploaded_file copio exitosamente el archivo procede a guardar la ruta y los datos en la base de datos
                        $db -> updateInicio($id, $titulo, $id.'/'.$_FILES['archivo']['name']);
                        $db -> updateImageSlider($id, $id.'/'.$_FILES['archivo']['name']);
                        header('location: ../../Admin/Panel/SliderCRUD.php');
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
    } else {
        $db -> updateInicioTwo($id, $titulo);
        header('location: ../../Admin/Panel/DocumentosIndex.php?id='.$id.'&titulo='.$titulo);
    }
}

if(isset($_REQUEST['Eliminar'])){
    $id=$_REQUEST['id'];

    deleteDir('../../img/Carrusel'.'/'.$id);

    $db -> deleteImageSlider($id);

    header('location: ../../Admin/Panel/SliderCRUD.php');
}

function deleteDir($ruta){
    foreach(glob($ruta . "/*") as $archivos_carpeta){
        if(is_dir($archivos_carpeta)){
            deleteDir($archivos_carpeta);
        }
        else{
            unlink($archivos_carpeta);
        }
    }
    rmdir($ruta);
}

?>