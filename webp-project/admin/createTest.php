<?php
  require 'checkAdmin.php';
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $globals['title'] ?> : Create Test</title>
    <!--css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      body{
        background-color: #1c313a;
      }
      .div-box{
        background-color: #718792;
        padding-top: 20px;
      }
      .btn-submit{
        background-color: #455a64;
      }
    </style>
  </head>
  <body>
    <br>

    <div class="container">
      <div class="row">
        <div class="col-12 col-md-2"></div>
        <div class="col-12 col-md-8 div-box">
          <h3 class="text-center" style="color:white;">CREATE TEST</h3><br>
            <form method="post" action="validateCreateTest.php">
                <div class="form-group">
                  <input type="text" name="title" id="title" placeholder="Enter title of Test" class="form-control">
                </div>
                <div class="form-group">
                  <input type="number" name="duration" id="duration" placeholder="Duration of test in minutes" class="form-control">
                </div>
                <div class="form-group">
                  <textarea name="description" id="description" placeholder="Enter Description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <textarea name="rules" id="rules" placeholder="Enter rules" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="number" id="mark" name="mark" placeholder="Enter Mark per question" class="form-control">
                </div>
                <div class="form-group">
                  <input type="number" id="negative" name="negative" placeholder="Negative marks if any" class="form-control">
                </div>
                <div class="form-group">
                  <label for="startdate">Start Date</label>
                  <input type="date" name="startdate" id="startdate" class="form-control">
                </div>
                <div class="form-group">
                  <label for="lastdate">End Date</label>
                  <input type="date" name="lastdate" id="lastdate" class="form-control">
                </div>
                <div class="form-group text-right">
                  <input type="hidden" name="admin" value="<?php echo $_SESSION['id']; ?>">
                  <input type="hidden" name="addedOn" value="<?php echo date("Y-m-d "); ?>">
                  <input type="submit" name="submit" id="submit" value="Create Test" class="btn btn-primary btn-submit">
                </div>
              </form>
        </div>
      </div>
    </div>
    
    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
