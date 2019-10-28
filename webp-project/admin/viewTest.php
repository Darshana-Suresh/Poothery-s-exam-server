<?php
  require 'checkAdmin.php';
  require 'config.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM test WHERE id = $id";
  $result = $conn->query($sql);
  $test = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $globals['title'] ?> : View Test</title>
    <!--css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      body{
        background-color: #1c313a;
      }
      .div-box{
        background-color: #718792;
        padding-top: 20px;
        color: white;
      }
      .btn-submit{
        border-radius: 0px;
        background-color: #455a64;
        color: white;
        padding: 10px;
      }
      .btn-submit:hover{
        background-color: #1c313a;
        color: white;
      }
      .card-box{
        background-color: white;
        color: black;
        padding: 10px;
        margin: 5px;
      }
    </style>
  </head>
  <body>

    <div class="container">
        <div class="row">
          <div class="col-12 col-md-2"></div>
          <div class="col-12 col-md-8 div-box">
            <div class="row" style="padding:20px;">
              <a class="btn btn-submit col-12" href="viewTests.php"> VIEW CREATED TESTS </a>
            </div>
              <div class="row card-box">
                  <div class="col-12"><h4>TITLE : <?php echo $test['title'] ?></h4></div>
                  <div class="col-12"><h4>DURATION : <?php echo $test['duration'] ?> minutes</h4></div>
                  <div class="col-12"><h4>DESCRIPTION :</h4>
                    <p><?php echo $test['description'] ?></p>
                  </div>
                  <div class="col-12"><h4>RULES :</h4>
                    <pre style="color:white"><?php echo $test['description'] ?></pre>
                  </div>
                  <div class="col-12"><h4>MARK PER CORRECT : <?php echo $test['mark'] ?> </h4></div>
                  <div class="col-12"><h4>MARK PER INCORRECT : <?php echo $test['negative'] ?> </h4></div>
                  <div class="col-12"><h4>ADDED ON : <?php echo $test['addedOn'] ?> </h4></div>
                  <div class="col-12"><h4>START DATE : <?php echo $test['startDate'] ?> </h4></div>
                  <div class="col-12"><h4>END DATE : <?php echo $test['lastdate'] ?> </h4></div>
              </div>
              <div class="row" style="padding:20px;">
                  <a class="col-12 btn btn-submit" href="addQuestion.php?test=<?php echo $test['id']; ?>">ADD QUESTION</a>
                  <div class="col-12">
                      <br><h3>ADDED QUESTIONS : </h3>
                  </div>
              </div>
              <?php
                $testID = $_GET['id'];
                $sql = "SELECT question FROM question WHERE test = $testID";
                $i=1;
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo '<div class="row card-box">';
                  echo 'Question '.$i.' : <br>';
                  echo '<p>'.$row['question'].'</p>';
                  echo '</div>';
                  $i++;
                }
              ?>
              <a class="btn btn-dark" href="logout.php">LOGOUT</a>
          </div>
        </div>
    </div>

    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
