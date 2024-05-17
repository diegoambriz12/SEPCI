<?php

class member{
    public function showMember($id){
        require_once 'DBManager.php';

        $db = new DBMAnager();

        $data = $db->showEachMembers($id);

        return $data;
    }
}

?>