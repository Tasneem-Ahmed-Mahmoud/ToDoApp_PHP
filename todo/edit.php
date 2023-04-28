<?php   session_start();

include_once("./database/migration.php");
include_once("./functions/helper.php");
$name="";
if(isset($_REQUEST['id'])){
 
  $task=fetch($conn,"tasks",$_REQUEST['id']);
  $name=$task["name"];
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
          <a class="btn btn-primary m-2" href="index.php">Go Back</a>
          <form  action="./hundler/update.php"  method="post" class="d-flex justify-content-center align-items-center mb-4">
              <div class="form-outline flex-fill">

       <input type="text" hidden name="id" value="<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'];}?>">
                <input type="text" id="form2" class="form-control" name="name" value="<?= $name?>" />
                <!-- <input type="text" hidden name="status" value="a"> -->
                <!-- <label class="form-label" for="form2">New task...</label> -->
 
              </div>
              <button type="submit" class="btn btn-info ms-2">Update</button>
            </form>

          


              </div>
             
             
          

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>