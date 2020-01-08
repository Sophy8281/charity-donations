<?php
session_start();
require_once'../connect.php';
if(isset($_GET['delete'])){
    $sub_staffId=$_GET['delete'];
    $query="DELETE FROM sub_staff where sub_staffId={$sub_staffId}";
     if (mysqli_query($conn, $query)) {
        header('location:view-sub-staff.php');
    } else {
        echo "Try again!!";
    }
}
?>