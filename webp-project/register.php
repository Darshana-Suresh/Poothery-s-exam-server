<?php
    require 'config.php';
    $flag = false;
    if(isset($_POST['submit_reg'])){
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $college = $_POST['college'];
        $cgpa = $_POST['cgpa'];
        $created = $_POST['created'];
	$id="1";
	
        $sql = "INSERT INTO users (id,fname,sname,email,mobile,dob,password,college,cgpa,created) VALUES ('$id','$fname','$sname','$email','$mobile','$dob','$password','$college','$cgpa','$created')";

        
        if($conn->query($sql) === TRUE){
            $flag = true;
        }
        else{
          echo 'error';
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $globals['title']; ?> : Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    </head>

<body>
    <?php require 'navbar.php' ?>

    <form method="POST">
        <div class="container">
                <div class="row">
                    <div class="col-12">
                        <br><br>
                        <h3 class="text-center">REGISTRATION</h3>
                    </div>
                    <?php 
                    if($flag === true){
                        echo '<div class="col-12 col-md-2"></div><div class="text-center col-8 alert alert-success" role="alert">
                        Resigstration Success
                      </div><div class="col-12 col-md-2"></div>';
                    }
                    ?>
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-8 div-box">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3 style="color:white;">Student Registration</h3><br>
                                </div>
                                    <div class="form-group col-12 col-md-6">
                                        <input type="text" name="fname" id="fname" placeholder="Enter First Name" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <input type="text" name="sname" id="sname" placeholder="Enter Second Name" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="number" name="mobile" id="mobile" placeholder="Enter Mobile no" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="dob">Enter Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="text" name="college" id="college" placeholder="Enter College name" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="text" name="cgpa" id="cgpa" placeholder="Enter CGPA" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control input rounded-0">
                                    </div>
                                    <div class="form-group col-12 text-right">
                                        <input type="hidden" name="created" value="<?php echo date("d/m/y"); ?>">
                                        <input type="submit" name="submit_reg" id="submit_reg" value="create account" class="btn btn-register">
                                    </div>
                                </div>
                                <p>Already a User? <a href="login.php">login here</a></p>
                    </div>
                </div>
        </div>
        
    </form>
    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>
