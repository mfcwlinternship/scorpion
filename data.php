<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', "");
define('DB_NAME', 'automart_demo');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


// $dateFrom = $_POST['dateFrom'];
// $date = DateTime::createFromFormat('m/d/Y',$dateFrom);
// $from_date = $date->format("Y-m-d");

// $dateTo = $_POST['dateTo'];
// $fate = DateTime::createFromFormat('m/d/Y',$dateTo);
// $to_date = $fate->format("Y-m-d");

$car = $_POST['cars'];
$client = $_POST['clients'];



echo $client;
echo $car;
if ($_POST['dateFrom'] == ""){
}
 




//query to get data from the table
$query = sprintf("SELECT sno, bestprice FROM ibb_comprehensive_tracker ORDER BY sno");

//execute query
// $result = $mysqli->query($query);

// //loop through the returned data
// $data = array();
// foreach ($result as $row) {
// 	$data[] = $row;
// }

//free memory associated with result
//$result->close();

//close connection
$mysqli->close();

//now print the data
//print json_encode($data);