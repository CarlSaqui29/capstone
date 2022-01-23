<?php
require('config.php');
$query = "SELECT nameOfProduct, week1, week2, week3, week4 FROM salesreport1";
$result = mysqli_query($db_link, $query);

$data = array();
foreach ($result as $row) {
 $data[] = $row;
}
$result->close();

print json_encode($data);
