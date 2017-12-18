<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()) {
    include 'topbar.php';
    ?>

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Send Notification
                        </div>
                        <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px"
                              action="send_notice.php" method="post">

                            <div class="form-group"><br/>
                                <label>User ID</label>
                                <div class="col-10">
                                    <input type="text" placeholder="All" class="form-control" name="user_id">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Region</label>
                                <div class="col-10">
                                    <select name="region" class="form-control">
                                        <option value="All">All</option>
                                        <?php
                                        $region = mysqli_query($link, "select distinct city from customer");
                                        while ($row = mysqli_fetch_array($region)) {
                                            ?>
                                            <option><?php echo $row["city"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Enter subject here..."
                                           name="subject">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Notice</label>
                                <textarea class="form-control" rows="7" placeholder="Type your notice here...."
                                          name="notice"></textarea>
                                <br/>
                                <input type="submit" value="Submit" class="btn btn-primary"
                                       style="margin-right: 10px; float: right">
                            </div>


                        </form>

                        <?php
                        if (isset($_POST['user_id']) && isset($_POST['region']) && isset($_POST['notice']) && isset($_POST['subject'])) {
                            if (!empty($_POST['region']) && !empty($_POST['notice']) && !empty($_POST['subject'])) {
                                if (empty($_POST['user_id'])) {
                                    $_POST['user_id'] = "All";
                                } else {
                                    $_POST['region'] = "All";
                                }
                                $user_id = mysqli_real_escape_string($link, $_POST['user_id']);
                                $region = mysqli_real_escape_string($link, $_POST['region']);
                                $notice = mysqli_real_escape_string($link, $_POST['notice']);
                                $subject = mysqli_real_escape_string($link, $_POST['subject']);
                                $query = "INSERT INTO notice( subject, user_id, date, message,region) VALUES 
                                      ('$subject','$user_id', NOW(), '$notice','$region')";
                                if ($query_run2 = mysqli_query($link, $query)) {
                                    echo 'Sent successfully';
                                } else {
                                    echo 'Not sent, Try again';
                                }
//                            echo mysqli_error($link);

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->
            <!--            <hr />-->

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
?>