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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Other Connection Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Connection Type</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $query = "select * from connection_type";
                                    $result = mysqli_query($link, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $connection_type = $row['type_name'];
                                        $description = $row['description'];
                                        ?>
                                        <tbody>
                                        <tr class="odd gradeA">
                                            <td><?php echo $connection_type ?></td>
                                            <td><?php echo $description ?></td>
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