<?php

include 'DBManager.php';

$db = new DBManager();


    $titulo = $_POST['titulo'];
    
    $id = $_POST['idDoc'];
    $video = $_POST['video'];

    $limite_kb = 20000;
    
    if($_FILES["archivo"]["error"] !== UPLOAD_ERR_NO_FILE){
        if($_FILES["archivo"]["type"]=="application/pdf" && $_FILES["archivo"]["size"] <= $limite_kb*1024){
        $rootCM = '../../pdf/Documents/1/'.$_FILES["archivo"]["name"];
        if(!file_exists($rootCM)){
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"],$rootCM);
            if($resultado){ // Si la funcion @move_uploaded_file copio exitosamente la imagen procede a guardar la ruta y los datos en la base de datos
                $oldDoc = $db -> selectDoc($id);
                unlink('../../pdf/Documents/'.$oldDoc); //
                $db -> updateDoc($id, '1/'.$_FILES['archivo']['name'], $titulo);;
                 header('location: ../../Admin/Panel/Documentos.php');
             }
             else{
                 echo "No se guardo el archivo";
             } 
            
        }else{
            echo "Archivo ya existe";
        }
    }
    else{
        echo "Archivo no permitido o pesado";
    }
    }else{
        $valores = explode('=', $video);
        $videoID = $valores[1];

        $db -> updateDocVideo($id, $titulo, $videoID);
        header('location: ../../Admin/Panel/Documentos.php');
    }

?>