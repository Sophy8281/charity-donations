<?php
require '../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>view recipient</title>
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
        <h3>All money donations in CHARITY DONATIONS ORGANIZATION</h3>
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
