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
                    include 'connectDB.php';
                    $result = mysqli_query($link, "SELECT * FROM pending_bills WHERE user_id = '".$_SESSION['user_id']."'");
                    $result2 = mysqli_query($link, "SELECT * FROM paid_bills WHERE user_id = '".$_SESSION['user_id']."'");
                echo "
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <font size = '5'>Pending Bills</font>
                    </div>
                    <div class= 'panel-body'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                              <col width='5'>
                              <col width='30'>
                              <col width='30'>
                              <col width='50'>
                                <thead>
                                    <tr>
                                      <th>Bill ID</th>
                                      <th>Date</th>
                                      <th>Units</th>
                                      <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row = mysqli_fetch_array($result))
                                {
                                echo "<tr>";
                                echo "<td><font size = '2'>" . $row['bill_id'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['date'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['unit'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['amount'] . "</font></td>";
                                echo "</tr>";
                                }
                                echo "
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class='panel-heading'>
                        <font size = '5'>Paid bills</font>
                    </div>
                    <div class= 'panel-body'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                              <col width='5'>
                              <col width='30'>
                              <col width='30'>
                              <col width='50'>
                                <thead>
                                    <tr>
                                      <th>Bill ID</th>
                                      <th>Date</th>
                                      <th>Units</th>
                                      <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row = mysqli_fetch_array($result2))
                                {
                                echo "<tr>";
                                echo "<td><font size = '2'>" . $row['bill_id'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['date'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['unit'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['amount'] . "</font></td>";
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
