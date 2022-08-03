<?php
include_once "../base.php";

if(!empty($_POST['subject'])){
    //先將傳來的值存入
    $Que->save(['text'=>$_POST['subject'],'count'=>0,'subject_id'=>0]);
    //把最新text的ID作為subject_id
    $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];
    // 在把每筆重新存一次
    if(!empty($_POST['option'])){
        foreach($_POST['option'] as $opt){
            $Que->save(['text'=>$opt,'count'=>0,'subject_id'=>$subject_id]);
        }
    }


    
}

to("../back.php?do=que");
?>