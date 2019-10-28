<?php
  ini_set('display_errors', 1);
  session_start();

  include 'config.php';

  if(isset($_POST['submit_login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $lastlogin = $_POST['lastlogin'];

    $sql = "SELECT id,fname,sname,password FROM users WHERE email = '$email'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0 && password_verify($pass,$row['password'])){
      echo 'logged in';
      $_SESSION['username'] = $email;
      $_SESSION['id'] = $row['id'];
      $_SESSION['fname'] = $row['fname'];
$rr= $row['fname'];
      $_SESSION['sname'] = $row['sname'];
      $_SESSION['name'] = $row['fname'].' '.$row['sname'];
      $_SESSION['type'] = 'user';

      $sql = "UPDATE users SET lastlogin = NOW() WHERE email = '$email'";
	echo $lastlogin;
      if($conn->query($sql)) echo "Success";
	else {echo "failed".$conn->connect_error; }
    }

  }

  if(isset($_SESSION['username'])){

   # header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php $globals['title'] ?></title>
    <!--css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>

      <div id="login">
          <h3 class="text-center text-white pt-5"></h3>
          <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                      <div id="login-box" class="col-md-12">
                          <form id="login-form" class="form" action="login.php" method="post">
                              <h3 class="text-center text-info">LOGIN</h3>
                              <div class="form-group">
                                  <label for="email" class="text-info">Email:</label><br>
                                  <input type="email" name="email" id="email" class="form-control input rounded-0">
                              </div>
                              <div class="form-group">
                                  <label for="password" class="text-info">Password:</label><br>
                                  <input type="password" name="password" id="password" class="form-control input rounded-0">
                              </div>
                              <div class="form-group"><br>
                                  <input required type="hidden" name="lastlogin" value="<?php echo date("Y-m-d h:i:sa"); ?>">
                                  <input type="submit" name="submit_login" class="btn btn-info btn-md" value="submit">
                              </div>
                              <div id="register-link" class="text-right">
                                  <a href="register.php" class="text-info">Register here</a>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>



    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
