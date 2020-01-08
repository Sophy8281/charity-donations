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
    <div>
        <table>
            <thead>
                <h3>All donors in CHARITY DONATIONS ORGANIZATION</h3>
                <tr>
                    <th>Donor ID</th>
                    <th>Donor Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php
  $query="SELECT donorId,donorName,phone,email from donor";
        $select_donor=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_donor)){
        $donorId=$row['donorId'];
        $donorName=$row['donorName'];
        $phone=$row['phone'];
        $email=$row['email'];
    echo"<tr>";
    echo"<td>$donorId</td>";
    echo"<td>$donorName</td>";             
    echo"<td>$phone</td>"; 
    echo"<td>$email</td>";           
    echo"</tr>";
    echo"<br>";
 }?>
        </table>
    </div>
</body>

</html>
