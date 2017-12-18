<?php
$id = $_GET['id'];
include 'connectDB.php';
$query = "UPDATE bill SET status = 'paid' WHERE bill_id = $id";
$query_run = mysqli_query($link, $query);
include 'admin_view_bill.php';
?>
