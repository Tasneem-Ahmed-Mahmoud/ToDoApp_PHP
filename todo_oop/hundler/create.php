<?php
include_once("../config/config.php");
include_once("../config/Database.php");
include_once("../config/Session.php");
include_once("../config/Validation.php");
$session =new Session();
$session->startSession();
$db=new Database();
$conn=$db->connection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$validation=new Validation();
$errors="";
if($validation->checkRequestMethod("POST")){
foreach($_POST as $key =>$val){
    $$key=$validation->sanitizeInput($val);
}
if(!$validation->requiredVal($name)){
    $errors="please type the name ";
}elseif(!$validation->minVal($name,2)){
    $errors=" name  must be at least 2 char";
}elseif(!$validation->maxVal($name,20)){
    $errors=" name  must be less than 20 char";
}else if($validation->is_uniqe('tasks','name',$name,$conn)){
    $errors="this value aready exist ";
}

if($errors==""){
   $res= $db->insertTask($conn,$name,"active");
   
  
    if($res){
        $session->setSession("success","task successfully inserted ");
     
        
    }else{
        $session->setSession("errors","error: not inserted");
      
    }
    
    }else{
        $_SESSION["errors"]=$errors;
    }
   $validation->redirect("../index.php");
   
    }
    



