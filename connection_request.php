<?php
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
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="connection_request.php" method="post">
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
                    include 'connectDB.php';
                    if (isset($_POST['connection_type']) && isset($_POST['resident_no']) &&
                        isset($_POST['street']) && isset($_POST['city'])){
                        if (!empty($_POST['connection_type']) && !empty($_POST['resident_no']) &&
                            !empty($_POST['street']) && !empty($_POST['city'])){

                            $connection_type = $_POST['connection_type'];
                            $resident_no = $_POST['resident_no'];
                            $street = $_POST['street'];
                            $city = $_POST['city'];
                            $user_id = $_SESSION['user_id'];
                            $query = "INSERT INTO connec_req(type_name, resident_no, street, city,status,user_id) VALUES 
                                      ('$connection_type', '$resident_no', '$street','$city','Pending','$user_id')";
                            $query_run = mysqli_query($link, $query);
                            echo mysqli_error($link);

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