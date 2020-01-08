<?php
require '../connect.php';
?>
<!DOCTYPE>
<html>

<head>
   <title>view donor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="../styles/view.css">
</head>
<body>
    <div class="header">
        <img class="logo" src="../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <br>
<a href="adminhome.php">Close</a>
<a href="view-request.php">All Requests</a>
    <div>
        <br>
        <h3>Pending Requests in CHARITY DONATIONS ORGANIZATION</h3>
        <table >
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
    echo"<td><a href='delete-pending-requests.php?delete={$requestId}'>DELETE</a></td>";  
    echo"</tr>";
 }?>
        </table>
    </div>

</body>

</html>
