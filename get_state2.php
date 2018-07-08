<?php
require_once("DBController.php");
$db_handle = new DBController();
if(!empty($_GET['country_id'])) {
	$coun_id = $_GET["country_id"];    
	     
	$query ="SELECT DISTINCT model FROM ibb_cardetails_tracker WHERE make = '$coun_id'" ;

	$results2 = $db_handle->runQuery($query);
?>
	<option value="">Select Model</option>
<?php
	foreach($results2 as $state2) {
?>
	<option value="<?php echo $state2["model"]; ?>"><?php echo $state2["model"]; ?></option>
<?php
	}
}
?>