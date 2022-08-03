<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=web02;";
    protected $pdo;


    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }
// all
    function all(...$arg){
        $sql="select * from $this->table ";
        
        if(isset($arg[0])){
             if(is_array($arg[0])){
                foreach($arg[0] as $key => $val){
                    $tmp[]="`$key`='$val'";
                }
                // $sql=$sql." where " . join(" && ,$tmp");
                $sql.=" where " . join(" && ",$tmp);
             }else{
                // $sql=$sql . $arg[0];
                $sql.= $arg[0];
             }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
//find
    function find($arg){
        //單筆
        $sql="select * from $this->table ";
        // 判斷是否為陣列
        if(is_array($arg)){
            //陣列
            foreach($arg as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            // 陣列
            $sql.= " where ". join(" && ",$tmp);
        }else{
            // id
            $sql .= " where `id`= '$arg'";
        
        }
        // echo $sql;
        //單筆
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    }
// save
    function save($array){
        if(isset($array['id'])){//有ID更新
            
            foreach($array as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            // updwte $this->table set `date`='2022-07-28',`name`='XXx'
            $sql="update $this->table set ".join(',',$tmp)."  where `id`='{$array['id']}'";
        }else{//沒有ID新增
            $sql="insert into $this->table (`".join("`,`",array_keys($array))."`) 
            values ('".join("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }
// del
    function del($arg){
        $sql="delete from $this->table where ";
        if(is_array($arg)){
            foreach($arg as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql .= join(" && " ,$tmp);
        }else{
            $sql .= " `id` = '$arg'";
        }
        echo $sql;
        return $this->pdo->exec($sql);

    }
//math 
    function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";
        
        if(isset($arg[0])){
             if(is_array($arg[0])){
                foreach($arg[0] as $key => $val){
                    $tmp[]="`$key`='$val'";
                }
                // $sql=$sql." where " . join(" && ,$tmp");
                $sql.=" where " . join(" && ",$tmp);
             }else{
                // $sql=$sql . $arg[0];
                $sql.= $arg[0];
             }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        // echo $sql;
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
$User=new DB('user');
$News=new DB('news');
$Que=new DB('que');

// print_r($Total->find(['date'=>'2022-08-02']));

//如果沒有SESSION以下不執行
if(!isset($_SESSION['total'])){
    // 找到當天日期
    $total=$Total->find(['date'=>date("Y-m-d")]);  
    // 連覽+1
    $total['total']=$total['total']+1;
    // 儲存資料庫
    $Total->save($total);
    
    // 增加SESSION，所以有SESION此程式不會再重新回到上面重跑
    $_SESSION['total']=$total['total'];

  
    }
   
        
?>