<?php
session_start();
require '../connect.php';
?>
<!DOCTYPE>
<html>

<head>
    <title>View staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
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
                <h3>All sub_staff in CHARITY DONATIONS ORGANIZATION</h3>
                <tr>
                    <th>Sub_StaffId</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php
  $query="SELECT sub_staffId,firstName,middleName,lastName,phone,email from sub_staff";
        $select_sub_staff=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_sub_staff)){
        $sub_staffId=$row['sub_staffId'];
        $firstName=$row['firstName'];
        $middleName=$row['middleName'];    
        $lastName=$row['lastName'];
        $phone=$row['phone'];
        $email=$row['email'];
    echo"<tr>";
    echo"<td>$sub_staffId</td>";
    echo"<td>$firstName</td>";
    echo"<td>$middleName</td>";        
    echo"<td>$lastName</td>";                
    echo"<td>$phone</td>"; 
    echo"<td>$email</td>";  
    echo"<td><a href='delete-sub-staff.php?delete={$sub_staffId}'>DELETE</a></td>";          
    echo"</tr>";
    echo"<br>";
 }?>
        </table>
    </div>
</body>

</html>
