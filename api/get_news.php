<?php
include_once "../base.php";

$id=$_GET['id'];


$news=$News->find($id);

echo $news['text'];
//將text的內容重回前端顯示
?>