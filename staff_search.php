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
                    $search_query = "SELECT * FROM staff WHERE NIC = '$search'";
                    $search_query_run = mysqli_query($link, $search_query);
                    if ($row = mysqli_fetch_assoc($search_query_run)) {
                    $ID = $row['user_id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $resid_no = $row['resident_no'];
                    $street = $row['street'];
                    $city = $row['city'];
                    $address = $resid_no . " " . $street . ' ' . $city;
                    $nic = $row['NIC'];
                    $email = $row['email'];

                    ?>
                    <table class="table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>NIC</th>
                                <th>email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $ID ?></td>
                                <td><?php echo $first_name ?></td>
                                <td><?php echo $last_name ?></td>
                                <td><?php echo $address ?></td>
                                <td><?php echo $nic ?></td>
                                <td><?php echo $email ?></td>
                            </tr>
                            </tbody>
                            <?php
                            } else{
                            ?>
                            <div style="margin-bottom: 50px">
                                <h3 style="color: red" > <?php echo "Sorry. Given NIC does not exist."; ?> </h3>
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
            <a href="view_staff_details.php" class="btn btn-success">Back</a>
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