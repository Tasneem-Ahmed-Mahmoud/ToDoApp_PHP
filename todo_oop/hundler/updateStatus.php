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




if($validation->checkRequestMethod('POST')){
    //     print_r($_POST);
    // die;
    foreach($_POST as $key =>$value){
        $$key=$validation-> sanitizeInput($value);
    }

if($status == "on"){
    $status="completed";
}else{
    $status="active";
}

$res= $db->updateOneAttribute($conn,"tasks","status",$status,$id);
   
  
    if($res){
        $session->setSession("success","task successfully updated ");
     
        
    }else{
        $session->setSession("errors","error: not updated");
      
    }
    
    $validation->redirect("../index.php");
   


}