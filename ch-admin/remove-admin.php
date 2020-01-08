<?php
session_start();
require_once'../connect.php';
if(isset($_GET['delete'])){
    $adminId=$_GET['delete'];
    $query="DELETE FROM admin where adminId={$adminId}";
     if (mysqli_query($conn, $query)) {
        header('location:see-admin.php');
    } else {
        echo "Try again!!";
    }
}
?>
