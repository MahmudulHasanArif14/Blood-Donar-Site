<?php
include 'datefunction.php';
include 'Connection.php';


if (!empty($_REQUEST['name']) && !empty($_REQUEST['password'])) {
    $name = $_REQUEST['name'];
    $pwd=$_REQUEST['password'];
    
    $_SESSION['name'] = $_REQUEST['name'];
    $_SESSION['pwd'] = $_REQUEST['password'];





    //checking the data existed or not
    $showQuery = "SELECT * FROM `userinfoh` WHERE `Name` = '$name'  AND `pwd` = '$pwd'";
    $result = $con->query($showQuery);
    if ($result->num_rows > 0) {
        header("location:infopage.php");
        exit();
    }else{
        header("location:Loginpage.php?msg=Error! Password or Name don't match");
        exit();

    }
}

?>