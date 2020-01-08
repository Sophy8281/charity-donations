<?php
session_start();
require '../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>

<body>
    <div class="header">
        <img class="logo" src="../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <img src="../images/users.jpg" style="width:100%">
    <div class="box">
        <center>
            <h2>Admin login</h2>
        </center>
        <form action="index.php" method="POST">
            <h4><?php echo @$_GET["success"];?></h4>
            <h3><?php echo @$_GET["invalid"];?></h3>
            <h3><?php echo @$_GET["notloggedin"];?></h3>
            <h4 style="color:forestgreen"><?php echo @$_GET["logout"];?></h4>
            <input class="input" type="text" name="username" required>
            <label>Username</label>
            <br><br>
            <input class="input" type="password" name="password" required>
            <label>Password</label>
            <br><br>
            <button class="button" type="submit" value="submit" name="login">login</button>
            <div class="hr"></div>
            <div class="foot-lnk">
                <a href="create-admin.php">CREATE ADMIN</a>
            </div>
        </form>
        <?php
   if (isset($_POST['login']))
   {
	   $username=$_POST['username'];
	   $password=$_POST['password'];
       $passwd = md5($password);
		 $query="select *from admin WHERE username='$username' AND password='$passwd'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
			//valid
			$_SESSION['username']=$username;
			header('location:adminhome.php?success=Logged in');
		 }
		 else{	
				//invalid
				 header('location:adminhome.php?invalid=Username or password is incorrect');

}	}
      ?>
    </div>
</body>

</html>
