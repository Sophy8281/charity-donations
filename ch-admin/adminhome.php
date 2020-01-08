<!DOCTYPE html>
<html>

<head>
    <title>admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../styles/adminhome.css">
</head>

<body>
    <div id="header">
        <img class="logo" id="charitylogo" src="../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
        <?php

session_start();
if(!$_SESSION['username'])
{
    header('location:index.php?notloggedin=You are not an administrator<br><a href="admin-forgotpassword.php">Forgot password</a>');
}else{

echo'<br><big><center><h3>'.$_SESSION['username'].'</h3></center></big>';
}
?>
    </div>
    <div id="sidebar">
        <ul>
            <li><a href="adminlogout.php">Logout</a></li>
            <li><a href="view-staff.php">STAFF</a></li>
            <li><a href="view-sub-staff.php">SUB-STAFF</a></li>
            <li><a href="see-admin.php">ADMIN</a></li>
            <li><a href="view-donor.php">DONORS</a></li>
            <li><a href="view-recipient.php">RECIPIENTS</a></li>
            <li><a href="view-money-donation.php">MONEY</a></li>
            <li><a href="view-branch-donation.php">GOODS</a></li>
            <li><a href="view-request.php">REQUESTS</a></li>
        </ul>
    </div>
</body>

</html>
