<?php
session_start();
require '../connect.php';
?>
<!DOCTYPE>
<html>

<head>
    <title>View Admin</title>
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
    <a href="add-admin.php">Add Admin</a>
    <div>
        <table>
            <thead>
                <h3>All administrator in the Charity donations</h3>
                <tr>
                    <th>AdminId</th>
                    <th>Userame</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>

            <?php
  $query="SELECT adminId,username,phone,email from admin";
        $select_admin=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_admin)){
        $adminId=$row['adminId'];
        $username=$row['username'];
        $phone=$row['phone'];
        $email=$row['email'];
    echo"<tr>";
    echo"<td>$adminId</td>";
    echo"<td>$username</td>";     
    echo"<td>$phone</td>"; 
    echo"<td>$email</td>";  
    echo"<td><a href='remove-admin.php?delete={$adminId}'>DELETE</a></td>";          
    echo"</tr>";
    echo"<br>";
 }?>
        </table>
    </div>
</body>

</html>
