<?php
require '../../connect.php';
?>
<!DOCTYPE>
<html>

<head>
    <title>View money donations</title>
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
        <h3>All money donations</h3>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Amount</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php
  $query="SELECT * from money_donation";
        $select_donation=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_donation)){
        $moneyDonationId=$row['moneyDonationId'];
        $amount=$row['amount'];
        $email=$row['email'];    
    echo"<tr>";
    echo"<td>$moneyDonationId</td>";
    echo"<td>$amount</td>";
    echo"<td>$email</td>";                
    echo"</tr>";
 }
    ?>
        </table> <br>
    </div>
    <div>
        <br>
        <?php
            $query="SELECT sum(amount)  from money_donation";
            $select_amount=mysqli_query($conn,$query);
            $data= mysqli_fetch_array($select_amount);
            echo"Total amount:".$data['sum(amount)'];
        echo"<br>";
        ?>
    </div>
</body>

</html>
