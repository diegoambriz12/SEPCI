<?php

    require 'DBManager.php';
    $id = $_REQUEST['id_curso'];

    $db = new DBMAnager();

    $rutaIcono = $db->showCouseIcon($id);
    $rutaArchivo = $db->showCourseFile($id);
    unlink('../../pdf/Courses'.'/'.$rutaIcono);
    unlink('../../pdf/Courses'.'/'.$rutaArchivo);

    $db->deleteCourse($id);
    

    header('location: ../../Admin/Panel/Cursos.php');

?>