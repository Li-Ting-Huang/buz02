<?php
include_once "../base.php";
// 因為$GET['type']為中文，但資料庫type為數字，
// 所以宣告一個陣列中文設為數字
$array=["健康新知"=>"1","菸害防制"=>"2","癌症防治"=>"3","慢性病防治"=>"4"];
// 右到左，先拿到中文轉成數字 ->在存成$type
$type=$array[$_GET['type']];

// 再將轉好的變數$type存入資料庫
$rows=$News->all(['type'=>$type]);

foreach($rows as $row){
    echo "<a href='javascript:getNews({$row['id']})' style='display:block'>";
    // style='display:block'分行
    // javascript:getNews({$row['id']}，執行程式
    // 看08-01-02:33
    echo $row['title'];
    echo "</a>";
}
?>