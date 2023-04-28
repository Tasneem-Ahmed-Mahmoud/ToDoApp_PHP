<?php  

include_once("./config/config.php");
include_once("./config/Database.php");
include_once("./config/Validation.php");
include_once("./config/Session.php");
 $db=new Database();
 $session= new Session();
 $session->startSession();
 $validation=new Validation();
$conn=$db->connection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$tasks=[];
if($db->fethAll($conn,"tasks")){
  $tasks = $db->fethAll($conn,"tasks");
}

if($validation->checkRequestMethod("POST")&& isset($_POST['status'])){
  $status=$_POST["status"];

  if($status=="active"){
    $res=$db->filterByStatus($conn,$status);
    if(!empty($res)){
      $tasks = $res;
      // print_r($tasks);
      // // die;
    }
  }elseif($status=="completed"){
    $res=$db->filterByStatus($conn,$status);
    if(!empty($res)){
      $tasks = $res;
    }
  }else{
    $res= $db->fethAll($conn,"tasks");
    if(!empty($res)){
      $tasks = $res;
    }
  }



}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">

        <div class="card">
          <div class="card-body p-5">

          <?php if($session->issetSession("errors")): ?>
<div class="alert alert-danger">
<small class="">*<?=$session->getSession("errors")?></small>
</div>
                    <?php endif;  $session->destroySession("errors");?>


                    <?php if($session->issetSession("success")): ?>
<div class="alert alert-success">
<small class="">*<?=$session->getSession("success")?></small>
</div>
                    <?php endif ;  $session->destroySession("success")?>




                    
            <!-- Tabs navs -->
          

           <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
           <form action="index.php" method="Post">
           <input type="text" hidden name="status" value="all">
              <li class="nav-item" role="presentation" class="nav-item">
              <button class="nav-link" type="submit">All</button>
              </li>
              </form>
              <form action="index.php" method="Post" class="nav-item">
<input type="text" hidden name="status" value="active">
              <li class="nav-item" role="presentation">
                
                  <button class="nav-link" type="submit">Active</button>
              </li>
              </form>
              <form action="index.php" method="Post" class="nav-item">
              <input type="text" hidden name="status" value="completed">
              <li class="nav-item" role="presentation">
              <button class="nav-link" type="submit">Completed</button>
              </li>
              </form>
            </ul>
          
            <!-- Tabs navs -->

          
          <form  action="./hundler/create.php"  method="post" class="d-flex justify-content-center align-items-center mb-4">
              <div class="form-outline flex-fill">

       
                <input type="text" id="form2" class="form-control" name="name" />
                <!-- <input type="text" hidden name="status" value="a"> -->
                <label class="form-label" for="form2">New task...</label>
 
              </div>
              <button type="submit" class="btn btn-info ms-2">Add</button>
            </form>

            <div class="tab-content" id="ex1-content">
              <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                aria-labelledby="ex1-tab-1">
                <ul class="list-group mb-0">
                  
<?php
 
if($tasks !=[]):
    foreach($tasks as $task):

?>
                  <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded justify-content-between "
                    style="background-color: #f4f6f7;">
                    <form action="./hundler/updateStatus.php" method="post" >
                   <input type="text" hidden name="id" value="<?=$task['id']?>">
                    <input name="status"  onChange="this.form.submit()" class="form-check-input me-2" type="checkbox"  aria-label="..." <?php   if($task['status']=="completed"){echo "checked";}?> />
    
                    <?php if($task['status']=="completed"):?><s><?php endif;?><?= $task['name']?>   <?php   if($task['status']=="completed"):?></s><?php endif;?>
                 
    
                </form>
            
                   
                
                  <div class="text-end d-flex ">
                    
                 <form action="./edit.php" method="post" class="pe-2">
                    <input type="text" name="id" value="<?= $task['id']?>" hidden>
              <button type="submit" class="border-0">   <i class="fa-solid fa-edit text-success"></i></button>
                 </form>
                
                 <form action="./hundler/delete.php" method="post">
                
                 <input type="text" name="id" value="<?= $task['id']?>" hidden>
                 <button type="submit" class="border-0"> <i class="fa-solid fa-trash text-danger"></i></button>

                 </form>
                
                </div>
                </li>
<?php   endforeach; endif; ?>


                </ul>
              </div>
             
             
            </div>
            <!-- Tabs content -->

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>