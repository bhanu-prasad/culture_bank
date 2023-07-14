<?php 
session_start();
include "./functions.php";
?>
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}   
</style>
<a href="./profile.php">Back to Home</a>
<form method="post">
    <label for="from">From: </label>
    <input id="from" type="text" value="<?php echo $_SESSION['acc_no']?>" name="from_ac" disabled>
    <label for="to">To Ac/No: </label>
    <input id="to" type="number" name="to_ac" required>
    <label for="amnt">Amount: </label>
    <input id="amnt" type="number" name="amnt">
    <input type="submit" name="transfer_amnt" required>
</form>