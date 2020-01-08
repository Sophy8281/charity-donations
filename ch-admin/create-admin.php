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
    <link rel="stylesheet" type="text/css" href="styles/add-admin.css">
</head>

<body>
    <div class="header">
        <img class="logo" src="../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <img src="../images/users.jpg" style="width:100%">
    <div class="box">
        <center>
            <h2>Create admin</h2>
        </center>
        <form action="create-admin.php" method="POST">
            <input class="input" type="text" name="username" required>
            <label>Username</label>
            <br><br>
            <input class="input" type="password" name="password" required>
            <label>Password</label>
            <br><br>
            <input class="input" type="tel" name="phone" required>
            <label> Phone</label>
            <br><br>
            <input class="input" type="email" name="email" required>
            <label>Email</label>
            <br><br>
            <button class="button" type="submit" value="submit" name="add">create</button>
            <div class="hr"></div>
            <div class="foot-lnk">
                <a href="index.php">Go to login</a>
            </div>
        </form>
        <?php
   if (isset($_POST['add']))
   {
	   $username=$_POST['username'];
	   $password=$_POST['password'];
	   $phone=$_POST['phone'];
        $email=$_POST['email'];
	            $passwd = md5($password);
			 $query= "insert into admin (username,password,phone,email)
			 values ('$username','$passwd', '$phone','$email')";
          if (mysqli_query($conn, $query)) {
        echo "Admin created";
    } else {
        echo "Try again with a different email!!";
    }}
   ?>
    </div>
</body>

</html>
