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
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Notification History
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Notice ID</th>
                                <th>User ID</th>
                                <th>Subject</th>
                                <th>Notice</th>
                                <th>Region</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <?php
                            $query = "select * from notice order by date desc";
                            $result = mysqli_query($link, $query);
                            while($row = mysqli_fetch_array($result)) {
                                $notice_id = $row['notice_id'];
                                $user_id = $row['user_id'];
                                $subject = $row['subject'];
                                $notice = $row['message'];
                                $region = $row['region'];
                                $date = $row['date'];
                                ?>
                                <tbody>
                                <tr class="odd gradeA">
                                    <td><?php echo $notice_id ?></td>
                                    <td><?php echo $user_id ?></td>
                                    <td><?php echo $subject ?></td>
                                    <td><?php echo $notice ?></td>
                                    <td><?php echo $region ?></td>
                                    <td><?php echo $date ?></td>
                                </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
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

