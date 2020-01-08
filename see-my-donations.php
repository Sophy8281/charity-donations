<?php
require 'connect.php';
require 'header.html';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/see-my-donations.css">
</head>

<body>
    <br><br>
    <div class="see-donation-links">
        <a href="donor-logout.php">Logout</a>
    </div>
    <div>
        <table style="align:center">
            <thead>
                <h3>These are all your good donations to CHARITY DONATIONS AND ALLOCATION</h3>
                <tr>
                    <th>Donation Type</th>
                    <th>Number Of Items</th>
                    <th>Branchname</th>
                </tr>
            </thead>
            <?php
if (isset($_POST['view']))
   {
	   $email=$_POST['email'];
     $query="select * from branch_donation WHERE email='$email'";
		 $query_run=mysqli_query($conn,$query);
		 if(mysqli_num_rows($query_run)>0)
		 {
        $query="select donationType, numberOfItems, branchname from branch_donation WHERE email='$email'";
		$select_donation=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_donation)){
        $donationType=$row['donationType'];    
        $numberOfItems=$row['numberOfItems'];
        $branchname=$row['branchname'];
    echo"<tr>";
    echo"<td>$donationType</td>";
    echo"<td>$numberOfItems</td>";  
    echo"<td>$branchname</td>";  
    echo"</tr>";}
}else{echo "No result found!";}}
            ?>
        </table>
    </div>
    <br><br>
    <div class="see-donation-links1">
        <a href="donor-home.php">Close</a>
    </div>
</body>

</html>
