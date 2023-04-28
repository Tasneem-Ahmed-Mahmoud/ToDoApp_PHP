<?php   session_start();

include_once("./database/migration.php");
include_once("./functions/helper.php");

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

          <?php if(isset($_SESSION['errors'])): ?>
<div class="alert alert-danger">
<small class="">*<?=$_SESSION["errors"]?></small>
</div>
                    <?php endif;  unset($_SESSION['errors'])?>


                    <?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-success">
<small class="">*<?=$_SESSION["success"]?></small>
</div>
                    <?php endif ; unset($_SESSION['success'])?>
          
          <form  action="./hundler/create.php"  method="post" class="d-flex justify-content-center align-items-center mb-4">
              <div class="form-outline flex-fill">

       
                <input type="text" id="form2" class="form-control" name="name" />
                <!-- <input type="text" hidden name="status" value="a"> -->
                <label class="form-label" for="form2">New task...</label>
 
              </div>
              <button type="submit" class="btn btn-info ms-2">Add</button>
            </form>

            <!-- Tabs navs -->
            <!-- <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
              <li class="nav-item" role="presentation">
                <form action="">
                <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                  aria-controls="ex1-tabs-1" aria-selected="true">All</a>
                </form>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                  aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab"
                  aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
              </li>
            </ul> -->
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
              <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                aria-labelledby="ex1-tab-1">
                <ul class="list-group mb-0">
                  
<?php
  $tasks=fethAll("tasks",$conn);
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