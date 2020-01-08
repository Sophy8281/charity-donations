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
    <div>
        <br>
        <a href="staff-home.php">Close</a>
        <table>
            <thead>
              <h3>Number of pending requests</h3>
                <tr>
                    <th>ID</th>
                    <th>Total Requests</th>
                </tr>
            </thead>
            <?php   
session_start();
require '../../connect.php';
$query="select * from monitor_requests ORDER BY monitorId DESC LIMIT 1";
$select_max=mysqli_query($conn,$query);
$data= mysqli_fetch_array($select_max);
echo"<br>";
echo"<td> $data[0]</td>";
echo "\n";
echo "<td>$data[1]</td>";
?>
        </table>
    </div>
</body>

</html>
