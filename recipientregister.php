<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/recipientregister.css">
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
        <h2>Recipient register</h2>
        <form action="recipientregister.php" method="post">
            <h4><?php echo @$_GET["success"];?></h4>
            <h3><?php echo @$_GET["invalid"];?></h3>
            <h3><?php echo @$_GET["email-exist"];?></h3>
            <div class="Inputbox">
                <input class="input" type="name" name="recipientName" required="">
                <label>Name</label><br><br>
                <input class="input" type="email" name="email" required="">
                <label>Email</label><br><br>
                <input class="input" type="password" name="password" required="">
                <label>Password</label><br><br>
                <input class="input" type="password" name="cpassword" required="">
                <label>Confirm Password</label><br><br>
                <select class="input" type="name" name="county" required="">
                    <option>Nairobi</option>
                    <option>Kiambu</option>
                    <option>Murang'a</option>
                </select>
                <label>County</label><br><br>
                <input class="input" type="name" name="location_description" required="">
                <label>Location Description</label><br><br>
                <input class="input" type="tel" name="phone" required="">
                <label>Phone</label><br><br>
                <input class="button" type="submit" name="submit" value="submit"><br><br>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="recipientlogin.php">Already Registered?</a>
                </div>
            </div>
        </form>
        <?php
   if (isset($_POST['submit']))
   {
	   $recipientName=$_POST['recipientName'];
	   $email=$_POST['email'];
	   $password=$_POST['password'];
	   $cpassword=$_POST['cpassword'];
       $county=$_POST['county'];
       $location_description=$_POST['location_description'];
	   $phone=$_POST['phone'];
	   
	   if ($password==$cpassword){
		 $query="select * from recipient WHERE email='$email'";
		 $query_run=mysqli_query($conn, $query);
		 if(mysqli_num_rows($query_run)>0)
		 {
			 header('location:recipientregister.php?email-exist=user already exist.....try new email');
		 }
		 else{
             $passwrd= md5($password);
             $query1="INSERT INTO recipient (recipientName,email,password,county,location_description,phone)
             values('$recipientName','$email','$passwrd','$county','$location_description','$phone')";
			  $query_run1=mysqli_query($conn,$query1);
			  if($query_run1){
				  header('location:recipientregister.php?success=Registered.....');
			  }else{
				  echo "Error: " . $query . "<br>" . mysqli_error($conn);
			  }
		 }
	   }else{  header('location:recipientregister.php?invalid=password and confirm password do not match');}  
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
