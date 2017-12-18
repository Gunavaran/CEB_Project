<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()){
include 'topbar.php';
?>
    <?php
    $user_id = $_SESSION['user_id'];
    $query = "select * from current_connection where user_id = '$user_id'";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result)){
        echo $row['connection_id'];
    }

     ?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Connection Details
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Connection ID</th>
                                        <th>Connection Type</th>
                                        <th>Meter ID</th>
                                        <th>Meter Address</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $query = "select * from current_connection where user_id = '$user_id'";
                                    $result = mysqli_query($link, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $connection_id =  $row['connection_id'];
                                        $connection_type = $row['type_name'];
//                                        $connection_desc = $row['description'];
                                        $meter_id = $row['meter_id'];
                                        $meter_address = $row['resident_no'].", \n".$row['street'].", \n".$row['city'];

                                        ?>
                                        <h5>User ID: <?php echo $row['user_id'] ?></h5>
                                        <tbody>
                                        <tr class="odd gradeA">
                                            <td><?php echo $connection_id ?></td>
                                            <td><?php echo $connection_type ?></td>
                                            <td><?php echo $meter_id ?></td>
                                            <td><?php echo $meter_address ?></td>
                                        </tr>
                                        </tbody>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
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