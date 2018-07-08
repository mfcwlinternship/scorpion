<?php
header('Content-Type: application/json');
//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'automart_demo');
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
// Escape user inputs for security
//$varMake = $_POST['country-list2'];

// $dateFrom2 = $_POST['dateFrom2'];
// $date = DateTime::createFromFormat('m/d/Y',$dateFrom2);
// $from_date = $date->format("Y-m-d");

// $dateTo2 = $_POST['dateTo2'];
// $fate = DateTime::createFromFormat('m/d/Y',$dateTo2);
// $to_date = $fate->format("Y-m-d");

 
// attempt insert query execution

//All is set
if (isset($_POST['state-list2']) && !empty($_POST['state-list2']) &&
    isset($_POST['country-list2']) && !empty($_POST['country-list2']) &&
     $_POST['dateFrom2'] !=""  && $_POST['dateTo2'] != "" )
     
{

 
    $varModel = $_POST['state-list2'];
    $varMake = $_POST['country-list2'];
    $dateFrom2 = $_POST['dateFrom2'];
    $date = DateTime::createFromFormat('m/d/Y',$dateFrom2);
    $from_date = $date->format("Y-m-d");

    $dateTo2 = $_POST['dateTo2'];
    $fate = DateTime::createFromFormat('m/d/Y',$dateTo2);
    $to_date = $fate->format("Y-m-d");

    $query = sprintf("SELECT date_time, count(*) as c 
    FROM ibb_cardetails_tracker WHERE date_time BETWEEN DATE '$from_date' AND '$to_date' AND make
    = '$varMake' AND model = '$varModel' GROUP BY CAST(date_time as DATE)"); 
    
    //echo $query;
}


//date + make
else if( $_POST['dateFrom2'] !=""  && $_POST['dateTo2'] != "" && 
isset($_POST['country-list2']) && !empty($_POST['country-list2']) &&
 !(isset($_POST['state-list2']) && !empty($_POST['state-list2']))){  
   
    $varMake = $_POST['country-list2'];
    $dateFrom2 = $_POST['dateFrom2'];
    $date = DateTime::createFromFormat('m/d/Y',$dateFrom2);
    $from_date = $date->format("Y-m-d");

    $dateTo2 = $_POST['dateTo2'];
    $fate = DateTime::createFromFormat('m/d/Y',$dateTo2);
    $to_date = $fate->format("Y-m-d");
   $query = sprintf("SELECT date_time, count(*) as c 
    FROM ibb_cardetails_tracker WHERE date_time BETWEEN DATE '$from_date' AND '$to_date' AND make
    = '$varMake'  GROUP BY CAST(date_time as DATE)");  
}
//make + model

else if(isset($_POST['state-list2']) && !empty($_POST['state-list2']) &&
isset($_POST['country-list2']) && !empty($_POST['country-list2']) && $_POST['dateFrom2'] ==""  && $_POST['dateTo2'] == ""){
    $varModel = $_POST['state-list2'];
    $varMake = $_POST['country-list2'];
    $query = sprintf("SELECT date_time, count(*) as c FROM ibb_cardetails_tracker WHERE make
    = '$varMake' AND model = '$varModel' AND 
    DATE(date_time) >= last_day(now()) + INTERVAL 1 DAY - INTERVAL 3 MONTH GROUP BY CAST(date_time as DATE)"); 
}

//date only 

else if(!(isset($_POST['state-list2']) && !empty($_POST['state-list2'])) &&
!(isset($_POST['country-list2']) && !empty($_POST['country-list2'])) && $_POST['dateFrom2'] !=""  && $_POST['dateTo2'] != ""){
    $dateFrom2 = $_POST['dateFrom2'];
    $date = DateTime::createFromFormat('m/d/Y',$dateFrom2);
    $from_date = $date->format("Y-m-d");

    $dateTo2 = $_POST['dateTo2'];
    $fate = DateTime::createFromFormat('m/d/Y',$dateTo2);
    $to_date = $fate->format("Y-m-d");

    $query = sprintf("SELECT date_time, count(*) as c 
    FROM ibb_cardetails_tracker WHERE date_time BETWEEN DATE '$from_date' AND '$to_date'  GROUP BY CAST(date_time as DATE)");  
}

//make only
else if(!(isset($_POST['state-list2']) && !empty($_POST['state-list2'])) &&

    isset($_POST['country-list2']) && !empty($_POST['country-list2']) &&
    
    $_POST['dateFrom2'] ==""  && $_POST['dateTo2'] == ""){
    
     $varMake = $_POST['country-list2'];

    $query = sprintf("SELECT date_time, count(*) as c FROM ibb_cardetails_tracker WHERE make
    = '$varMake' AND 
    DATE(date_time) >= last_day(now()) + INTERVAL 1 DAY - INTERVAL 3 MONTH GROUP BY CAST(date_time as DATE)"); 

}
//nothing 
else if (!(isset($_POST['state-list2']) && !empty($_POST['state-list2'])) &&
!(isset($_POST['country-list2']) && !empty($_POST['country-list2'])) && $_POST['dateFrom2'] ==""  && $_POST['dateTo2'] == "") {

    $query = sprintf("SELECT date_time, count(*) as c FROM ibb_cardetails_tracker WHERE 
    DATE(date_time) >= last_day(now()) + INTERVAL 1 DAY - INTERVAL 3 MONTH GROUP BY CAST(date_time as DATE)"); 

}




 $result = $mysqli->query($query);

 $data = array();
foreach ($result as $row) {
	$data[] = $row;
}



// close connection
$result->close();
//close connection
$mysqli->close();
print json_encode($data);
?>