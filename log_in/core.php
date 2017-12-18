<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 11/7/2017
 * Time: 1:06 AM
 */
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function logged_in(){
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
}

function getUserDetail($data){
    require 'connectDB.php';
    $user_id= $_SESSION['user_id'];

    if ($_SESSION['user_type'] == 'customer'){
        $query_user_detail = "SELECT $data FROM customer WHERE  user_id='$user_id'";
    } else if ($_SESSION['user_type'] == 'admin'){
        $query_user_detail = "SELECT $data FROM staff natural join admin WHERE user_id='$user_id'";
    } else if ($_SESSION['user_type'] == 'meter_reader') {
        $query_user_detail = "SELECT $data FROM staff natural join meter_reader WHERE user_id='$user_id'";
    }

    if ($query_user_run = mysqli_query($link,$query_user_detail)){
        $user_detail_row = mysqli_fetch_assoc($query_user_run);
        return $user_detail_row[$data];
    }
}

