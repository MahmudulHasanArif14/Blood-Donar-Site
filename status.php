<?php
include 'Connection.php';
include 'datefunction.php';
if (isset($_REQUEST['date'])) {
    $donatedateQuery = "UPDATE `userinfoh` SET `donatedate` = '{$_REQUEST['date']}' WHERE `Name` = '{$_SESSION['name']}' AND `pwd` = '{$_SESSION['pwd']}'";
    $dat = $con->query($donatedateQuery);
    if ($dat == true) {
        header("location:infopage.php?status=success");
    } else {
        echo mysqli_error($con);
    }
}

?>