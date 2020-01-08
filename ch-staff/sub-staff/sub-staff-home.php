<?php
require '../../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Surbodinate Staff</title>
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
    header("location:index.php?notloggedin=You are not a surbodinate staff");
}else{

echo'<br><big><center><h3>'.$_SESSION['email'].'</h3></center></big>';
}
?>
    </div>
    <div id="sidebar">
        <ul>
            <li><a href="view-allocation.php">VIEW ALLOCATION</a></li>
            <li><a href="view-recipient.php">VIEW RECIPIENTS</a></li>
            <li><a href="sub-staff-logout.php">Logout</a></li>
        </ul>
    </div>
</body>

</html>
