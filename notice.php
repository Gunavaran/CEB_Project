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
                    Notification Panel
                </div>
                <div class="panel-body">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $city_result = mysqli_query($link,"select city from customer where user_id='$user_id'");
                    while($row =  mysqli_fetch_array($city_result))
                    {
                        $city = $row['city'];
                    }
                    $query = "select * from notice where (user_id='All' or user_id='$user_id') and (region='All' or region='$city') order by date desc";
                    $result = mysqli_query($link,$query);
                    $collapse_id = 0;
                    while($row = mysqli_fetch_array($result)) {
                    $message = $row['message'];
                    $date = $row['date'];
                    $subject = $row['subject'];
                    $collapse_id++;
                    ?>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href='#<?php echo $collapse_id ?>'
                                           class="collapsed"><?php echo $subject?> </a>
                                    </h4>
                                </div>
                                <div id='<?php echo $collapse_id ?>' class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <?php echo $message ?>
                                        <br/>
                                        <?php echo "(".$date.")"?>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <?php

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

            <div class="row">
                        <div class="col-md-12">

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