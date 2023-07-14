<?php
include "./head.php";
include "./functions.php";
?>
<link rel="stylesheet" href="./css/login.css">
<body>
    <div class="content">
      <div class="ads"></div>
      <div class="lgform">
        <h1>Login To Your Account</h1>
        <form method="post">
          <div class="lgdt">
            <input
              type="text"
              name="uname"
              id=""
              placeholder="E-mail/Username"
            /><br />
            <input
              type="password"
              name="pass"
              id=""
              placeholder="**************"
            /><br />
          </div>
          <div>
            <input type="checkbox" name="" id="reme" />
            <label for="reme">Remember Me</label>
          </div>
          <input type="submit" value="Login" name="login2b"/>
        </form>
      </div>
    </div>
  </body>
  <?php 
    include "./footer.php"
  ?>
  </html>