<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/donor-home.css">
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
    <img src="images/forms.png" style="width:100%">
    <div class="box">
        <h2>Make your donation now</h2>
        <?php

session_start();
if(!$_SESSION['email'])
{
    header("location:donor-login.php?notloggedin=You must login to make goods donation<br><a href='donor-forgotpassword.php'>Forgot password</a>");
}else{

echo'<br><big><center><h4 style="color:forestgreen">'.$_SESSION['email'].'</h4></center></big>';
}
?>
        <form action="donations.php" method="post">
            <h3><?php echo @$_GET['successful'];?></h3>
            <div class="Inputbox">
                <select class="input" name="donationType">
                    <option>clothes</option>
                    <option>shoes</option>
                </select>
                <label>donationType</label><br><br>
                <input class="numberOfItems" type="number" name="numberOfItems" min="1" step="1" value="" placeholder="1" required="">
                <label>Number of items</label><br><br>
                <select class="input" name="branchname">
                    <option>Nairobi</option>
                    <option>Kiambu</option>
                    <option>Murang'a</option>
                </select>
                <label>Branch Name</label><br><br>
                 <input class="input" type="email" name="email" required="">
                <label>Email</label><br><br>
                <input class="button" type="submit" name="Donate" value="submit">
                 <div class="hr"></div>
                <div class="foot-lnk">
                <a href="money-donation.php">Go to money donation?</a><br><br>
            </div>

            </div></form></div>
    <div class="box1">
            <h2>See my donations</h2>
            <form action="see-my-donations.php" method="POST">
                <input class="input" type="email" name="email" required>
                <label>Email</label>
                <br><br>
                <button class="button" type="submit" value="submit" name="view">Search</button>
            </form>
        <br>
        <a href="donor-logout.php">Logout</a>
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
