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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="new_connection.php" method="post">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Connection_ID</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="connec_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">User ID</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="user_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Meter_ID</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="meter_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Connection Type</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="connec_type">
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>
                    <?php
                        include 'connectDB.php';
                        if (isset($_POST['connec_id']) && isset($_POST['user_id']) && isset($_POST['meter_id']) && isset($_POST['connec_type'])){
                            if (!empty($_POST['connec_id']) && !empty($_POST['user_id']) && !empty($_POST['meter_id']) && !empty($_POST['connec_type'])){

                                $connec_id = $_POST['connec_id'];
                                $user_id = $_POST['user_id'];
                                $meter_id = $_POST['meter_id'];
                                $connec_type = $_POST['connec_type'];
                                $query = "INSERT INTO connection VALUES ('$connec_id', '$user_id', '$meter_id', '$connec_type')";
                                $query_run = mysqli_query($link, $query);

                            }
                        }
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