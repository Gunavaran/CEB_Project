<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/8/2017
 * Time: 4:35 PM
 */

include "connectDB.php";
include "log_in/core.php";

if (logged_in()){
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="log_in/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                    <?php
                    include "sidebar.php"
                    ?>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post" role="form" style="margin-left: 20px; margin-right: 30px" action="meter_reader.php">

                            <div class="form-group row">
                                <label class="col-2 col-form-label">First Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="first_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Last Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Residence No.</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="resid_no">
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
                            <div class="form-group row">
                                <label class="col-2 col-form-label">NIC</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="nic">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">E-mail</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">User Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="user_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Password</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Office No.</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="office_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Vehicle No.</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="" name="vehicle_id">
                                </div>
                            </div>

                            <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                        </form>
                        <?php
                        //include 'connectDB.php';
                        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['resid_no']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['nic']) && isset($_POST['email']) && isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['office_no']) && isset($_POST['vehicle_id'])){
                            if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['resid_no']) && !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['nic']) && !empty($_POST['email']) && !empty($_POST['user_name']) && !empty($_POST['password']) && !empty($_POST['office_no']) && !empty($_POST['vehicle_id'])){
                                $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
                                $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
                                $resid_no = mysqli_real_escape_string($link, $_POST['resid_no']);
                                $street = mysqli_real_escape_string($link, $_POST['street']);
                                $city = mysqli_real_escape_string($link, $_POST['city']);
                                $nic = mysqli_real_escape_string($link, $_POST['nic']);
                                $email = mysqli_real_escape_string($link, $_POST['email']);
                                $user_name = mysqli_real_escape_string($link, $_POST['user_name']);
                                $password = mysqli_real_escape_string($link, $_POST['password']);
                                $office_no = mysqli_real_escape_string($link, $_POST['office_no']);
                                $vehicle_id = mysqli_real_escape_string($link, $_POST['vehicle_id']);
                                $query = "INSERT INTO staff(first_name, last_name, resident_no, street, city, NIC, email, username, password, office_no) VALUES ('$first_name', '$last_name', '$resid_no', '$street', '$city', '$nic', '$email', '$user_name', '$password', '$office_no')";
                                $query1 = "INSERT INTO meter_reader(vehicle_id) VALUES ('$vehicle_id') ";
                                $query_run = mysqli_query($link, $query);
                                $query_run2 = mysqli_query($link, $query1);

                            }
                        }

                        ?>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    </body>
    </html>
    <?php
} else {
    include "log_in/log_in_page.php";
}
?>