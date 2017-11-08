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
            <a class="navbar-brand" href="index.php">Binary admin</a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                </li>

                <?php
                include "sidebar.php";
                ?>

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $query = "SELECT * FROM complain";
                    ?>

                </div>
                <?php
                    include 'connectDB.php';
                    $result = mysqli_query($link, "SELECT * FROM complain WHERE status = 'pending' ORDER BY report_id DESC");
                echo "
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <font size = '6'>Complaints</font>
                    </div>
                    <div class= 'panel-body'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                              <col width='30'>
                              <col width='10'>
                              <col width='100'>
                              <col width='10'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User id</th>
                                        <th>Date Time</th>
                                        <th>Complaint</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row = mysqli_fetch_array($result))
                                {
                                echo "<tr>";
                                echo "<td><font size = '2'>" . $row['report_id'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['user_id'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['date'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['message'] . "</font></td>";
                                echo "<td><a href='read_complaint.php?id=".$row['report_id']."'><button><font size = '2'>Read</font></button></a></td>";
                                echo "</tr>";
                                }
                                echo "
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>";
                ?>

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