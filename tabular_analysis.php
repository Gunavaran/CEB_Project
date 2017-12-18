<?php
include "connectDB.php";
include "log_in/core.php";

if (logged_in()) {
    include 'topbar.php';
    ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div id="page-inner">
    <div class="row">
    <div class="col-md-12">
        <?php
        $northern = array('jaffna', 'vavuniya', 'kilinochchi', 'mannar', 'mullaitivu');
        $central = array('kandy', 'nuwaraeliya', 'matale');
        $western = array('colombo', 'gampaha', 'kalutara');
        $northCentral = array('anuradhapura', 'polonnaruwa');
        $eastern = array('trincomalee', 'batticaloa', 'ampara');
        $northWestern = array('puttalam', 'kurunegala');
        $sabaragamuwa = array('ratnapura', 'kegalle');
        $uva = array('badulla', 'monaragala');
        $southern = array('hambantota', 'galle', 'matara');

        $province = array('Northern', 'Central', 'Western', 'North Central', 'Eastern', 'North Western', 'Sabaragamuwa', 'Uva', 'Southern');

        $queryReading = "SELECT meter_id,reading FROM reading";
        $queryReadingRun = mysqli_query($link, $queryReading);

        $northernCount = 0;
        $centralCount = 0;
        $westernCount = 0;
        $northCentralCount = 0;
        $easternCount = 0;
        $northWesternCount = 0;
        $sabaragamuwaCount = 0;
        $uvaCount = 0;
        $southernCount = 0;

        while ($rowReading = mysqli_fetch_assoc($queryReadingRun)) {
            $meterID = $rowReading['meter_id'];

            $detailQuery = "SELECT city FROM meter WHERE meter_id = '$meterID'";
            $detailQueryRun = mysqli_query($link, $detailQuery);
            $rowDetail = mysqli_fetch_assoc($detailQueryRun);
            $city = strtolower($rowDetail['city']);

            if (in_array($city, $northern)) {
                $northernCount += $rowReading['reading'];
            } else if (in_array($city, $central)) {
                $centralCount += $rowReading['reading'];
            } else if (in_array($city, $western)) {
                $westernCount += $rowReading['reading'];
            } else if (in_array($city, $northCentral)) {
                $northCentralCount += $rowReading['reading'];
            } else if (in_array($city, $eastern)) {
                $easternCount += $rowReading['reading'];
            } else if (in_array($city, $northWestern)) {
                $northWesternCount += $rowReading['reading'];
            } else if (in_array($city, $sabaragamuwa)) {
                $sabaragamuwaCount += $rowReading['reading'];
            } else if (in_array($city, $uva)) {
                $uvaCount += $rowReading['reading'];
            } else if (in_array($city, $southern)) {
                $southernCount += $rowReading['reading'];
            }
        }
        $provinceCount = array($northernCount, $centralCount, $westernCount, $northCentralCount, $easternCount, $northWesternCount, $sabaragamuwaCount, $uvaCount, $southernCount);
        ?>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="color: #00aff0"><b>ENERGY CONSUMPTION BASED ON PROVINCES </b></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Province</th>
                                    <th>Energy Consumption (kWh)</th>
                                </tr>
                                </thead>

                                <?php
                                $count = 0;
                                $total = 0;
                                while ($count < 8) {
                                    $total += $provinceCount[$count];
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $province[$count] ?></td>
                                        <td><?php echo $provinceCount[$count] ?></td>

                                    </tr>
                                    </tbody>


                                    <?php
                                    $count++;
                                }
                                ?>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="color: #00aff0"><b> PERCENTAGE OF CONSUMPTION </b></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Province</th>
                                    <th>Energy Consumption (%)</th>
                                </tr>
                                </thead>

                                <?php
                                $count = 0;
                                while ($count < 8) {

                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $province[$count] ?></td>
                                        <td><?php echo round($provinceCount[$count] /$total * 100) . '%' ?></td>

                                    </tr>
                                    </tbody>


                                    <?php
                                    $count++;
                                }
                                ?>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



                <!-- /. ROW  -->
                <hr/>

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
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->




    <?php
} else {
    include "log_in/log_in_page.php";
}