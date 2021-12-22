<?php
require('config.php');
$query = "SELECT nameOfProduct, january, february, march, april, may, june, july, august, september, october, november, december FROM salesreport";
$result = mysqli_query($db_link, $query);

$data = array();
foreach ($result as $row) {
 $data[] = $row;
}
$result->close();

print json_encode($data);
