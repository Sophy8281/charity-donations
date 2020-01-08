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
    <link rel="stylesheet" type="text/css" href="styles/staff-forgotpassword.css">
</head>

<body>
    <div class="header">
        <img class="logo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <img src="../../images/users.jpg" style="width:100%">
    <div class="box">
        <h2>Reset password</h2>
        <form action="staff-forgotpassword.php" method="POST">
            <input class="input" type="email" name="email" required>
            <label> Email</label>
            <br><br>
            <input class="input" type="password" name="password" required>
            <label> New password</label>
            <br><br>
            <input class="input" type="password" name="cpassword" required>
            <label>Confirm new password</label>
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
		 $query="select *from staff WHERE email='$email'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
             $passwd= md5($password);
             $query1="UPDATE staff SET password='$passwd' WHERE email='$email'";
		 if(mysqli_query($conn,$query1)){
             echo "Go to ...<a href='index.php'>login</a>";
         }else {echo "Error";}
       }else {echo'<p style="color:red">Email not found!!!!</p>';}
       }else {echo '<p style="color:red">Password and confirm password do not match!!!!</p>';}
}
?>
    </div>
</body>

</html>
