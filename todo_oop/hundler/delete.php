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
    $id=$_POST['id'];
  
    if($db->delete($conn,'tasks',$id)){
     
       $session->setSession("success","item deleted successfully");
     
    }else{
    
        $session->setSession("errors","deleted faild");
    }
    $validation->redirect("../index.php");
   
}