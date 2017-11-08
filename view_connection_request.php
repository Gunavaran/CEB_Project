<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()) {
    include 'topbar.php';
?>

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <?php
//                    $query = "SELECT * FROM complain";
                    ?>

                </div>
                <?php
                $result = mysqli_query($link, "SELECT * FROM connec_req WHERE status = 'Pending' ORDER BY req_id DESC");
                echo "
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <font size = '6'>Connection Requests</font>
                    </div>
                    <div class= 'panel-body'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                              <col width='10'>
                              <col width='30'>
                              <col width='30'>
                              <col width='60'>
                              <col width='200'>
                              <col width='100'>
                              <col width='30'>
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>User ID</th>
                                        <th>Requestee ID</th>
                                        <th>Connection Type</th>
                                        <th>Address</th>
                                        <th>Requested Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>";
                while($row = mysqli_fetch_array($result))
                {
                    $address = $row['resident_no'].",\n".$row['street'].",\n".$row['city'];
                    echo "<tr>";
                    echo "<td><font size = '2'>" . $row['req_id'] . "</font></td>";
                    if($row['user_id']==null)
                        echo "<td><font size = '2'>" . "-" . "</font></td>";
                    else
                        echo "<td><font size = '2'>" . $row['user_id'] . "</font></td>";
                    if($row['requestee_id']==null)
                        echo "<td><font size = '2'>" . "-" . "</font></td>";
                    else
                        echo "<td><font size = '2'>" . $row['requestee_id'] . "</font></td>";
                    echo "<td><font size = '2'>" . $row['type_name'] . "</font></td>";
                    echo "<td><font size = '2'>" . $address . "</font></td>";
                    echo "<td><font size = '2'>" . $row['req_date'] . "</font></td>";
                    echo "<td><font size = '2'>" . $row['status'] . "</font></td>";
                    echo "<td><a href='accept_connection_request.php?id=".$row['req_id']."'><button><font size = '2'>Accept</font></button></a></td>";
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