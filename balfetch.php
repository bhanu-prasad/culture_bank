<?php
session_start();
include "./connection.php";
$acno=$_SESSION['acc_no'];
$sql1 = "select * from balance where acc_no='$acno'";
$result1=$conn->query($sql1);
if($result1->num_rows == 1){
    $userd=$result1->fetch_assoc();
    $bal=number_format($userd['bal_amnt'],2,".",",");
    $_SESSION['bal']="Rs. $bal";
    header("Location: profile.php");
    exit();
}
else{
    echo '<script>alert("Unable to fetch balance try again!")</script>';
    header("Location: profile.php");
}
?>