<?php
    include_once "../base.php";

    // 把選項次數存入資料庫
    $opt=$_POST['opt'];
    $option=$Que->find($opt);
    $option['count']++;
    $Que->save($option);

    // 把每個主題次數加總存入資料庫
    $subject=$Que->find($option['subject_id']);
    $subject['count']++;
    $Que->save($subject);

    to("../index.php?do=result&id=".$subject['id']);

?>