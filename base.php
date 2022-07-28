<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class BD{
    protected $table;
    protected $dsn='mysql:host=localhost;chaeset=utf8;dbname=wb02';
    protected $pdo;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo= new PDO($this->dsn,'root','');
    }
    
/*
1.新增insert() insert from table
2.更新update() update from table
1+2 ->save()

3.查詢all(),find() select from table
4.刪除del() delete from table
5.計算max(),min(),count(),avg()->math() select max() from table
// */
//     ($array)//特定欄位條件的多筆資料 
//     ($sql)//只有額外條件的多筆資料
//     ($array,$sql)//特定欄位條件的多筆資料又有額外條件...where....limit
//     ()//整筆資料
function all(...$arg){
    $sql="select * from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            //$sql = $sql . " where " . join(" && ",$tmp);
            $sql .= " where " . join(" && ",$tmp);
        }else{
            // $sql=$sql . $arg[0];
            $sql .= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    //echo $sql;
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
function find($arg){
$sql="select * from $this->table where";

    if(is_array($arg)){
        foreach($arg as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        //$sql = $sql . " where " . join(" && ",$tmp);
        $sql .=  join(" && ",$tmp);
    }else{
        // $sql=$sql . $arg[0];
        $sql .= " `id`='$arg'";
    }


//echo $sql;
return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function save($array){
    if(isset($array['id'])){
        //更新
        foreach($array as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        
        $sql="update $this->table set  ".join(',',$tmp)."  where `id`='{$array['id']}'";
    }else{
        $sql="insert into $this->table (`".join("`,`",array_keys($array))."`) 
                                 values('".join("','",$array)."')";
    }

    return $this->pdo->exec($sql);
}

function del($arg){
$sql="delete from $this->table where";

    if(is_array($arg)){
        foreach($arg as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        //$sql = $sql . " where " . join(" && ",$tmp);
        $sql .=  join(" && ",$tmp);
    }else{
        // $sql=$sql . $arg[0];
        $sql .= " `id`='$arg'";
    }


//echo $sql;
return $this->pdo->exec($sql);
}
function math($math,$col,...$arg){
$sql="select $math($col) from $this->table ";
if(isset($arg[0])){
    if(is_array($arg[0])){
        foreach($arg[0] as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        //$sql = $sql . " where " . join(" && ",$tmp);
        $sql .= " where " . join(" && ",$tmp);
    }else{
        // $sql=$sql . $arg[0];
        $sql .= $arg[0];
    }
}

if(isset($arg[1])){
    $sql .= $arg[1];
}

//echo $sql;
return $this->pdo->query($sql)->fetchColumn();
}
function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

}


function dd($array){
echo "<pre>";

print_r($array);
echo "</pre>";
}

function to($url){
header('location:'.$url);
}

$Total=new DB('total');


?>