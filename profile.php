<?php
session_start();
include "./connection.php";
$an = $_SESSION['acc_no'];
$sqlth = "SELECT * FROM `trnx` WHERE from_a=$an or to_a=$an";
$result = $conn->query($sqlth);
$conn->close();

?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <title>Home</title>

  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    /*  import google fonts */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      outline: none;
      border: none;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: rgb(226, 226, 226);
    }

    nav {
      position: sticky;
      top: 0;
      bottom: 0;
      height: 100vh;
      left: 0;
      width: 90px;
      /* width: 280px; */
      background: #fff;
      overflow: hidden;
      transition: 1s;
    }

    nav:hover {
      width: 280px;
      transition: 1s;
    }

    .logo {
      text-align: center;
      display: flex !important;
      margin: 10px 0 0 10px;
      padding-bottom: 1rem;
    }

    .logo img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
    }

    .logo span {
      font-weight: bold;
      padding-left: 15px;
      font-size: 18px;
      text-transform: uppercase;
    }

    a#nva {
      position: relative;
      width: 280px;
      font-size: 14px;
      color: rgb(85, 83, 83);
      display: table;
      padding: 10px;
    }

    nav .fas {
      position: relative;
      width: 70px;
      height: 40px;
      top: 20px;
      font-size: 20px;
      text-align: center;
    }

    .nav-item {
      position: relative;
      top: 12px;
      margin-left: 10px;
    }

    a#nva:hover {
      background: #eee;
    }

    a#nva:hover i {
      color: #34AF6D;
      transition: 0.5s;
    }

    .logout {
      position: absolute !important;
      bottom: 0;
    }

    .container {
      display: flex;
    }

    /* MAin Section */
    .main {
      position: relative;
      padding: 20px;
      width: 100%;
    }

    .main-top {
      display: flex;
      width: 100%;
    }

    .main-top i {
      position: absolute;
      right: 0;
      margin: 10px 30px;
      color: rgb(110, 109, 109);
      cursor: pointer;
    }

    .main .users {
      display: flex;
      width: 100%;
    }

    .users .card {
      width: 55%;
      margin: 10px;
      background: #fff;
      text-align: center;
      border-radius: 10px;
      padding: 10px;
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .users .card1 {
      width: 55%;
      margin: 10px;
      background: #fff;
      text-align: center;
      border-radius: 10px;
      padding: 10px;
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .users .card img {
      width: 100px;
      height: 100px;
      border-radius: 0%;
    }

    .users .card1 img {
      width: 75px;
      height: 80px;
      border-radius: 0%;
    }

    .users .card h4 {
      text-transform: uppercase;
    }

    .users .card p {
      font-size: 12px;
      margin-bottom: 15px;
      text-transform: uppercase;
    }

    .users .card1 p {
      font-size: 15px;
      margin-bottom: 18px;
      text-transform: uppercase;
    }

    .users table {
      margin: auto;
    }

    .users .per span {
      padding: 5px;
      border-radius: 10px;
      background: rgb(223, 223, 223);
    }

    .users td {
      font-size: 12px;
      padding-right: 0px;
    }

    .users .card1 button {
      width: 100%;
      margin-top: 8px;
      padding: 7px;
      cursor: pointer;
      border-radius: 10px;
      background: transparent;
      border: 1px solid #4AD489;
    }

    .users .card button:hover {
      background: #4AD489;
      color: #fff;
      transition: 0.5s;
    }

    .transactions {
      margin-top: 20px;
      text-transform: capitalize;
    }

    .transactions-list {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 15px;
      min-width: 100%;
      overflow: hidden;
      border-radius: 5px 5px 0 0;
    }

    table thead tr {
      color: #fff;
      background: #34AF6D;
      text-align: left;
      font-weight: bold;
    }

    .table th,
    .table td {
      padding: 12px 15px;
    }

    .table tbody tr {
      border-bottom: 1px solid #ddd;
    }

    .table tbody tr:nth-of-type(odd) {
      background: #f3f3f3;
    }

    .table tbody tr.active {
      font-weight: bold;
      color: #4AD489;
    }

    .table tbody tr:last-of-type {
      border-bottom: 2px solid #4AD489;
    }

    .table button {
      padding: 6px 20px;
      border-radius: 10px;
      cursor: pointer;
      background: transparent;
      border: 1px solid #4AD489;
    }

    .table button:hover {
      background: #4AD489;
      color: #fff;
      transition: 0.5rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" id=nva class="logo">
            <img src="https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png">
            <span class="nav-item"><?php echo $_SESSION['uname'] ?></span>
          </a></li>
        <li><a id="nva" href="#">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a></li>
        <li><a id="nva" href="#">
            <i class="fas fa-database"></i>
            <span class="nav-item">Transactions</span>
          </a></li>
        <li><a id="nva" href="#">
            <i class="fas fa-hand-holding-usd"></i>
            <span class="nav-item">Loans</span>
          </a></li>
        <li><a id="nva" href="#">
            <i class="fas fa-solid fa-credit-card"></i>
            <span class="nav-item">Cards</span>
          </a></li>
        <li><a id="nva" href="#">
            <i class="fas fa-cog"></i>
            <span class="nav-item">Settings</span>
          </a></li>

        <li><a href="./logout.php" id="nva" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">LogOut</span>
          </a></li>
      </ul>
    </nav>


    <section class="main">
      <div class="main-top">
        <h1>Overview</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
          <img src="https://icons.veryicon.com/png/o/miscellaneous/rookie-official-icon-gallery/257-user-information.png">
          <h4><?php echo $_SESSION['fname']; ?></h4>
          <h6>Acc no: <?php echo $_SESSION['acc_no']; ?></h6>
          <p>IFSC:KKBK0007707</p>
        </div>
        <div class="card1">
          <img src="https://icon-library.com/images/rupees-icon/rupees-icon-8.jpg">
          <h4>Balance</h4>
          <p>Savings<br>
            <?php echo $_SESSION['bal'] ?>
          </p>
          <button><a href="./balfetch.php" style="text-decoration:none;color:inherit">View</a></button>
        </div>
        <div class="card1">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYFU8dUNFz62VbBOWgyp_I_m-3v2PNejz1Fg&usqp=CAU">
          <h4>Transactions</h4>

          <div class="per">
            <table>
              <tr>
                <td><span>13.5k</span></td>
                <td><span>30K</span></td>
              </tr>
              <tr>
                <td>Sent</td>
                <td>Received</td>
              </tr>
            </table>
          </div>

          <button><a href="./transfer.php" style="text-decoration:none;color:inherit">Transfer</a></button>
        </div>
      </div>

      <section class="transactions">
        <div class="transactions-list">
          <h1>Recent Transactions</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Account no</th>
                
                <th>Date</th>

                <th>Amount</th>
                <th>Transaction Type</th>

              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                $count = 1;
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $bal = number_format($row['amount'], 2, ".", ",");
                  if ($row['to_a'] == $_SESSION['acc_no']) {
                    $acc = $row['from_a'];
                    $status = "Credited";
                    if ($row['to_a'] == $row['from_a']) {
                      $acc = "Self Payment";
                      $status = "Credited/Debited";
                    }
                  } else {
                    $acc = $row['to_a'];
                    $status = "Debited";
                  }
                  $dtx=$row['date'];
                  $sqln = "SELECT `fname` FROM `users` WHERE acc_no=$acc";
                  // $result1 = $conn->query($sqln);

                  // if ($result1->num_rows == 1) {

                  //   $userd = $result1->fetch_assoc();
                  //   echo $userd['fname'];
                  //   exit();
                  // }
                  echo "<tr>
                                <td>$count</td>
                                <td>$acc</td>
                                
                                <td>$dtx</td>
                                <td>Rs. $bal</td>
                                <td>$status</td>
                              </tr>";
                  $count++;
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>
  <p><?php echo $result ?></p>

</body>

</html>