<?php
    require 'checklogin.php';
    include 'config.php';

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
    <link rel="stylesheet" href="css/available-test.css">
    <style>

    </style>
</head>

<body>

    <?php 
        require 'navbar.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 title-box">
                <h3 class="text-center">AVAILABLE TEST</h3>
            </div>
            <div class="col-12 col-md-1"></div>
            <div class="col-12 col-md-10 div-box">
                <div class="row" style="padding-left:5px; padding-right: 5px; padding-bottom: 5px;">
                    <?php
                            $date = date("y/m/d");
                            $sql = "SELECT id,title,description,admin FROM test WHERE lastdate >= '$date' AND startDate <= '$date'";
                            $result = $conn->query($sql);
                            $userr = $_SESSION['id'];
                            while($row = $result->fetch_assoc()){
                                $adminID = $row['admin'];
                                $sql = "SELECT name FROM admin WHERE id = $adminID";
                                $result2 = $conn->query($sql);
                                $adminName = $result2->fetch_assoc();
                                $adminName = $adminName['name'];
                                $testt = $row['id'];

                                echo '<div class="col-12 card-box">';
                                echo '<h3 class="test-title">'.$row['title'].'</h3>
                                <span class="admin-name">'.$adminName.'</span><br><p class="test-desc">'.$row['description'].'</p>
                                <p class="text-right"><a href="viewTest.php?id='.$row['id'].'">View Details</a></p>';
                                    $sql = "SELECT id,attempted FROM registered WHERE user = $userr AND test = $testt";
                                    $tempr = $conn->query($sql);
                                    if($tempr->num_rows > 0){
                                        $ttttt = $tempr->fetch_assoc();
                                        if($ttttt['attempted'] == 1){
                                            echo '<a class="btn btn-link">Already attempted</a>';
                                        }
                                        else{
                                            echo '<a class="btn btn-deregister" href="testDeRegister.php?test='.$row['id'].'&id='.$ttttt['id'].'">DEREGISTER</a>';
                                            echo '&nbsp;<a class="btn btn-start" href="test.php?test='.$row['id'].'">START TEST</a>';
                                        }
                                    }
                                    else{
                                        echo '<a class="btn btn-register" href="testRegister.php?test='.$row['id'].'&user='.$_SESSION['id'].'">register for test</a>';
                                    }
                                echo '</div>';

                            }
                        ?>
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
        window.onload = checkCookie();
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        function checkCookie() {
            var consent = getCookie("consent");
            if (consent != "") {
            } else {
                alert("We'll be using cookies to enhance user experience")
                    setCookie("consent", "yes", 365);
            }
        }
    </script>
</body>

</html>