<?php




class Validation{





//redirect 
function redirectWithMessage($path,$name,$message){
    $_SESSION[$name]=$message;
    header("location:$path");
    die;
}
function redirect($path){
    header("location:$path");
    die;
}

//check request  method

function checkRequestMethod($method)
{
    if(isset($_SERVER["REQUEST_METHOD"])==$method) {
        return true;
    } else {
        return false;
    }
}

// required input
function requiredVal($input){
    if(empty($input)){
        return false;
    }else{
        return true;
    }
}
// get maxmum value for input
function  minVal($input,$lenght){
    if(strlen($input)< $lenght){
        return false;
    }
    return true;
}
// get minumum value for input
function  maxVal($input,$lenght){
    if(strlen($input)>$lenght){
        return false;
    }
    return true;
}
// filter input
function  sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}

// check uniqueness
function is_uniqe($table,$column,$value,$con){
    $sql="SELECT `$column`  FROM `$table` WHERE `$column`='$value' ";

    if(mysqli_num_rows(mysqli_query($con,$sql)) ){
      
        return true;
    }else{
        return false;
    }

}






}