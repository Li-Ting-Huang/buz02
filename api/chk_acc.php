<?php
include_once "../base.php";

// $acc=$_POST['acc'];

// 1.
// $chk=$User->find(['acc'=>$acc]);
// // 2.
//  if(!empty($chk)){
//     echo 1;
//  }else{
//     echo 0;
//  }

// 1+2
echo $User->math('count','id',['acc'=>$_POST['acc']]);

?>