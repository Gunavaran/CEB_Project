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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="connection_request.php" method="post">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Connection Type</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="connection_type">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Resident No</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="resident_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Street</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">City</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="city">
                            </div>
                        </div>
                        <input type="submit" value="Request" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>

                    <?php
                    include 'connectDB.php';
                    if (isset($_POST['connection_type']) && isset($_POST['resident_no']) &&
                        isset($_POST['street']) && isset($_POST['city'])){
                        if (!empty($_POST['connection_type']) && !empty($_POST['resident_no']) &&
                            !empty($_POST['street']) && !empty($_POST['city'])){

                            $connection_type = $_POST['connection_type'];
                            $resident_no = $_POST['resident_no'];
                            $street = $_POST['street'];
                            $city = $_POST['city'];
                            $user_id = $_SESSION['user_id'];
                            $query = "INSERT INTO connec_req(type_name, resident_no, street, city,status,user_id) VALUES 
                                      ('$connection_type', '$resident_no', '$street','$city','Pending','$user_id')";
                            $query_run = mysqli_query($link, $query);
                            echo mysqli_error($link);

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