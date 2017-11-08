<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()){
    include 'topbar.php';
    ?>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                </div>
                <?php
                //include 'connectDB.php';
                $user_id = $_SESSION['user_id'];
                $meter_result = mysqli_query($link, "SELECT * FROM staff NATURAL JOIN meter_reader WHERE user_id = '$user_id' ");
                $admin_result = mysqli_query($link, "SELECT * FROM staff NATURAL JOIN admin WHERE user_id = '$user_id' ");
                $customer = mysqli_query($link, "SELECT * FROM customer WHERE user_id = '$user_id'");
                ?>
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
                                        <th>User id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Resident No.</th>
                                        <th>Street</th>
                                        <th>City</th>
                                        <th>NIC</th>
                                        <th>Email</th>
                                        <th>Username</th>

                                    <?php
                                        if ($_SESSION['user_type'] == 'customer') {
                                            ?>
                                            <th>Rating</th>

                                            <?php
                                        }else if ($_SESSION['user_type'] == 'admin') {
                                            ?>
                                            <th>Office No.</th>
                                            <th>Intercom</th>
                                            <th>Room No.</th>
                                            <?php
                                        }else if ($_SESSION['user_type'] == 'meter_reader') {
                                            ?>
                                            <th>Office No.</th>
                                            <th>Vehicle No.</th>
                                            <?php
                                        }
                                        ?>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                if ($_SESSION['user_type'] == 'customer') {
                                    while($row = mysqli_fetch_array($customer))
                                    {
                                    echo "<tr>";
                                        echo "<td><font size = '2'>" . $row['user_id'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['first_name'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['last_name'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['resident_no'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['street'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['city'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['NIC'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['email'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['username'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['rating'] . "</font></td>";

                                        echo "</tr>";
                                    }

                                }else if ($_SESSION['user_type'] == 'admin'){
                                    while($row = mysqli_fetch_array($admin_result))
                                    {
                                        echo "<tr>";
                                        echo "<td><font size = '2'>" . $row['user_id'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['first_name'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['last_name'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['resident_no'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['street'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['city'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['NIC'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['email'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['username'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['office_no'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['intercom'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['room_no'] . "</font></td>";

                                        echo "</tr>";
                                    }
                                }else if ($_SESSION['user_type'] == 'meter_reader'){
                                    while($row = mysqli_fetch_array($meter_result))
                                    {
                                        echo "<tr>";
                                        echo "<td><font size = '2'>" . $row['user_id'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['first_name'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['last_name'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['resident_no'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['street'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['city'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['NIC'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['email'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['username'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['office_no'] . "</font></td>";
                                        echo "<td><font size = '2'>" . $row['vehicle_id'] . "</font></td>";

                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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