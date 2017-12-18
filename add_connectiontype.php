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
                    <?php
                    $que = "SELECT * FROM unit_range";
                    $que_run = mysqli_query($link, $que);
                    $que_row = mysqli_fetch_assoc($que_run);
                    $que_row2 = mysqli_fetch_assoc($que_run);
                    $que_row3 = mysqli_fetch_assoc($que_run);
                    $que_row4 = mysqli_fetch_assoc($que_run);

                    ?>
                    <form class="form-horizontal" role="form" style="margin-left: 20px; margin-right: 30px" action="add_connectiontype.php" method="post">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Type Name</label>
                            <div class="col-10">
                                <input type="text" style = "width: 400px" class="form-control" placeholder=" Enter connection type.." name="type_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="range_id">
                                <span>Range_ID :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row['range_id'] ?>" style = "width: 150px" name="range_id" />
                            </label>
                            <label for="start_volume" >
                                <span>Start Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row['start_volume'] ?>"id="start_volume" />
                            </label>
                            <label for="end_volume" >
                                <span>End Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row['end_volume'] ?>" id="end_volume" />
                            </label>
                            <label for="rate1" >
                                <span>Rate :&nbsp;</span>
                                <input type="text" name="rate1" />
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="range_id">
                                <span>Range_ID :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row2['range_id'] ?>" style = "width: 150px" name="range_id" />
                            </label>
                            <label for="start_volume" >
                                <span>Start Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row2['start_volume'] ?>" id="start_volume" />
                            </label>
                            <label for="end_volume" >
                                <span>End Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row2['end_volume'] ?>" id="end_volume" />
                            </label>
                            <label for="rate2" >
                                <span>Rate :&nbsp;</span>
                                <input type="text" name="rate2" />
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="range_id">
                                <span>Range_ID :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row3['range_id'] ?>" style = "width: 150px" name="range_id" />
                            </label>
                            <label for="start_volume" >
                                <span>Start Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row3['start_volume'] ?>" id="start_volume" />
                            </label>
                            <label for="end_volume" >
                                <span>End Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row3['end_volume'] ?>" id="end_volume" />
                            </label>
                            <label for="rate3" >
                                <span>Rate :&nbsp;</span>
                                <input type="text" name="rate3" />
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="range_id">
                                <span>Range_ID :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row4['range_id'] ?>" style = "width: 150px" name="range_id" />
                            </label>
                            <label for="start_volume" >
                                <span>Start Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row4['start_volume'] ?>" id="start_volume" />
                            </label>
                            <label for="end_volume" >
                                <span>End Volume :&nbsp;</span>
                                <input type="text" value="<?php echo $que_row4['end_volume'] ?>" id="end_volume" />
                            </label>
                            <label for="rate4" >
                                <span>Rate :&nbsp;</span>
                                <input type="text" name="rate4" />
                            </label>
                        </div>
                        <div class="form-group">
                            <label><h3>Description</h3></label>
                            <textarea class="form-control" rows="10" placeholder="Type your description here...." name="description"></textarea>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary" style="margin-right: 10px; float: right" >
                    </form>

                    <?php
                        if (isset($_POST['type_name']) && isset($_POST['description'])){
                            if (!empty($_POST['type_name']) && !empty($_POST['description'])){

                                $type_name = mysqli_real_escape_string($link,$_POST['type_name']);
                                $description = mysqli_real_escape_string($link,$_POST['description']);
                                $query = "INSERT INTO connection_type VALUES ('$type_name', '$description')";
                                $query_run = mysqli_query($link, $query);
                            }
                        }
                    if (isset($_POST['rate1']) && isset($_POST['rate2']) && isset($_POST['rate3']) && !empty($_POST['rate4'])){
                        if (!empty($_POST['rate1']) && !empty($_POST['rate2']) && !empty($_POST['rate3']) && !empty($_POST['rate4'])){

                            mysqli_autocommit($link,FALSE);
                            $type_name = mysqli_real_escape_string($link,$_POST['type_name']);
                            $rate1 = mysqli_real_escape_string($link,$_POST['rate1']);
                            $rate2 = mysqli_real_escape_string($link,$_POST['rate2']);
                            $rate3 = mysqli_real_escape_string($link,$_POST['rate3']);
                            $rate4 = mysqli_real_escape_string($link,$_POST['rate4']);


                            $que1 = "SELECT * FROM unit_range";
                            $que_run1 = mysqli_query($link, $que1);
                            $que_row_new = mysqli_fetch_assoc($que_run1);
                            $que_row_new1 = mysqli_fetch_assoc($que_run1);
                            $que_row_new2 = mysqli_fetch_assoc($que_run1);
                            $que_row_new3 = mysqli_fetch_assoc($que_run1);
                            $range_id = $que_row_new['range_id'];
                            $range_id1 = $que_row_new1['range_id'];
                            $range_id2 = $que_row_new2['range_id'];
                            $range_id3 = $que_row_new3['range_id'];

                            $query1 = "INSERT INTO rate VALUES ('$type_name', '$range_id', '$rate1')";
                            $query2 = "INSERT INTO rate VALUES ('$type_name', '$range_id1', '$rate2')";
                            $query3 = "INSERT INTO rate VALUES ('$type_name', '$range_id2', '$rate3')";
                            $query4 = "INSERT INTO rate VALUES ('$type_name', '$range_id3', '$rate4')";

                            $query_run1 = mysqli_query($link, $query1);
                            $query_run2 = mysqli_query($link, $query2);
                            $query_run3 = mysqli_query($link, $query3);
                            $query_run4 = mysqli_query($link, $query4);
                            mysqli_commit($link);
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