<?php
include "connectDB.php";


if ($_SESSION['user_type'] == 'customer'){
?>

<li>
    <a  href="cus_account_setting.php"><i class="fa fa-dashboard fa-3x"></i> Account Settings</a>
</li>
<li>
    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Connection<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="connection_request.php">Request Connection</a>
        </li>
        <li>
            <a href="#">Current Connection</a>
        </li>
        <li>
            <a href="#">View Connection Details</a>
        </li>

    </ul>
</li>

<li>
    <a  href="file_complaint.php"><i class="fa fa-dashboard fa-3x"></i> Complaint</a>
</li>

<li>
    <a  href="#"><i class="fa fa-dashboard fa-3x"></i> Bills</a>
</li>

<li>
    <a  href="#"><i class="fa fa-dashboard fa-3x"></i> Notifications</a>
</li>

<li>
    <a  href=""><i class="fa fa-dashboard fa-3x"></i> Rates </a>
</li>



<?php
} else if ($_SESSION['user_type'] == 'admin') {
    ?>
    <li>
        <a href="stf_account_setting.php"><i class="fa fa-dashboard fa-3x"></i> Account Settings</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-sitemap fa-3x"></i> View Details<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="view_meter_details.php">Meter Details</a>
            </li>
            <li>
                <a href="view_customer_details.php">Customer Details</a>
            </li>
            <li>
                <a href="view_staff_details.php">Staff Details</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-dashboard fa-3x"></i> Send Notice</a>
    </li>

    <li>
        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Add User <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="meter_reader.php">Meter Reader</a>
            </li>
            <li>
                <a href="customer.php">Customer</a>
            </li>
            <li>
                <a href="admin.php">Admin</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="new_meter.php"><i class="fa fa-dashboard fa-3x"></i> Meter Installation</a>
    </li>

    <li>
        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Connection<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="view_connection_request.php">Connection Requests</a>
            </li>
            <li>
                <a href="add_connectiontype.php">Add Connection Type</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Complaint<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="look_complain.php">View Complaint</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Rate<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="look_complain.php">Range</a>
            </li>
            <li>
                <a href="file_complaint.php">Rate</a>
            </li>
        </ul>
    </li>

    <?php
} else if ($_SESSION['user_type'] == 'meter_reader') {

    ?>
    <li>
        <a href="stf_account_setting.php"><i class="fa fa-dashboard fa-3x"></i> Account Settings</a>
    </li>

    <li>
        <a href="add_reading.php"><i class="fa fa-dashboard fa-3x"></i> Add Reading</a>
    </li>

    <li>
        <a href=""><i class="fa fa-dashboard fa-3x"></i> Rates </a>
    </li>

    <?php
}
?>
