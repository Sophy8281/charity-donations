<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/style1.css">
</head>
<body>
  <div class="header">
  <img class="logo" src="images/logo.png" alt="logo">
  <h3>Charity Donations and Allocation</h3>
  </div>
  <div class="navbar">
    <a href="index.html">Home</a>
    <a href="about-us.html">About Us</a>
    <a href="recipientlogin.php" class="right">Recipient</a>
    <div class="dropdown">
    <a class="dropbtn">Donate now</a>
    <div class="dropdown-content">
    <p>Ways to donate</p>
    <a href ="branch-donation.php">Goods Donation</a>
    <a href="money-donation.php">Money Donation</a>
    </div>
    </div>
     <a href="support-us.php" class="right">Support us</a>
   </div>
        <?php
   if (isset($_POST['Donate']))
   {
	   $donationType=$_POST['donationType'];
	   $numberOfItems=$_POST['numberOfItems'];	 
       $branchname=$_POST['branchname'];
       $email=$_POST['email'];
       
            $query= "insert into branch_donation(donationType, numberOfItems, branchname,email)
			 values ('$donationType', '$numberOfItems','$branchname','$email')";
if (mysqli_query($conn, $query)) {
        $query1="select * from monitor_donation ORDER BY monitorId DESC LIMIT 1";
                $select_max=mysqli_query($conn,$query1);
                $data= mysqli_fetch_array($select_max);
    if ($donationType=='clothes'){
                $total_money=$data[1]+0;
                $total_clothes =$data[2]+$numberOfItems;
                $total_shoes= $data[3]+0;
    }else{
                $total_money=$data[1]+0;
                $total_clothes =$data[2]+0;
                $total_shoes= $data[3]+$numberOfItems;
    }
if (mysqli_query($conn, $query1)) {
        $query2="insert into monitor_donation(total_money,total_clothes,total_shoes)
        values('$total_money','$total_clothes','$total_shoes')";
if (mysqli_query($conn,$query2)) {
        header("location:donor-home.php? successful=Thank you for donating to charity");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}}}
 ?>
    <div class="footer">
  <ul>
   <a href="index.html">Home</a>
    <a href="about-us.html">About Us</a>
    <a href="money-donation.php">Donate now</a>
    <a href="support-us.php">Support us</a>
    </ul>
  </div>
</body>
</html>