<?php
  require 'checkAdmin.php';
  require 'config.php';
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
        background-color: #7f0000;
      }
      .div-box{
        background-color: #f05545;
      }
      .card-box{
        background-color: white;
        margin-bottom: 10px;
        padding: 5px;
      }
      .btn-button{
        background-color: #b71c1c;
        color: white;
      }
      .btn-button:hover{
        background-color: #7f0000;
        color: white;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-12 col-md-2"></div>
        <div class="col-12 col-md-8 div-box">
            <div class="row" style="padding-left:10px; padding-right:10px; padding-top: 10px;">
              <a class="col-12 btn btn-button text-center" href="createTest.php" style="margin-bottom:10px; padding:10px;">CREATE NEW TEST</a>
                <?php
                    $sql = "SELECT id,title,description FROM test WHERE admin = ".$_SESSION['id'];
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            echo '<div class="col-12 card-box"><h4>'.$row['title'].'</h4><p>'.$row['description'].'</p>';
                            echo '<a href="viewTest.php?id='.$row['id'].'" class="btn btn-button"> VIEW DETAILS</a> ';
                            echo '<a href="deleteTest.php?id='.$row['id'].'" class="btn btn-button"> DELETE TEST</a>';
                            echo '</div>';
                            
                        }
                    }
                    else{
                        echo 'No data';
                    }
                ?>
            </div>
            
            <a class="btn btn-button" href="logout.php">LOGOUT</a>
        </div>
      </div>
    </div>

    <!--js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
