<?php
session_start();
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/donor-login.css">
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
    <div class="guide"><p>Please login, record your donation and deliver your donation to our nearest branches within three days</p></div>
    <div class="box">
        <h2>Donor login</h2>
        <form action="donor-login.php" method="POST">
            <h4><?php echo @$_GET["success"];?></h4>
            <h3><?php echo @$_GET["invalid"];?></h3>
            <h3><?php echo @$_GET["notloggedin"];?></h3>
            <h4><?php echo @$_GET["logout"];?></h4>
            <input class="input" type="email" name="email" required>
            <label>Email</label><br><br>
            <input class="input" type="password" name="password" required>
            <label>Password</label><br><br>
            <input  class="button" type="submit" name="login" value="login"><br><br>
            <div class="hr"></div>
                <div class="foot-lnk">
            <a href="branch-donation.php" style="color:seagreen">Not registered?</a><br><br>
            <a href="money-donation.php" style="color:seagreen">Donate money?</a>
            </div>
        </form>
        <?php
   if (isset($_POST['login']))
   {
	   $email=$_POST['email'];
	   $password=$_POST['password'];
       $passwd = md5($password);
		 $query="select *from donor WHERE email='$email' AND password='$passwd'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
            		 {
			//valid
			$_SESSION['email']=$email;
			header('location:donor-home.php?success=Logged in');
		 }
		 else{	
				//invalid
				 header('location:donor-home.php?invalid=Username or password is incorrect');
                
}
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
