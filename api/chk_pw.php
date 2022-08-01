<?php
include_once "../base.php";


$chk=$User->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if($chk){
    //帳號密碼正確留下回傳SESSION的acc帳號的紀錄，用於判別是admin後臺管理者還是一般使用者
    $_SESSION['user']=$_POST['acc'];
    echo 1;
}else{
    //帳號密碼錯誤回傳0
    echo 0;
}

?>