<?php

include 'DBManager.php';

$db = new DBManager();

if (isset($_POST['Agregar'])) {
    $titulo = $_POST['titulo'];
    
    $id = $db -> signFileInicio($titulo); 

    $limite_kb = 20000;
    if($_FILES["archivo"]["type"]=="application/pdf" && $_FILES["archivo"]["size"] <= $limite_kb*1024){
        $rootCM = '../../pdf/Inicio'.'/'.$id.'/'.$_FILES["archivo"]["name"];
        $ruta = '../../pdf/Inicio'.'/'.$id; 
        if(!file_exists($ruta)){
            mkdir($ruta);
        }
        if(!file_exists($rootCM)){
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"],$rootCM);
            if($resultado){ // Si la funcion @move_uploaded_file copio exitosamente la imagen procede a guardar la ruta y los datos en la base de datos
                $db -> updateInicio($id, $titulo, $id.'/'.$_FILES['archivo']['name']);;
                header('location: ../../Admin/Panel/EditarDocumentos.php');
            }
            else{
                echo "No se guardo archivo";
            } 
        }
    }
    else{
        echo "Archivo no permitido o pesado";
    }
}

if (isset($_POST['Editar'])) {

    $titulo = $_POST['titulo'];
    $id = $_POST['id'];

    if (isset($_FILES['archivo']) && !empty($_FILES['archivo']['tmp_name'])) {
        if (is_uploaded_file($_FILES['archivo']['tmp_name']) && $_FILES['archivo']["error"] === 0) {
            $limite_kb = 20000;
            $rutaArchivo = $db->showFileInicio($id);
            if (!unlink('../../pdf/Inicio' . '/' . $rutaArchivo)) { // Elimina el contenido de la carpeta donde esta la imagen
                echo "no se elimino";
            }
            if ($_FILES["archivo"]["type"] == "application/pdf" && $_FILES["archivo"]["size"] <= $limite_kb * 1024) { //se verifica que el archivo ingresado sea el permitido y que no exceda el limite de peso
                $ruta = '../../pdf/Inicio/1' . '/' . $_FILES['archivo']['name'];
                if (!file_exists($ruta)) { // se copia la imagen a la ruta si esta imagen no existe, si ya hay una imagen repetida no deja volver a sunbirla
                    echo $ruta;
                    $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
                    if ($resultado) { // Si la funcion @move_uploaded_file copio exitosamente el archivo procede a guardar la ruta y los datos en la base de datos
                        $db -> updateInicio($id, $titulo, $id.'/'.$_FILES['archivo']['name']);
                        header('location: ../../Admin/Panel/DocumentosIndex.php?id='.$id.'&titulo='.$titulo);
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

    deleteDir('../../pdf/Inicio'.'/'.$id);
    
    $db -> deleteFileInicio($id);

    header('location: ../../Admin/Panel/EditarDocumentos.php');
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