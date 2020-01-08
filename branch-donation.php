<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/branch-donation.css">
</head>

<body>
    <div class="header">
        <img class="logo" src="images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="about-us.html">About Us</a>
        <a href="recipientlogin.php" class="right">Recipient</a>
        <div class="dropdown">
            <a class="dropbtn">Donate now</a>
            <div class="dropdown-content">
                <p>Ways to donate</p>
                <a href="branch-donation.php">Goods Donation</a>
                <a href="money-donation.php">Money Donation</a>
            </div>
        </div>
        <a href="support-us.php" class="right">Support us</a>
    </div>
    <img src="images/forms.png" style="width:100%">
    <div class="box">
        <h2>Sign up</h2>
        <form action="branch-donation.php" method="post">
            <div class="Inputbox">
                <input class="input" type="name" name="donorName" required="" >
                <label>Name</label><br><br>
                <input class="input" type="password" name="password" required="">
                <label>Password</label><br><br>
                <input class="input" type="password" name="cpassword" required="">
                <label>Confirm Password</label><br><br>
                <input class="input" type="tel" name="phone" required="">
                <label>Phone</label>
                <br><br>
                <input class="input" type="email" name="email" required="">
                <label>Email</label><br><br>
                <input  class="button" type="submit" name="submit" value="sign up">
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="donor-login.php">Already Member?</a>
                </div></div>
        </form>
        <?php
   if (isset($_POST['submit']))
   {
	   $donorName=$_POST['donorName'];
	   $password=$_POST['password'];
	   $cpassword=$_POST['cpassword'];
	   $phone=$_POST['phone'];
        $email=$_POST['email'];
	   
	   if ($password==$cpassword){
		 $query="SELECT * FROM donor WHERE email='$email'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
			 echo'<script type="text/javascript"> alert ("user already exist.....try new email")</script>';
		 }
		 else{
             $passwd= md5($password);
			 $query= "insert into donor(donorName,password,phone,email)
			 values ('$donorName','$passwd','$phone','$email')";
			  $query_run=mysqli_query($conn,$query);
			  if($query_run){
				  echo'<p>user registered ...... go to login</p> ';
			  }else{
				   echo'<p>error! Try again</p>';
			  }
		 }
	   }else{  echo'<p>password and confirm password does not match!!")</p>';}  
   }
   ?>
    </div>
    <div class="footer">
        <ul>
            <a href="index.php">Home</a>
            <a href="about-us.html">About Us</a>
            <a href="money-donation.php">Donate now</a>
            <a href="support-us.php">Support us</a>
        </ul>
    </div>
</body>

</html>
