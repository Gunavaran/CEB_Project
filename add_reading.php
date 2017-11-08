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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="add_reading.php" method="post">

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Meter-ID</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="put number of digits" name="meter_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" name="date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Reading</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="put number of digits" name="reading">
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>
                    <?php
                        include 'connectDB.php';
                        if (isset($_POST['meter_id']) && isset($_POST['date']) && isset($_POST['reading'])){
                            if (!empty($_POST['meter_id']) && !empty($_POST['date']) && !empty($_POST['reading'])){

                                $meter_id = mysqli_real_escape_string($link, $_POST['meter_id']);
                                $date = mysqli_real_escape_string($link, $_POST['date']);
                                $reading = mysqli_real_escape_string($link, $_POST['reading']);
                                $query = "INSERT INTO reading VALUES ('$meter_id', '$date', '$reading')";
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
?>