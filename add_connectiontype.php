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

                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="add_connectiontype.php" method="post">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Type Name</label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="" name="type_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label><h3>Description</h3></label>
                            <textarea class="form-control" rows="10" placeholder="Type your complain here...." name="description"></textarea>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>

                    <?php
                        //include 'connectDB.php';
                        if (isset($_POST['type_name']) && isset($_POST['description'])){
                            if (!empty($_POST['type_name']) && !empty($_POST['description'])){

                                $type_name = mysqli_real_escape_string($link,$_POST['type_name']);
                                $description = mysqli_real_escape_string($link,$_POST['description']);
                                $query = "INSERT INTO connection_type VALUES ('$type_name', '$description')";
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