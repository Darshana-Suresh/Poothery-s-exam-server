<?php
    require 'checklogin.php';
    include 'config.php';
    
    $test = $_GET['test'];
    $userId = $_SESSION['id'];

    $sql = "SELECT attempted from registered WHERE test = $test AND user = $userId";
    $result = $conn->query($sql);
    $ttt = $result->fetch_assoc();
    if($ttt['attempted'] == 1){
        header("Location: viewResult.php?test=$test");
    }

    $sql = "SELECT * FROM question WHERE test = ".$_GET['test'];
    $questions = $conn->query($sql);
    $total=0;
    $sqlt = "UPDATE registered SET attempted = 1 WHERE test = $test AND user = $userId";
    $conn->query($sqlt);

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

        <script>
             <?php 
            $sql2 = "SELECT duration FROM test WHERE id = $test";
            $resulttt = $conn->query($sql2);
            $ttttttttt = $resulttt->fetch_assoc();
            $varrrr = (int)$ttttttttt['duration'];
            $varrrr*=60;
            //var_dump($varrrr);
            echo 'var count = '.$varrrr.';';
        ?>
        //var count = 70;
        var interval = setInterval(function(){
            var min = Math.floor(count/60);
            var sec = count%60;
          document.getElementById('min').innerHTML=min;
          document.getElementById('sec').innerHTML=sec;
          count--;
          if(count === 60){
            alert("You've one minute left after which answers will be automatically submitted.");
          }
          if (count === 0){
            clearInterval(interval);
            document.getElementById('formmeee').submit();
            // or...
            alert("You're out of time!");
          }
        }, 1000);
        
        
        </script>

</head>

<body onload="countdown();">
<?php
include 'navbar.php';
 ?>

    <div class="container">
    <div class="row">
        <div class="col-12"><br><br></div>
        <div class="col-12 col-md-3 " style="background-color:white; margin-right: 5px;">
            <div class="row card-box">
                    <div id="count">Time Left : <span id="min"> </span> : <span id="sec"></span></div>
            </div>
            <?php
                $i = 1;
                $t1 = $conn->query($sql);
                echo '<div class="row card-box">';
                    while($row = $t1->fetch_assoc()){
                        $total++;
                        echo '<div style="margin:2px;" class="col-2 btn btn-qno" onclick="display(\'qes'.$i.'\')"> '.$i.' </div> ';
                        $i++;
                    }
                echo '</div>';
            ?>
        </div>
        <div class="col-12 col-md-8 parent" style="background-color:white;">
        <div class="row">
        </div>
            <form id="formmeee" method="POST" action="viewResult.php?test=<?php echo $_GET['test']?>">
                    
                            <?php
                                $i = 1;
                                $tt = $questions;
                                while($row = $tt->fetch_assoc()){
                                    echo '<div hidden class="row card-box" id="qes'.$i.'">';
                                    $pre = $i - 1;
                                    $next = $i + 1;
                                    if($pre === 0){
                                        $pre = $total;
                                    }
                                    if($next > $total){
                                        $next = 1;
                                    }
                                    echo '<div class="col-12 alert alert-warning">DO NOT REFRESH PAGE</div>';
                                    echo '<span style="margin:2px;" class="btn btn-prev" onclick="display(\'qes'.$pre.'\')">previous</span> ';
                                    echo '<span style="margin:2px;" class="btn btn-next" onclick="display(\'qes'.$next.'\')">next</span> ';
                                    echo '<input style="margin:2px;" type="submit" class="btn btn-finish-test" value="FINISH TEST">';
                                    echo '<div class="col-12">';
                                    echo '<p>Question '.$i.' : </p>';
                                    echo '<p>'.$row['question'].'</p>';
                                    if(!empty($row['qimg'])){
                                        echo '<img src="admin/'.$row['qimg'].'" class="img-fluid">';
                                    }
                                    echo '<hr style="background-color:#1e88e5;"></div>';
                                    echo '<div class="col-12">';
                                    echo '<input type="radio" name="ans['.$row['id'].']" value="1">';
                                    echo $row['op1'].'<br>';
                                    if(!empty($row['img1'])){
                                        echo '<img src="admin/'.$row['img1'].'" class="img-fluid"><br>';
                                    }
                                    echo '<input type="radio" name="ans['.$row['id'].']" value="2">';
                                    echo $row['op2'].'<br>';
                                    if(!empty($row['img2'])){
                                        echo '<img src="admin/'.$row['img2'].'" class="img-fluid"><br>';
                                    }
                                    echo '<input type="radio" name="ans['.$row['id'].']" value="3">';
                                    echo $row['op3'].'<br>';
                                    if(!empty($row['img3'])){
                                        echo '<img src="admin/'.$row['img3'].'" class="img-fluid"><br>';
                                    }
                                    echo '<input type="radio" name="ans['.$row['id'].']" value="4">';
                                    echo $row['op4'].'<br>';
                                    if(!empty($row['img4'])){
                                        echo '<img src="admin/'.$row['img4'].'" class="img-fluid"><br>';
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                    $i++;
                                }
                            ?>
                        
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

    <script>
        function clear(){
            <?php 
                $t2 = $conn->query($sql);
                $i = 1;
                while($row = $t2->fetch_assoc()){
                    echo 'document.getElementById(\'qes'.$i.'\').hidden = true;';
                    $i++;
                }
            ?>
        }
        function display(x){
            clear();
            var ele = document.getElementById(x);
            ele.hidden = false;
        }

        window.onload=display('qes1');

       
    </script>

</body>

</html>