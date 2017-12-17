<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()) {
    include 'topbar.php';
    ?>

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">

                    <div style="width: 33%">
                        <form method="post" action="customer_search.php">
                            <div class="form-group input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i
                                    class="fa fa-search"></i>
                                                </button>
                                            </span>
                            </div>
                        </form>
                    </div>
                    <?php
                    $query = "SELECT * FROM customer";
                    $query_run = mysqli_query($link, $query);
                    ?>

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

                        <?php
                        while ($row = mysqli_fetch_assoc($query_run)) {
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
                        }
                        ?>
                    </table>


                </div>
            </div>
            <!-- /. ROW  -->
            <hr/>

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
