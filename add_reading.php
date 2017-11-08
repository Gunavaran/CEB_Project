
/**
* Created by PhpStorm.
* User: Start
* Date: 10/30/2017
* Time: 10:24 PM
*/
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
            <a class="navbar-brand" href="index.html">CEB ENTRIES</a>
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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="add_reading.php" method="post">

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Meter-ID</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="put number of digits" name="meter_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" name="date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Reading</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="put number of digits" name="reading">
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>
                    <?php
                        include 'connectDB.php';
                        if (isset($_POST['meter_id']) && isset($_POST['date']) && isset($_POST['reading'])){
                            if (!empty($_POST['meter_id']) && !empty($_POST['date']) && !empty($_POST['reading'])){

                                $meter_id = mysqli_real_escape_string($link, $_POST['meter_id']);
                                $date = mysqli_real_escape_string($link, $_POST['date']);
                                $reading = mysqli_real_escape_string($link, $_POST['reading']);
                                $query = "INSERT INTO reading VALUES ('$meter_id', '$date', '$reading')";
                                $query_run = mysqli_query($link, $query);

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
