<?php
require 'connect.php';
require 'header.html';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/donor-forgotpassword.css">
</head>

<body>
    <img src="images/forms.png" style="width:100%">
    <div class="box">
        <h2>Reset password</h2>
        <form action="donor-forgotpassword.php" method="POST">
            <h3><?php echo @$_GET["password-error"];?></h3>
            <h3><?php echo @$_GET["email-error"];?></h3>
            <input class="input" type="email" name="email" required>
            <label>Email</label>
            <br><br>
            <input class="input" type="password" name="password" required>
            <label> New password</label>
            <br><br>
            <input class="input" type="password" name="cpassword" required>
            <label> Confirm new password</label>
            <br><br>
            <button class="button" type="submit" value="submit" name="forgot">Submit</button>
        </form>
        <?php
if (isset($_POST['forgot']))
   {
	   $email=$_POST['email'];
	   $password=$_POST['password'];
	   $cpassword=$_POST['cpassword'];
	   
	   if ($password==$cpassword){
		 $query="select *from donor WHERE email='$email'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
             $passwd= md5($password);
             $query1="UPDATE donor SET password='$passwd' WHERE email='$email'";
		 if(mysqli_query($conn,$query1)){
             echo "Go to <a href='donor-login.php'>login</a>";
         }else {echo "Error";}
       }else {
             header('location:donor-forgotpassword.php?email-error=Email not found');}
       }else {echo header('location:donor-forgotpassword.php?password-error=Password and confirm password do not match');}
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
