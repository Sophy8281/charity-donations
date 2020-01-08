<?php
session_start();
require '../../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Allocate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="../../styles/adminhome.css">
    <link rel="stylesheet" type="text/css" href="../../styles/view.css">
</head>
<body>
    <div id="header">
        <img class="logo" id="charitylogo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
<div>
    <p>Confirm the request you have just allocated</p>
        <table>
            <thead>
                <tr>
                    <th>RequestId</th>
                    <th>Recipient Name</th>
                    <th>Request Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <?php
  $query="SELECT * from current_requests";
        $select_request=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_request)){
        $requestId=$row['requestId'];
        $recipientName=$row['recipientName'];
        $requestType=$row['requestType'];  
         $amount=$row['amount']; 
    echo"<tr>";
    echo"<td>$requestId</td>";
    echo"<td>$recipientName</td>";
    echo"<td>$requestType</td>"; 
    echo"<td>$amount</td>"; 
    echo"<td><a href='fulfil-request.php?delete={$requestId}'>ALLOCATED</a></td>"; 
    echo"</tr>";
 }?>
        </table>
    </div></body></html>
