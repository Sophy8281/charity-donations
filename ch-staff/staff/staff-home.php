<?php
require '../../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../../styles/adminhome.css">
</head>

<body>
    <div id="header">
        <img class="logo" id="charitylogo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
        <?php

session_start();
if(!$_SESSION['email'])
{
    header("location:index.php?notloggedin=You are not a staff");
    echo'<h3>You are not a staff</h3>';
}else{

echo'<br><big><center><h3>'.$_SESSION['email'].'</h3></center></big>';
}
?>
    </div>
    <div id="sidebar">
        <ul>
            <li><a href="view-good-donation.php">VIEW ALL GOODS DONATIONS</a></li>
            <li><a href="view-money-donation.php">VIEW ALL MONEY DONATIONS</a></li>
            <li><a href="monitor-donation.php">VIEW CURRENT AMOUNT OF DONATIONS</a></li>
            <li><a href="monitor-requests.php">VIEW CURRENT NUMBER OF REQUESTS</a></li>
            <li><a href="allocate-donation.php">ALLOCATE DONATIONS</a></li>
            <li><a href="staff-logout.php">Logout</a></li>
        </ul>
    </div>
</body>

</html>
