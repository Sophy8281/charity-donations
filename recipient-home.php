<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
     <link rel="stylesheet" type="text/css" href="styles/recipient-home.css">
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
     <img src="images/users.jpg" style="width:100%">
    <div class="box">
        <h2>Make request</h2>
        <?php
session_start();
if(!$_SESSION['email'])
{
    header("location:recipientlogin.php?notloggedin=You must login to make a request<br><a href='recipient-forgotpassword.php'>Forgot password</a>");
}else{

echo'<br><big><center><h3 style="color:forestgreen">'.$_SESSION['email'].'</h3></center></big>';
}
?>
        <form action="requests.php" method="post">
            <h3><?php echo @$_GET["successful"];?></h3>
            <div class="Inputbox">
                <input class="input" type="name" name="recipientName" required="">
                <label>Name</label><br><br>
                <select class="input" name="requestType">
                    <option>clothes</option>
                    <option>shoes</option>
                </select>
                <label>Request Type</label><br><br>
                 <input class="numberOfItems" type="number" name="amount" min="1" step="1" value="" placeholder="1" required="">
                <label>Approximate Number</label><br><br>
                <input class="button" type="submit" name="Request" value="Request" br><br>
                
            </div>
        </form>
         <div class="available">
        <table>
            <thead>
                <tr>
                    <th>Available Clothes</th>
                    <th>Available  Shoes</th>
                </tr>
            </thead>
            <?php   
$query="select total_clothes,total_shoes from monitor_donation ORDER BY monitorId DESC LIMIT 1";
       $select_donation=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_donation)){
        $total_clothes=$row['total_clothes'];
        $total_shoes=$row['total_shoes'];
    echo"<tr>";
    echo"<td>$total_clothes</td>";
    echo"<td>$total_shoes</td>";              
    echo"</tr>";
        }
?>
        </table>
             <a href="recipient-logout.php" style="color:seagreen">Logout</a>
    </div>
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
