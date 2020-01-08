<?php
require '../../connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Allocate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../styles/adminhome.css">
    <link rel="stylesheet" type="text/css" href="../../styles/view.css">
    <link rel="stylesheet" type="text/css" href="styles/allocate-donation.css">
</head>

<body>
    <div id="header">
        <img class="logo" id="charitylogo" src="../../images/logo.png" alt="logo">
        <h3>Charity Donations and Allocation</h3>
    </div>
    <img src="../../images/users.jpg" style="width:100%">
    <div class="box">
        <a href="staff-home.php">Back</a>
        <h2>Allocation</h2>
        <form action="allocate-donation.php" method="post">
            <div class="Inputbox">
                <input class="numberinput" type="number" name="money" required="">
                <lable>Money amount</lable><br><br>
                <input class="numberinput" type="number" name="clothes" required="">
                <lable>Clothes number</lable><br><br>
                <input class="numberinput" type="number" name="shoes" required="">
                <lable>Shoes number</lable><br><br>
                <input class="input" type="name" name="substaffName" required="">
                <lable>Sub Staff</lable><br><br>
                <input class="input" type="name" name="recipientName" required="">
                <lable>Recipient</lable><br><br>
                <input class="input" type="name" name="county" required="">
                <lable>County</lable><br><br>
                <input class="button" type="submit" name="allocate" value="Allocate">
            </div>
        </form>
        <?php
   if (isset($_POST['allocate']))
   {
$money=$_POST['money'];
$clothes=$_POST['clothes'];
$shoes=$_POST['shoes'];
$substaffName=$_POST['substaffName'];
$recipientName=$_POST['recipientName'];
$county=$_POST['county'];
/*Select last update on monitor_donation*/
$query="select * from monitor_donation ORDER BY monitorId DESC LIMIT 1";
$select_donation=mysqli_query($conn, $query);
$data=mysqli_fetch_array($select_donation);
/*Check if there are sufficient donations*/
if($data[1]>=$money && $data[2]>=$clothes && $data[3]>=$shoes)
{ $total_money=$data[1]-$money;
$total_clothes =$data[2]-$clothes;
$total_shoes= $data[3]-$shoes;
/*Select last update on monitor_requests*/
if (mysqli_query($conn, $query)) {
$query1="select * from monitor_requests ORDER BY monitorId DESC LIMIT 1";
$select_request=mysqli_query($conn, $query1);
$request=mysqli_fetch_array($select_request);
/*Check if there are pending requests*/
if($request[1]>0){
$total_requests=$request[1]-1;
/*Update monitor_requests */
if (mysqli_query($conn, $query1)) {
$query2="insert into monitor_requests(total_requests) values('$total_requests')";
/*Update monitor_donation*/
if (mysqli_query($conn, $query2)) {
$query3="insert into monitor_donation(total_money,total_clothes,total_shoes)
values('$total_money','$total_clothes','$total_shoes')";
/*Update allocation*/
if (mysqli_query($conn, $query3))    {  
$query4= "insert into allocation (money,clothes,shoes,substaffName,recipientName,county)
values ('$money', '$clothes', '$shoes','$substaffName','$recipientName','$county')";
/*Check if all updates are successful*/
if (mysqli_query($conn,$query4))    {  
header("location:update-requests.php");
}else{echo "Error: " . $query . "<br>" . mysqli_error($conn);}    
}else{echo "Error: " . $query . "<br>" . mysqli_error($conn);}
}else{echo "Error: " . $query . "<br>" . mysqli_error($conn);}
}else{echo "Error: " . $query . "<br>" . mysqli_error($conn);}
}else{echo"No pending requests!!";}
}else{echo "Error: " . $query . "<br>" . mysqli_error($conn);}
}else {echo"Insufficient donations!!";}}
?>
    </div>
    <div>
        <table>
            <thead>
                <h3>Sub_staff</h3>
                <tr>
                    <th>Sub-StaffId</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php
  $query="SELECT * from sub_staff";
        $select_staff=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_staff)){
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
    echo"</tr>";
 }?>
        </table>
    </div>
    <br>
    <div>
        <table>
            <thead>
                <h3>Pending requests</h3>
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
    echo"</tr>";
 }?>
        </table>
    </div>
    <div>
        <table>
            <thead>
                <h3>Recipients</h3>
                <tr>
                    <th>Recipient Id</th>
                    <th>recipient Name</th>
                    <th>Email</th>
                    <th>County</th>
                    <th>Location Description</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <?php
  $query="SELECT recipientId,recipientName,email,county,location_description,phone from recipient";
        $select_recipient=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($select_recipient)){
        $recipientId=$row['recipientId'];
        $recipientName=$row['recipientName'];
        $email=$row['email'];
        $county=$row['county'];    
        $location_description=$row['location_description'];
        $phone=$row['phone'];
        
    echo"<tr>";
    echo"<td>$recipientId</td>";
    echo"<td>$recipientName</td>";
    echo"<td>$email</td>";               
    echo"<td>$county</td>";        
    echo"<td>$location_description</td>"; 
    echo"<td>$phone</td>";           
    echo"</tr>";
 }?>
        </table>
    </div>

</body>

</html>
