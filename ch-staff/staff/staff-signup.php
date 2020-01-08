<?php
require '../../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
</head>

<body>
    <div class="header">
        <img class="logo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <img src="../../images/users.jpg" style="width:100%">
    <div class="box">
        <center>
            <h2>Staff registration</h2>
        </center>
        <form action="staff-signup.php" method="POST">
            <input class="input" type="text" name="firstName" required>
            <label> First Name</label>
            <br><br>
            <input class="input" type="text" name="middleName" required>
            <label> Middle Name</label>
            <br><br>
            <input class="input" type="text" name="lastName" required>
            <label>Last Name</label>
            <br><br>
            <input class="input" type="password" name="password" required>
            <label>Password</label>
            <br><br>
            <input class="input" type="password" name="cpassword" required="">
            <label>Confirm Password</label><br><br>
            <input class="input" type="tel" name="phone" required>
            <label>Phone</label>
            <br><br>
            <input class="input" type="email" name="email" required>
            <label>Email</label>
            <br><br>
            <button class="button" type="submit" value="submit" name="register">Sign up</button>
            <div class="hr"></div>
            <div class="foot-lnk">
                <a href="index.php">Registered?</a>
            </div>
        </form>
        <?php
   if (isset($_POST['register']))
   {
	   $firstName=$_POST['firstName'];
        $middleName=$_POST['middleName'];
        $lastName=$_POST['lastName'];
	   $password=$_POST['password'];
       $cpassword=$_POST['cpassword'];
	   $phone=$_POST['phone'];
        $email=$_POST['email'];
       
        if ($password==$cpassword){
		 $query="SELECT * FROM donor WHERE staff='$email'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
			 echo'<script type="text/javascript"> alert ("user already exist.....try new email")</script>';
		 }
		 else{
       $passwd= md5($password);
            $query= "insert into staff (firstName,middleName,lastName,password,phone,email)
			 values ('$firstName', '$middleName', '$lastName','$passwd', '$phone','$email')";
          if (mysqli_query($conn, $query)) {
       header('location:index.php');
    } else {
        echo "Try again with a different email!!";
    }
    }}else{  echo'<p>password and confirm password does not match!!")</p>';}  
   }


   ?>
    </div>
</body>

</html>
