<?php
session_start();
include 'Connection.php';

function donateStatus($con) {
    $ShowallQuery = "SELECT * FROM `userinfoh`";
    $r = $con->query($ShowallQuery);
    $Donation_Date = null;
    date_default_timezone_set('Asia/Dhaka');
    foreach ($r as $row) {
        $Donation_Date = new DateTime($row['donatedate']);
        $Current_Date = new DateTime(date("h:i:sa"));
        $interval = $Donation_Date->diff($Current_Date);
        $dayDifference = $interval->days;
        if ($dayDifference >120) {
            $_SESSION['status'] = "Eligible";
            $formattedDonationDate = $Donation_Date->format('Y-m-d H:i:s');
            $status_Update="UPDATE `userinfoh` SET `Status` = '{$_SESSION['status']}' WHERE `donatedate` ='$formattedDonationDate'";
            if($row['Status']!=$_SESSION['status']){
                $Update_Run = $con->query($status_Update);    
            }
            
        } 
        else {
            $_SESSION['status'] = "Not Eligible";
            $formattedDonationDate = $Donation_Date->format('Y-m-d H:i:s');
            $status_Update="UPDATE `userinfoh` SET `Status` = '{$_SESSION['status']}' WHERE `donatedate` ='$formattedDonationDate'";
            if($row['Status']!=$_SESSION['status']){
                $Update_Run = $con->query($status_Update);    
            }
        }

    }

}

donateStatus($con);

?>