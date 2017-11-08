<?php
include "connectDB.php";
include "log_in/core.php";

if (!logged_in()){
    include 'topbar.php';
    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CEB-Smart</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="requestee_req_form.php" method="post">
            <div class="form-group row">
                <label class="col-2 col-form-label">Email Address</label>
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Telephone No</label>
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="" name="tel_no">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Connection Type</label>
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="" name="connection_type">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Resident No</label>
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="" name="resident_no">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Street</label>
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="" name="street">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">City</label>
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="" name="city">
                </div>
            </div>
            <input type="submit" value="Request" class="btn btn-primary" style="margin-right: 10px; float: right">
        </form>
        <?php
        if (isset($_POST['connection_type']) && isset($_POST['resident_no']) &&
            isset($_POST['street']) && isset($_POST['city'])){
            if (!empty($_POST['connection_type']) && !empty($_POST['resident_no']) &&
                !empty($_POST['street']) && !empty($_POST['city'])){
                $email = $_POST['email'];
                $tel_no = $_POST['tel_no'];
                $connection_type = $_POST['connection_type'];
                $resident_no = $_POST['resident_no'];
                $street = $_POST['street'];
                $city = $_POST['city'];
                $query_to_Requestee = "INSERT INTO requestee(email,tel_no) VALUES ('$email','$tel_no')";
                $query_to_Requestee_run = mysqli_query($link, $query_to_Requestee);
                $query_to_get_request_id = "SELECT max(requestee_id) as requestee_id from requestee where email = '$email' GROUP BY email";
                if ($query_to_get_request_id_run = mysqli_query($link, $query_to_get_request_id)) {
                        $query_row = mysqli_fetch_assoc($query_to_get_request_id_run);
                        $_SESSION['requstee_id'] = $query_row['requestee_id'];
                        header('Location: index.php');
                }
                $requestee_id = $_SESSION['requstee_id'];
                $query_to_Connection = "INSERT INTO connec_req(type_name, resident_no, street, city,status,requestee_id) VALUES 
                                      ('$connection_type', '$resident_no', '$street','$city','Pending','$requestee_id')";
                $query_run = mysqli_query($link, $query_to_Connection);
                echo mysqli_error($link);

            }
        }
        ?>
    </body>
    <?php
} else {
    include "log_in/log_in_page.php";
}