<?php
require '../../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Monitor</title>
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
<a href="staff-home.php">Close</a>
        <h4>View current number of donations</h4>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total Money</th>
                    <th>Total Clothes</th>
                    <th>Total Shoes</th>
                </tr>
            </thead>
            <?php   
$query="select * from monitor_donation ORDER BY monitorId DESC LIMIT 1";
$select_max=mysqli_query($conn,$query);
$data= mysqli_fetch_array($select_max);

echo"<br>";
echo"<td> $data[0]</td>";
echo "\n";
echo "<td>$data[1]</td>";
echo "\n";
echo "<td>$data[2]</td>";
echo "\n";
echo "<td>$data[3]</td>";
?>
        </table>
        <br>
        <a href="allocate-donation.php">ALLOCATE</a>
    </div>
</body>

</html>
