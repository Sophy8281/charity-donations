<?php
session_start();
require '../../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css" s>
</head>

<body>
    <div class="header">
        <img class="logo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <img src="../../images/users.jpg" style="width:100%">
    <div class="box">
        <center>
            <h2>Sub_staff login</h2>
        </center>
        <form action="index.php" method="POST">
            <div class="Inputbox">
                <input class="input" type="email" name="email" required="">
                <label>Email</label><br><br>
                <input class="input" type="password" name="password" required="">
                <label>Password</label><br><br>
                <button class="button" type="submit" name="login" value="submit">login</button>
                <div class="hr"></div>
                <div class="foot-lnk">
                <a href="sub-staff-signup.php" style="color:seagreen">Not registered</a>
                </div></div>
        </form>
        <?php
   if (isset($_POST['login']))
   {
	   $email=$_POST['email'];
	   $password=($_POST['password']);
        $passwd = md5($password);
		 $query="select *from sub_staff  WHERE email='$email' AND password='$passwd'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
			//valid
			$_SESSION['email']=$email;
			header('location:sub-staff-home.php');
		 }
		 else{	
				//invalid
				   echo'<a href="sub-staff-forgotpassword.php">Forgot password</a> ';

}	}
   ?>
    </div>
</body>

</html>
