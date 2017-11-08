<?php
  $id = $_GET['id'];
  include 'connectDB.php';
  $query = "UPDATE complain SET status = 'read' WHERE report_id = $id";
  $query_run = mysqli_query($link, $query);
  include 'look_complain.php';
?>
