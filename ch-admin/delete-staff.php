<?php
require_once'../connect.php';
if(isset($_GET['delete'])){
    $staffId=$_GET['delete'];
    $query="DELETE FROM staff where staffId={$staffId}";
     if (mysqli_query($conn, $query)) {
        header('location:view-staff.php');
    } else {
        echo "Try again!!";
    }
}
?>
