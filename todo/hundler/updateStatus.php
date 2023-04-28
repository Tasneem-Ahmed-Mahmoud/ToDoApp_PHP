<?php

session_start();
include_once("../database/migration.php");
include_once("../functions/validation.php");
$errors="";

if(checkRequestMethod('POST')){
    //     print_r($_POST);
    // die;
    foreach($_POST as $key =>$value){
        $$key= sanitizeInput($value);
    }

if($status == "on"){
    $status="completed";
}else{
    $status="active";
}



$sql="UPDATE  `tasks` SET `status`='$status' WHERE `id`='$id'";
// echo($sql);
// die;
$res=mysqli_query($conn,$sql);
if($res){
    $_SESSION["success"]="task successfully updated ";
    
}else{
 $_SESSION["errors"]="error: not updated";   
}

header("location:../index.php")
;
die;

}