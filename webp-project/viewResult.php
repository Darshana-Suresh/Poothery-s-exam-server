<?php
    require 'checklogin.php';
    include 'config.php';

    if(isset($_POST['ans'])){
        $ans = $_POST['ans'];
    }
    $test = $_GET['test'];

    $sql = "SELECT * FROM question WHERE test = $test";
    $result = $conn->query($sql);
    $answered = 0;
    $correct = 0;

    while($row = $result->fetch_assoc()){
        if(isset($ans[$row['id']])){
            $answered++;
            if($row['ans'] == $ans[$row['id']]){
                $correct++;
            }
        }
    }
    $sqlt = "SELECT mark,negative FROM test where id = $test";
    $result = $conn->query($sqlt);
    $test = $result->fetch_assoc();
    $wrong = $answered - $correct;
    $mark = $correct*$test['mark'] - $wrong*$test['negative'];
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <br><br>
                <h3 class="text-center">RESULTS</h3>
                <br>
            </div>
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-8 div-box">
                <div class="row card-box">
                    <div class="col-12">
                        <p>ATTEMPTED : <?php echo $answered ?></p>
                        <p>CORRECT : <?php echo $correct ?></p>
                        <p>WRONG : <?php echo $wrong ?></p>
                        <p>MARKS SCORED : <?php echo $mark ?></p>
                    </div>
                </div>
                    <?php
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        if(isset($ans[$row['id']])){
                            $answered++;
                            if($row['ans'] == $ans[$row['id']]){
                                $correct++;
                            }
                            else{
                                echo '&nbsp;<div class="row card-box">';
                                        echo '<div class="col-12">';
                                                echo '<p>'.$row['question'].'</p>';
                                                if(!empty($row['qimg'])){
                                                    echo '<img src="admin/'.$row['qimg'].'" class="img-fluid">';
                                                }
                                                echo '</div>';
                                                echo '<div class="col-12">';
                                                echo '<div '.($row['ans'] == 1 ?'class="alert alert-success"':'').' '.($ans[$row['id']] == 1 ?'class="alert alert-danger"':'').'>';
                                                        echo 'Option 1 :<br>';
                                                        echo $row['op1'].'<br>';
                                                        if(!empty($row['img1'])){
                                                            echo '<img src="admin/'.$row['img1'].'" class="img-fluid"><br>';
                                                        }
                                                echo '</div>';
                                                echo '<div '.($row['ans'] == 2 ?'class="alert alert-success"':'').' '.($ans[$row['id']] == 2 ?'class="alert alert-danger"':'').'>';
                                                        echo 'Option 2 :<br>';
                                                        echo $row['op2'].'<br>';
                                                        if(!empty($row['img2'])){
                                                            echo '<img src="admin/'.$row['img2'].'" class="img-fluid"><br>';
                                                        }
                                                echo '</div>';
                                                echo '<div '.($row['ans'] == 3 ?'class="alert alert-success"':'').' '.($ans[$row['id']] == 3 ?'class="alert alert-danger"':'').'>';
                                                        echo 'Option 3 :<br>';
                                                        echo $row['op3'].'<br>';
                                                        if(!empty($row['img3'])){
                                                            echo '<img src="admin/'.$row['img3'].'" class="img-fluid"><br>';
                                                        }
                                                echo '</div>';
                                                echo '<div '.($row['ans'] == 4 ?'class="alert alert-success"':'').' '.($ans[$row['id']] == 4 ?'class="alert alert-danger"':'').'>';
                                                        echo 'Option 4 :<br>';
                                                        echo $row['op4'].'<br>';
                                                        if(!empty($row['img4'])){
                                                            echo '<img src="admin/'.$row['img4'].'" class="img-fluid"><br>';
                                                        }
                                                echo '</div>';
                                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                ?>
                <div class="row" style="margin: 10px;">
                    <a class="col btn btn-prev" href="index.php">EXIT</a>
                    <a class="col btn btn-deregister" href="logout.php">LOGOUT</a>
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
    </script>

</body>

</html>