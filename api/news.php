<!-- 複製del_user改8.$News->del($id); -->
<?php
include_once "../base.php";
//    因為有隱藏ID所以每筆ID資料都有
    foreach($_POST['id'] as $id){
        // 判斷傳來的刪除ID是否存在，並且用每筆ID核對傳來的刪除ID，來執行刪除，再存入資料庫
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        
    }else{
        //如果沒有刪除資料，在看顯示哪筆資料
        $row=$News->find($id);
        
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($row);
    }

    to("../back.php?do=news");

    }
?>