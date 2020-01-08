<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/support-us.css">
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
        <h2>Support the organization</h2>
        <form action="support-us.php" method="post">
            <label>Kshs.</label>
            <input class="amount" type="number" class="form" name="amount" min="10" step="1" value="" placeholder="minimum Kshs.10" required>
            <label>Amount </label>
            <br><br><br>
            <input class="input" type="email" class="form" name="email" placeholder="Email (optional)">
            <label>Email</label>
            <br><br><br>
            <input class="button" type="submit" name="Send" value="submit"><br><br>

        </form>
        <?php
   if (isset($_POST['Send']))
   {
	   $amount=$_POST['amount'];
	   $email=$_POST['email'];	 
       
            $query= "insert into support(amount, email)
			 values ('$amount', '$email')";
			  if (mysqli_query($conn, $query)) {
        echo "Thank you for supporting charity";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
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
