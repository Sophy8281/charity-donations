<?php
require '../../connect.php';
?>
<!DOCTYPE>
<html>

<head>
    <title>View good donations</title>
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
    <h3>All good donations</h3>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Donation Type</th>
                    <th>Branchname</th>
                    <th>Number Of Items</th>
                </tr>
            </thead>
            <?php
  $query="SELECT * from branch_donation";
        $select_donation=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_donation)){
        $branchDonationId=$row['branchDonationId'];
        $donationType=$row['donationType'];
        $branchname=$row['branchname'];    
        $numberOfItems=$row['numberOfItems'];
    echo"<tr>";
    echo"<td>$branchDonationId</td>";
    echo"<td>$donationType</td>";
    echo"<td>$branchname</td>";        
    echo"<td>$numberOfItems</td>";                
    echo"</tr>";
 }
    ?>
        </table> <br>
    </div>
    <div>
        <?php
        //clothes query
            $query="SELECT sum(numberOfItems)  from branch_donation WHERE donationType='clothes'";
            $select_clothes=mysqli_query($conn,$query);
            $data= mysqli_fetch_array($select_clothes);
            echo"Total clothes:".$data['sum(numberOfItems)'];
        echo"<br>";
        //shoes query
        $query1="SELECT sum(numberOfItems)  from branch_donation where donationType='shoes'";
        $select_shoes=mysqli_query($conn,$query1);
            $data1= mysqli_fetch_array($select_shoes);
            echo"Total shoes:".$data1['sum(numberOfItems)'];
        ?>
    </div>
</body>

</html>
