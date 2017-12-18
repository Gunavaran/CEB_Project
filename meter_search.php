<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()){
    include 'topbar.php';
    ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <?php

                    if (isset($_POST['search'])){
                        if (!empty($_POST['search'])) {
                            $search = $_POST['search'];
                            $search_query = "SELECT * FROM meter WHERE meter_id = '$search'";
                            $search_query_run = mysqli_query($link, $search_query);
                            if($row = mysqli_fetch_assoc($search_query_run)){
                                $ID = $row['meter_id'];
                                $resid_no = $row['resident_no'];
                                $street = $row['street'];
                                $city = $row['city'];
                                $address = $resid_no . " " . $street . ' ' . $city;

                                ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Meter ID</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $ID ?></td>
                            <td><?php echo $address ?></td>
                        </tr>
                        </tbody>

                        <?php
                        } else{
                        ?>
                        <div style="margin-bottom: 50px">
                            <h3 style="color: red" > <?php echo "Sorry. Given Meter ID does not exist."; ?> </h3>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        }
                        }
                        ?>
                </div>

            </div>
            <!-- /. ROW  -->
            <a style="margin-top:" href="view_meter_details.php" class="btn btn-success">Back</a>
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

    <?php
} else {
    include "log_in/log_in_page.php";
}