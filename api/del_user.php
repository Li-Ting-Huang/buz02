<?php
include_once "../base.php";
// 把ID的資料送到後台
if(!empty($_POST['del'])){
    foreach($_POST['del'] as $id){
        // $id是每個使用者的id
        $User->del($id);
    }
}

?>