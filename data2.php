<?php
require('config.php');
$query = "SELECT nameOfProduct, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM salesreport2";
$result = mysqli_query($db_link, $query);

$data = array();
foreach ($result as $row) {
 $data[] = $row;
}
$result->close();

print json_encode($data);
