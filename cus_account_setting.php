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
                    <?php
                        $que = "SELECT * FROM customer WHERE user_id = ".$_SESSION['user_id'];
                        $que_run = mysqli_query($link, $que);
                        $que_row = mysqli_fetch_assoc($que_run);
                    ?>
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="cus_account_setting.php" method="post">

                      <div class="form-group row">
                          <label class="col-2 col-form-label">First Name</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['first_name'] ?>" class="form-control" placeholder="" name="first_name">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-2 col-form-label">Last Name</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['last_name'] ?>" class="form-control" placeholder="" name="last_name">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-2 col-form-label">Residence No.</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['resident_no'] ?>" class="form-control" placeholder="" name="resid_no">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-2 col-form-label">Street</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['street'] ?>" class="form-control" placeholder="" name="street">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-2 col-form-label">City</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['city'] ?>" class="form-control" placeholder="" name="city">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-2 col-form-label">NIC</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['NIC'] ?>" class="form-control" placeholder="" name="nic">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-2 col-form-label">E-mail</label>
                          <div class="col-10">
                              <input type="text" value="<?php echo $que_row['email'] ?>" class="form-control" placeholder="" name="email">
                          </div>
                      </div>
                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right">
                    </form>
                    <?php
                    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['resid_no']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['nic']) && isset($_POST['email'])){
                        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['resid_no']) && !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['nic']) && !empty($_POST['email'])){

                            $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
                            $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
                            $resid_no = mysqli_real_escape_string($link, $_POST['resid_no']);
                            $street = mysqli_real_escape_string($link, $_POST['street']);
                            $city = mysqli_real_escape_string($link, $_POST['city']);
                            $nic = mysqli_real_escape_string($link, $_POST['nic']);
                            $email = mysqli_real_escape_string($link, $_POST['email']);
                            $query = "UPDATE customer SET first_name='$first_name', last_name='$last_name', resident_no='$resid_no', street='$street', city='$city', NIC='$nic', email='$email' WHERE user_id =".$_SESSION['user_id'];
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
