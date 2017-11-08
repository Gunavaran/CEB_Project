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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="new_meter.php" method="post">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Meter_ID</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="meter_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Resident no</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="resno">
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

                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>
                    <?php
                        include 'connectDB.php';
                        if (isset($_POST['meter_id']) && isset($_POST['resno']) && isset($_POST['city']) && isset($_POST['street'])){
                            if (!empty($_POST['meter_id']) && !empty($_POST['resno']) && !empty($_POST['city']) && !empty($_POST['street'])){

                                $meter_id = $_POST['meter_id'];
                                $resno = $_POST['resno'];
                                $street = $_POST['street'];
                                $city = $_POST['city'];
                                $query = "INSERT INTO meter VALUES ('$meter_id', '$resno', '$street', '$city')";
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