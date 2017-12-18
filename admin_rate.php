<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()){
    include 'topbar.php';
    ?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">

                </div>
                <?php
                $result = mysqli_query($link, "SELECT * FROM rate ");
                $result2 = mysqli_query($link, "SELECT * FROM unit_range ");
                echo "
                        <div class='panel-heading'>
                            <font size = '6'>Connection Details</font>
                        </div>
                        <div class= 'panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover'>
                                  
                                  <col width='10'>
                                  <col width='30'>
                                  <col width='30'>
                                  <col width='30'>
                                  <col width='30'>
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Range_ID</th>
                                            <th>Start Volume</th>
                                            <th>End Volume</th>
                                            <th>Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                while ($que_row = mysqli_fetch_assoc($result)) {
                    $range_id = $que_row['range_id'];
                    $result2 = mysqli_query($link, "SELECT * FROM unit_range WHERE range_id = $range_id ");
                    $que_row1 = mysqli_fetch_assoc($result2);
                    echo "<tr>";
                    echo "<td><font size = '2'>" . $que_row['type_name'] . "</font></td>";
                    echo "<td><font size = '2'>" . $que_row['range_id'] . "</font></td>";
                    echo "<td><font size = '2'>" . $que_row1['start_volume'] . "</font></td>";
                    echo "<td><font size = '2'>" . $que_row1['end_volume'] . "</font></td>";
                    echo "<td><font size = '2'>" . $que_row['amount'] . "</font></td>";
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