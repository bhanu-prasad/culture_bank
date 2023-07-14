<?php
include "./connection.php";
function uidgen()
{
    echo "<br>";
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $hour = date('H');
    $min = date('i');
    $randnum = rand(1, 9);
    $sec = date('s');


    $id =  $year . $day . $month . $hour . $randnum . $min . $sec;
    return $id;
}


if (isset($_POST['regsub'])) {
    $fname = $_POST['fname'] . " " . $_POST['mname'] . " " . $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $gender = $_POST['gender'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $ac_no = uidgen();
    $sql1 = "select * from users where uname='$uname'";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        echo '<script>alert("Username Taken")</script>';
    } else {
        $sql = "INSERT INTO `users`(`acc_no`, `fname`, `uname`, `pass`, `email`, `phno`, `gender`, `dob`) VALUES ('$ac_no','$fname','$uname','$pass','$email','$phno','$gender','$dob')";
        if ($conn->query($sql)) {
            $sql = "INSERT INTO `balance`(`acc_no`) VALUES ($ac_no)";
            if ($conn->query($sql)) {
                echo '<script>alert("Registered")</script>';
                header("Location: login.php");
            }
            exit();
        } else {
            echo '<script>alert("Try Again")</script>';
        }
    }
}
// echo uidgen();
if (isset($_POST['login2b'])) {
    $luname = $_POST['uname'];
    $lpass = $_POST['pass'];
    $sql1 = "select uname,acc_no,fname from users where uname='$luname' and pass='$lpass'";
    $result = $conn->query($sql1);

    if ($result->num_rows == 1) {
        session_start();
        $userd = $result->fetch_assoc();
        $_SESSION['uname'] = $userd['uname'];
        $_SESSION['acc_no'] = $an = $userd['acc_no'];
        $_SESSION['fname'] = $userd['fname'];
        $_SESSION['bal']="";
        header("Location: profile.php");
        exit();
    } else {
        echo '<script>alert("Invalid username/password")</script>';
    }
}

if (isset($_POST['transfer_amnt'])) {
    $to_ac = $_POST['to_ac'];
    $amnt = $_POST['amnt'];
    session_start();
    $acno = $_SESSION['acc_no'];
    $sql1 = "select * from balance where acc_no='$acno'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows == 1) {
        $userd = $result1->fetch_assoc();
        $bal = $userd['bal_amnt'];
        if ($bal < $amnt) {
            echo '<script>alert("Insufficient")
            window.location.replace(`transfer.php`)</script>';
        } else {
            $sql1 = "select * from balance where acc_no='$to_ac'";
            $result1 = $conn->query($sql1);
            $sql2 = "select * from balance where acc_no='$acno'";
            $result2 = $conn->query($sql2);
            if ($result1->num_rows == 1 && $result2->num_rows == 1) {
                $user2 = $result1->fetch_assoc();
                $user1 = $result2->fetch_assoc();
                $bal2 = $user2['bal_amnt'];
                $bal2 = $bal2 + $amnt;
                $bal1 = $user1['bal_amnt'];
                $bal1 = $bal1 - $amnt;
                $sql1 = "UPDATE `balance` SET `bal_amnt`=$bal2 WHERE acc_no=$to_ac";
                $sql2 = "UPDATE `balance` SET `bal_amnt`=$bal1 WHERE acc_no=$acno";
                $ts = date('Y-m-d H:i:s');
                if ($conn->query($sql1) === TRUE) {
                    if ($conn->query($sql2) === TRUE) {
                        $bal = number_format($bal1, 2, ".", ",");
                        $_SESSION['bal'] = "Rs. $bal";
                        $sqlt = "INSERT INTO `trnx`( `from_a`, `to_a`, `date`, `amount`) VALUES ($acno,$to_ac,'$ts',$amnt)";
                        if ($conn->query($sqlt)) {
                            echo '<script>alert("Transfer successful")
                            window.location.replace(`profile.php`)</script>';
                        }
                    }
                    exit();
                }
                // else{
                //     echo "<script>alert('Failed')</script>";
                //     exit();
                // }
            } else {
                echo '<script>alert("Invalid Details")
                        window.location.replace(`transfer.php`)</script>';
            }
            // UPDATE `balance` SET `bal_amnt`='[value-3]'' WHERE acc_no=

        }
        exit();
    } else {
        echo '<script>alert("Unable to fetch balance try again!")</script>';
        header("Location: profile.php");
    }
}
