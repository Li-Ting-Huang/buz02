<!-- 複製del_user改8.$News->del($id); -->
<?php
include_once "../base.php";
// 把ID的資料送到後台
if(!empty($_POST['del'])){
    foreach($_POST['del'] as $id){
        // $id是每個使用者的id
        $News->del($id);
    }
}
// 看到0729-06:10:50

?>