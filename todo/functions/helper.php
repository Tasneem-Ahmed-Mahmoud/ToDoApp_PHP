<?php 



function fethAll($table,$conn){
    $sql="SELECT * FROM $table";
$res=mysqli_query($conn,$sql);
$data=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}}


function fetch($conn,$table,$id){
    $sql="SELECT * FROM $table WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);  
$data=[];
if(mysqli_num_rows($res)>0){
   $data=mysqli_fetch_assoc($res);
}
    return $data;
}

function delete($conn,$table,$id){
    $sql="DELETE FROM $table  WHERE `id`='$id'";
    $res=mysqli_query($conn,$sql); 
    if($res){
        return true;
    }else{
        return false;
    }
}



function fethAllByStatus($table,$conn,$status){
    $sql="SELECT * FROM $table WHERE `status`='$status'";
$res=mysqli_query($conn,$sql);
$data=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}}