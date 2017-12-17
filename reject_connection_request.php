<?php
$id = $_GET['id'];
include 'connectDB.php';
$query = "UPDATE connec_req SET status = 'Reject' WHERE req_id = $id";
$query_run = mysqli_query($link, $query);
include 'view_connection_request.php';
?>
