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
                    $result = mysqli_query($link, "SELECT * FROM complain WHERE status = 'pending' ORDER BY report_id DESC");
                    $result2 = mysqli_query($link, "SELECT * FROM complain WHERE status = 'read' ORDER BY report_id DESC");
                echo "
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <font size = '5'>Pending Complaints</font>
                    </div>
                    <div class= 'panel-body'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                              <col width='30'>
                              <col width='10'>
                              <col width='150'>
                              <col width='500'>
                              <col width='5'>
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
                    <div class='panel-heading'>
                        <font size = '5'>Read Complaints</font>
                    </div>
                    <div class= 'panel-body'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                              <col width='30'>
                              <col width='10'>
                              <col width='150'>
                              <col width='500'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User id</th>
                                        <th>Date Time</th>
                                        <th>Complaint</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row = mysqli_fetch_array($result2))
                                {
                                echo "<tr>";
                                echo "<td><font size = '2'>" . $row['report_id'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['user_id'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['date'] . "</font></td>";
                                echo "<td><font size = '2'>" . $row['message'] . "</font></td>";
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
