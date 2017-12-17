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
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="file_complaint.php" method="post">
                        <div class="form-group">
                            <label><h3>Complaint</h3></label>
                            <textarea class="form-control" rows="10" placeholder="Type your complain here...." name="complaint"></textarea>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>
                    <?php
                        include 'connectDB.php';
                        if (isset($_POST['complaint'])){
                            if (!empty($_POST['complaint'])){
                                $user_id = $_SESSION['user_id'];
                                $complaint = mysqli_real_escape_string($link, $_POST['complaint']);
                                $query = "INSERT INTO complain(user_id, message, status) VALUES ('$user_id', '$complaint', 'pending')";
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