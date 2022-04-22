<?php
include "config.php";

//query to get data from the table
$query = sprintf("SELECT datetime, pulse, oxygen FROM patient_data");

//execute query
$result = $connect->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$connect->close();

//now print the data
print json_encode($data);