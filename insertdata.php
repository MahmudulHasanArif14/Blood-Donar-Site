<?php
include 'datefunction.php';
include 'Connection.php';

//checking data are not empty

if (!empty($_REQUEST['name']) && !empty($_REQUEST['tel']) && !empty($_REQUEST['grp'])  && !empty($_REQUEST['password'])) {
    $name = $_REQUEST['name'];
    $tel = $_REQUEST['tel'];
    $grp = $_REQUEST['grp'];
    $pwd=$_REQUEST['password'];

    //starting session variable
    $_SESSION['name'] = $_REQUEST['name'];
    $_SESSION['tel'] = $_REQUEST['tel'];
    $_SESSION['grp'] = $_REQUEST['grp'];
    $_SESSION['pwd'] = $_REQUEST['password'];


    //inserting the donation date 
    if(isset($_REQUEST['date'])){
        $donatedateQuery="UPDATE `userinfoh` SET `donatedate` = '{$_REQUEST['date']}' WHERE `Name` ='$name' AND `Tel` = '$tel' AND `Grp` = '$grp';";
        $dat=$con->query($donatedateQuery);
    }


    //Checking the inserted data ara already exited or not
    $showQuery = "SELECT * FROM `userinfoh` WHERE `Name` = '$name' AND `Tel` = '$tel' AND `Grp` = '$grp'";
    $result = $con->query($showQuery);
    if ($result->num_rows > 0) {
        header("location: Loginpage.php?txt=Data Already Existed Please Login to Continue");
        exit();
    }


    //checking if the blood group isnot selected
    if ($grp == "Select Blood Group") {
        header("location: signuppage.php?message=Please select your blood group");
        exit();
    }
    
    //Inserting the data if data not existed in list
    $insertQuery = "INSERT INTO `userinfoh` (`Name`, `Tel`, `Grp`,`pwd`) VALUES ('$name', '$tel', '$grp','$pwd');";
    if ($con->query($insertQuery) === true) {
        header("location: infopage.php");
        exit();
    } else {
        echo "Error: $insertQuery <br> $con->error";
    }

    $con->close();
} else {
    header("location: index.php");
    exit();
}
?>
