<?php
include "config.php";

// $records = mysqli_query($connect,"SELECT * FROM `patient_data` WHERE DATE(datetime) >= (DATE(NOW()) - INTERVAL 10 DAY)");
// $dailyrecords = mysqli_query($connect,"SELECT * FROM `patient_data` WHERE DATE(datetime) >= (DATE(NOW()) - INTERVAL 1 DAY)");
$records = mysqli_query($connect,"SELECT * FROM `patient_data`");
$dailyrecords = mysqli_query($connect,"SELECT * FROM `patient_data`");

