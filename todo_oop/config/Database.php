<?php  

class Database {


    

  function   connection($host,$user,$passwrod,$name){
    $connection =  mysqli_connect($host,$user,$passwrod,$name);
    if(!$connection){
     return ("ctionection fiald") .mysqli_connect_error($connection);
    }
    return $connection ;
    }



function fethAll($conn,$table){
    $sql="SELECT * FROM $table";
$res=mysqli_query($conn,$sql);
$data=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}

}

function fetch($conn,$table,$id){
    $sql="SELECT * FROM $table WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);  
$data=[];
if(mysqli_num_rows($res)>0){
   $data=mysqli_fetch_assoc($res);
}
    return $data;
}

function updateOneAttribute($conn,$table,$attribute,$value,$id){
    $sql="UPDATE $table SET `$attribute`='$value' WHERE `id`='$id'";
    $res=mysqli_query($conn,$sql); 
    if($res){
        return true;
    }else{
        return false;
    }}


function delete($conn,$table,$id){
    $sql="DELETE FROM $table  WHERE `id`='$id'";
    $res=mysqli_query($conn,$sql); 
    if($res){
        return true;
    }else{
        return false;
    }
}


function insertTask($conn,$name,$status){
    $sql="INSERT INTO `tasks` (`name`,`status`)VALUES ('$name','$status')";
    $res=mysqli_query($conn,$sql); 
    if($res){
        return true;
    }else{
        return false;
    }
}


function filterByStatus($conn,$value){
    $sql="SELECT * FROM `tasks`WHERE `status`='$value'";
$res=mysqli_query($conn,$sql);  
$data=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
}
    return $data;
}

}









?>