<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 7/1/2017
 * Time: 3:14 PM
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ceb';

$link = mysqli_connect($host,$username,$password,$database) or die ("could not connect");
