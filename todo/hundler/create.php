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
    // validate  name
   if(!requiredVal($name)){
    $errors="please type the name ";
}elseif(!minVal($name,2)){
    $errors=" name  must be at least 2 char";
}elseif(!maxVal($name,20)){
    $errors=" name  must be less than 20 char";
}else if(is_uniqe('tasks','name',$name,$conn)){
    $errors="this value aready exist ";
}



if($errors==""){
    $sql="INSERT INTO `tasks`(`name`) VALUES('$name')";
    // echo($sql);
    // die;
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION["success"]="task successfully inserted ";
        
    }else{
     $_SESSION["errors"]="error: not inserted";   
    }
    
    }else{
        $_SESSION["errors"]=$errors;
    }
   
    header("location:../index.php");
    // print_r($_SESSION);
    }
    