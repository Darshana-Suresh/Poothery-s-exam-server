<?php
  require 'config.php';

  if(isset($_POST['submit_reg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $website = $_POST['website'];
    $created = $_POST['created'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);


    $sql = "INSERT INTO admin (name,email,mobile,website,password,created) VALUES ('".$name."','".$email."','".$mobile."','".$website."','".$password."','".$created."')";

    if($conn->query($sql) === TRUE){

    }
    else{
      echo 'error';
    }

  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $globals['title']; ?></title>
    <!--css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      body{
        background-color: #00363a;
      }
      .div-box{
        padding-top: 20px;
        background-color: #428e92;
      }
      .btn-register{
        background-color: #006064;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-2"></div>
        <div class="col-12 col-md-8 div-box">
            <h2 class="text-center">REGISTER</h3><br>
              <form method="post">
                <div class="form-group">
                  <input required type="text" name="name" placeholder="Name of company" id="name" class="form-control">
                </div>
          
                <div class="form-group">
                  <input required type="email" name="email" placeholder="Enter Email Id" id="email" class="form-control">
                </div>
          
                <div class="form-group">
                  <input required type="number" name="mobile" placeholder="Enter Mobile Number" id="mobile" class="form-control">
                </div>
          
                <div class="form-group">
                  <input required type="text" name="website" placeholder="Enter Website Url" id="website" class="form-control">
                </div>
          
                <div class="form-group">
                  <input required type="password" name="password" placeholder="Enter Password" id="password" class="form-control">
                  <input required type="hidden" name="created" value="<?php echo date("d/m/y"); ?>">
                </div>
          
                <div class="form-group text-right">
                  <input required type="submit" name="submit_reg" value="REGISTER" id="submit_reg" class="btn btn-primary btn-register">
                </div>
              </form>
              <p>Already a User? <a href="login.php">login here</a></p>
        </div>
      </div>
    </div>

    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
