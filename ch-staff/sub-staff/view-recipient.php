<?php
require '../../connect.php';
?>
<!DOCTYPE>
<html>

<head>
    <title>View Donation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/view.css">
</head>

<body>
    <div class="header">
        <img class="logo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <br>
    <a href="sub-staff-home.php">Close</a>
    <div>
        <table>
            <thead>
                <h3>All Recipients in CHARITY DONATIONS ORGANIZATION</h3>
                <tr>
                    <th>Recipient Id</th>
                    <th>recipient Name</th>
                    <th>Email</th>
                    <th>County</th>
                    <th>Location Description</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <?php
  $query="SELECT recipientId,recipientName,email,county,location_description,phone from recipient";
        $select_recipient=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_recipient)){
        $recipientId=$row['recipientId'];
        $recipientName=$row['recipientName'];
        $email=$row['email'];
        $county=$row['county'];    
        $location_description=$row['location_description'];
        $phone=$row['phone'];
        
    echo"<tr>";
    echo"<td>$recipientId</td>";
    echo"<td>$recipientName</td>";
    echo"<td>$email</td>";               
    echo"<td>$county</td>";        
    echo"<td>$location_description</td>"; 
    echo"<td>$phone</td>";           
    echo"</tr>";
 }?>
        </table>
    </div>
