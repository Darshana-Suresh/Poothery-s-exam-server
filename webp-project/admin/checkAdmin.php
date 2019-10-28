<?php
    require 'checklogin.php';
    if(isset($_SESSION['username'])){
        if($_SESSION['type'] != 'admin'){
            header("Location: logout.php");
        }
    }
?>