<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/money-donation.css">
   
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
        <h2>Money donation</h2>
        <form action="money-donation.php" method="POST">
            <div class="Inputbox">
            <input class="amount" type="number" name="amount" min="10" step="1" value="" placeholder="kshs.10 minimum" required>
                <label>AMOUNT</label>
                <br><br>
                <input class="input" type="email" name="email" placeholder="Optional">
                <label>Email</label>
                <br><br><br>
                <input class="button" type="submit" name="Donate" value="submit">
                <div class="hr"></div>
                <div class="foot-lnk">
                <a href="donor-login.php">Donate clothes or shoes?</a>
                </div></div>
        </form>
        <?php
   if (isset($_POST['Donate']))
   {
	   $amount=$_POST['amount'];
	   $email=$_POST['email'];	 
       
        $query= "insert into money_donation(amount, email)
        values ('$amount', '$email')";
if (mysqli_query($conn, $query)) {
$query1="select * from monitor_donation ORDER BY monitorId DESC LIMIT 1";
$select_max=mysqli_query($conn,$query1);
$data= mysqli_fetch_array($select_max);
$total_money=$data[1]+$amount;
$total_clothes =$data[2]+0;
$total_shoes= $data[3]+0;
if (mysqli_query($conn, $query1)) {
$query2="insert into monitor_donation(total_money,total_clothes,total_shoes)
values('$total_money','$total_clothes','$total_shoes')";
if (mysqli_query($conn,$query2)) {
echo "Thank you for donating to charity";

} else {
echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
}}}

        ?>
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
