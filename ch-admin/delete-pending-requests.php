<?php
session_start();
require_once'../connect.php';
if(isset($_GET['delete'])){
    $staffId=$_GET['delete'];
    $query="DELETE FROM current_requests where requestId={$requestId}";
     if (mysqli_query($conn, $query)) {
        header('location:view-pending-requests.php');
    } else {
        echo "Try again!!";
    }
}
?>
