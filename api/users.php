<?php
include_once "../base.php";

// 顯示所有的USER
$users=$User->all();
foreach($users as $user){
    echo "<tr>";
    echo "<td>{$user['acc']}</td>";
    echo "<td>".
    str_repeat("*",strlen($user['pw']))
    ."</td>";
    echo "<td>";
    echo "<input type='checkbox' name='del[]' value='{$user['id']}'>";
    echo "</td>";
    echo "</tr>";
}
?>