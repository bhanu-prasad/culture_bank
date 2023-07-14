<?php
session_start();
include "./functions.php";
$joint = uidgen();
echo $_SESSION['uname'];
$result = $_SESSION['thres'];
       echo $result;
?>
<input type="text" name="username" value = "<?php echo date('Y-m-d H:i:s') ?>">
<a href="logout.php">Logout</a>