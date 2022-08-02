<?php
include_once "../base.php";

// $User->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']])
unset($_POST['pw2']);
$User->save($_POST);
?>