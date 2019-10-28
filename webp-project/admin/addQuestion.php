<?php
  require 'checkAdmin.php';
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title><?php echo $globals['title'] ?></title>
  <!--css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body{
      background-color: #260e04;
    }
    .div-box{
      background-color: #7b5e57;
      padding: 10px;
    }
    .card-box{
      background-color: white;
      padding: 5px;
      margin: 5px;
    }
    .btn-submit{
      background-color: #4e342e;
      color: white;
    }
    .btn-submit:hover{
      background-color: #260e04;
      color: white;
    }
  </style>
  </head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-2"></div>
      <div class="col-12 col-md-8 div-box"><br>
        <h3 class="text-center" style="color:white;">ADD QUESTION</h3><br>
          <form method="POST" action="validateAddQuestion.php" enctype="multipart/form-data">
            <div class="card-box">
                <div class="form-group">
                    <label for="question">Question</label>
                    <textarea name="question" id="question" placeholder="Enter Question" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="qimg">Image for question (optional) </label>
                    <input type="file" name="qimg" id="qimg" class="form-control-file">
                  </div>
            </div>
            <div class="card-box">
        
            <div class="form-group">
              <label for="op1">Option 1</label>
              <textarea name="op1" id="op1" placeholder="Enter Option 1" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="img1">Image for Option 1 (optional) </label>
              <input type="file" name="img1" id="img1" class="form-control-file">
            </div>
          </div>
          <div class="card-box">
        
            <div class="form-group">
              <label for="op2">Option 2</label>
              <textarea name="op2" id="op2" placeholder="Enter Option 2" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="img2">Image for Option 2 (optional) </label>
              <input type="file" name="img2" id="img2" class="form-control-file">
            </div>
          </div>
          <div class="card-box">
            <div class="form-group">
              <label for="op3">Option 3</label>
              <textarea name="op3" id="op3" placeholder="Enter Option 3" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="img3">Image for Option 3 (optional) </label>
              <input type="file" name="img3" id="img3" class="form-control-file">
            </div>
          </div>
          <div class="card-box">
            <div class="form-group">
              <label for="op4">Option 4</label>
              <textarea name="op4" id="op4" placeholder="Enter Option 4" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="img4">Image for Option 4 (optional) </label>
              <input type="file" name="img4" id="img4" class="form-control-file">
            </div>
          </div>
          <div class="card-box">
        
            <div class="form-group">
              <label for="ans">Select Correct ans</label>
              <select name="ans" id="ans" class="form-control">
                <option value="1">option 1</option>
                <option value="2">option 2</option>
                <option value="3">option 3</option>
                <option value="4">option 4</option>
              </select>
            </div>
          </div>
        
            <div class="form-group text-right">
              <input type="hidden" name="test" value="<?php echo $_GET['test']?>">
              <input type="submit" name="submit" id="submit" value="ADD QUESTION" class="btn btn-submit">
            </div>
          </form>
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