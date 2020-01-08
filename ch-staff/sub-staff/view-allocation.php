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
    <h3>All Allocations in CHARITY DONATIONS ORGANIZATION</h3>
        <table>
            <thead>
                <tr>
                    <th>Allocation ID</th>
                    <th>Money</th>
                    <th>Clothes</th>
                    <th>Shoes</th>
                    <th>Sub Staff</th>
                    <th>Recipient Name</th>
                    <th>County</th>
                </tr>
            </thead>
            <?php
  $query="SELECT * from allocation";
        $select_allocation=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_allocation)){
        $allocationId=$row['allocationId'];
        $money=$row['money'];
        $clothes=$row['clothes']; 
        $shoes=$row['shoes'];
        $substaffName=$row['substaffName'];
        $recipientName=$row['recipientName'];
        $county=$row['county'];
    echo"<tr>";
    echo"<td>$allocationId</td>";
    echo"<td>$money</td>";
    echo"<td>$clothes</td>";                
    echo"<td>$shoes</td>"; 
    echo"<td>$substaffName</td>"; 
    echo"<td>$recipientName</td>"; 
    echo"<td>$county</td>"; 
    echo"</tr>";
 }
    ?>
        </table>
</body>

</html>
