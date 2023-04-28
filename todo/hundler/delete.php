<?php

include_once("../database/migration.php");
include_once("../functions/validation.php");
include_once("../functions/helper.php");
session_start();
if(checkRequestMethod('POST')){
    $id=$_POST['id'];
  
    if(delete($conn,'tasks',$id)){
       $_SESSION['success']="item deleted successfully";
    }else{
        $_SESSION['errors']="deleted faild";
    }
header('location:../index.php');
die;
}