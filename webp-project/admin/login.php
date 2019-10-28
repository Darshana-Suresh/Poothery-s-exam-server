<?php
  ini_set('display_errors', 1);
  session_start();

  include 'config.php';

  if(isset($_POST['submit_login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $lastlogin = $_POST['lastlogin'];

    $sql = "SELECT id,password FROM admin WHERE email = '$email'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0 && password_verify($pass,$row['password'])){
      echo 'logged in';
      $_SESSION['username'] = $email;
      $_SESSION['id'] = $row['id'];
      $_SESSION['type'] = 'admin';

      $sql = "UPDATE admin SET lastlogin = '$lastlogin'";
      $conn->query($sql);
    }

  }

  if(isset($_SESSION['username'])){
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php $globals['title'] ?></title>
    <!--css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <div class="container"><br>
        <h2 class="text-center">LOGIN</h2><br>

        <form method="post">
          <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Enter email id" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
          </div>
          <div class="form-group">
            <input required type="hidden" name="lastlogin" value="<?php echo date("Y-m-d h:i:sa"); ?>">
            <input type="submit" name="submit_login" id="submit_login" value="LOGIN" class="btn btn-primary">
          </div>
        </form>
              <p>New User? <a href="register.php">register here</a></p>
</div>


    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
