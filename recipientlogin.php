<?php
session_start();
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/recipientlogin.css">
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
    <img src="images/users.jpg" style="width:100%">
    <div class="box">
        <h2>Recipient login</h2>
        <form action="recipientlogin.php" method="POST">
            <h3 style="color: forestgreen"><?php echo @$_GET["success"];?></h3>
            <h3><?php echo @$_GET["invalid"];?></h3>
            <h3><?php echo @$_GET["notloggedin"];?></h3>
            <h3 style="color:forestgreen"><?php echo @$_GET["logout"];?></h3>
            <input class="input" type="email" name="email" required>
            <label>Email</label>
            <br><br>
            <input class="input" type="password" name="password" required>
            <label>Password</label>
            <br><br>
            <button class="button" type="submit" value="submit" name="login">login</button>
            <div class="hr"></div>
            <div class="foot-lnk">
                <a href="recipientregister.php">Not registered?</a>
            </div>
        </form>
        <?php
   if (isset($_POST['login']))
   {
	   $email=$_POST['email'];
	   $password=$_POST['password'];
        $passwd = md5($password);
		 $query="select * from recipient WHERE email='$email' AND password='$passwd'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
            		 {
			//valid
			$_SESSION['email']=$email;
			header('location:recipient-home.php?success=Logged in');
		 }
		 else{	
				//invalid
				 header('location:recipient-home.php?invalid=Username or password is incorrect');
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
