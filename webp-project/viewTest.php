<?php
    require 'checklogin.php';
    include 'config.php';

    $sql = "SELECT * FROM test WHERE id = ".$_GET['id'];
    $result = $conn->query($sql);
    $test = $result->fetch_assoc();

    $adminID = $test['admin'];
    
    $sql = "SELECT id,name FROM admin WHERE id = $adminID";
    $result = $conn->query($sql);
    $admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php $globals['title']; ?></title>
  <!--css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  include 'navbar.php';
  ?>
  <div class="title-box">
    <h3 class="text-center">TEST DETAILS</h3>
  </div>
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-2"></div>
      <div class="col-12 col-md-8 card-box">
        <div class="row">

        </div>
        <div class="row">
          <div class="col-12">
            <h4>TITLE : <?php echo $test['title'] ?></h4>
          </div>
          <div class="col-12">
            <h4>DURATION : <?php echo $test['duration'] ?> minutes</h4>
          </div>
          <div class="col-12">
            <h4>DESCRIPTION :</h4>
            <p><?php echo $test['description'] ?></p>
          </div>
          <div class="col-12">
            <h4>RULES :</h4>
            <pre style="color:white"><?php echo $test['description'] ?></pre>
          </div>
          <div class="col-12">
            <h4>MARK PER CORRECT : <?php echo $test['mark'] ?> </h4>
          </div>
          <div class="col-12">
            <h4>MARK PER INCORRECT : <?php echo $test['negative'] ?> </h4>
          </div>
          <div class="col-12">
            <h4>ADDED ON : <?php echo $test['addedOn'] ?> </h4>
          </div>
          <div class="col-12">
            <h4>START DATE : <?php echo $test['startDate'] ?> </h4>
          </div>
          <div class="col-12">
            <h4>END DATE : <?php echo $test['lastdate'] ?> </h4>
          </div>
        </div>

        <div class="row">

          <?php
                      $testt = $test['id'];
                      $userr = $_SESSION['id'];
                      $sql = "SELECT id,attempted FROM registered WHERE user = $userr AND test = $testt";
                      $tempr = $conn->query($sql);
                      if($tempr->num_rows > 0){
                          $ttttt = $tempr->fetch_assoc();
                          if($ttttt['attempted'] == 1){
                              echo '<a class="btn btn-link">Already attempted</a> <a class="btn btn-danger" style="color:white" href="viewResult.php?test='.$test['id'].'">View Results</a>';
                          }
                          else{
                              echo '<a class="btn btn-deregister" href="testDeRegister.php?test='.$test['id'].'&id='.$ttttt['id'].'">DEREGISTER</a>';
                              echo '&nbsp;<a class="btn btn-start" href="test.php?test='.$test['id'].'">START TEST</a>';
                          }
                      }
                      else{
                          echo '<a class="btn btn-register" href="testRegister.php?test='.$test['id'].'&user='.$_SESSION['id'].'">register for test</a>';
                      }
                    ?>
          &nbsp;<a class="btn btn-back" href="index.php">GO BACK</a>
        </div>
      </div>
    </div>


  </div>



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