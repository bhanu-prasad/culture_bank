<?php
include "./head.php";
include "./functions.php";
?>

<body>
 <section class="regpage">
 <h1 style="color:#fff;font-family: 'Courier New', Courier, monospace;margin-top:19px;">Registration</h1>
  <div class="reg">
    <form class="registration" method="post">
      <div class="formdiv">
        <div class="form_name">
          <span>Name</span><br />

          <input type="text" placeholder="First Name" name="fname" required/>
          <input type="text" placeholder="Middle Name" name="mname" />
          <input type="text" placeholder="Last Name" name="lname" required/>
        </div>
        <label for="uname">Username:</label>
        <input type="text" name="uname" placeholder="Username" required/>
        <label for="birthday">DOB:</label>
        <input type="date" id="birthday" name="dob" required/>
        <label for="email">email:</label>
        <input type="email" name="email" required/>

        <label for="number">Phone Number:</label>
        <input type="tel" pattern="[6-9]{1}[0-9]{9}" required name="phno" required/>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="M">Male</option>
          <option value="F">Female</option>
          <option value="O">Others</option>
        </select>
        <label for="pass">Password:</label>
        <input type="password" name="pass" placeholder="*********" required/>
        <div>
          
          <input type="checkbox" required />
          <label for="I agree">I agree all the
            <a href="terms.html">terms and conditions</a>.</label>
        </div>
        <div class="submit">
          <input type="submit" value="Submit" name="regsub">
        </div>
      </div>
    </form>
  </div>
  <?php
include "./footer.php"
?>
 </section>
</body>
<style>

</style>


</html>