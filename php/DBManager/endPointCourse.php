<?php

class Course{
    public function showCourse($id){
        require_once 'DBManager.php';

        $db = new DBMAnager();

        $data = $db->showCourse($id);

        return $data;
    }
}

?>