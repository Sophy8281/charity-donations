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
    <?php
   if (isset($_POST['Request']))
   {
$recipientName=$_POST['recipientName'];
$requestType=$_POST['requestType'];
$amount=$_POST['amount'];
$query= "insert into requests(recipientName,requestType,amount)
values ('$recipientName', '$requestType','$amount')";
if (mysqli_query($conn, $query)) {
$query3= "insert into current_requests(recipientName,requestType,amount)
values ('$recipientName', '$requestType','$amount')";
if (mysqli_query($conn, $query3)) {
$query1="select * from monitor_requests ORDER BY monitorId DESC LIMIT 1";
$select_max=mysqli_query($conn,$query1);
$data= mysqli_fetch_array($select_max);
$total_requests=$data[1]+1;
if (mysqli_query($conn, $query1)) {
$query2="insert into monitor_requests(total_requests)
values('$total_requests')";
if (mysqli_query($conn,$query2)) {
header("location:recipient-home.php? successful=Request sent");
} else {
echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
}}}}
?>
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
