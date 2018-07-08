<?php
require_once ("DBController.php");
$db_handle = new DBController();
$query = "SELECT DISTINCT make FROM ibb_cardetails_tracker";
$countryResult2 = $db_handle->runQuery($query);
?>
<html>
<head>
<TITLE>Dynamically Load Dependent Dropdown on Multi-Select using PHP and
    jQuery</TITLE>


<head>
<style>
body {
    width: 1280px;
    font-family: calibri;
}

.row {
  border-radius: 4px;
  width:400px;
  float:left;
  margin: 10px 10px;
}

#dateFrom2{
    width:50%;
}
#dateTo2{
    width:50%;
}

</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
function getState() {
        var str='';
        var val=document.getElementById('country-list2');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
	$.ajax({          
        	type: "GET",
        	url: "get_state2.php",
        	data:'country_id='+str, //make or model?
        	success: function(data){
        		$("#state-list2").html(data);
        	}
	});
}
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- <style>form{width:10%; margin:100px auto;}</style> -->

    <script type="text/javascript">
        $(document).ready(function () {
                $("#dateFrom2").datepicker({
                    onClose: function () {
                        $("#dateTo2").datepicker(
                            "change", {
                            minDate: new Date($('#dateFrom2').val())
                        });
                       $("#dateFrom2").datepicker({dateFormat: "dd/mm/yy"});
                    }
                });
        
                $("#dateTo2").datepicker({
                    onClose: function () {
                        $("#dateFrom2").datepicker(
                            "change", {
                            maxDate: new Date($('#dateTo2').val())
                        });
                        $("#dateTo2").datepicker({dateFormat: "dd/mm/yy"});
                    }
                });
            });
        </script>
</head>
<body>
    <div class = "row">
        <label>Select Start Date:</label><br />
        <!-- <input type="text" id="start" placeholder="Start Date">  -->
        <input type="text" name="dateFrom2" id="dateFrom2" readonly="true" value="" class="textbox" />

        <br><br>
        <label>Select End Date:</label><br />
        <!-- <input type="text" id="end" placeholder="End Date"> -->
        <input type="text" name="dateTo2" id="dateTo2" readonly="true" value="" class="textbox" />
    </div>


    <div>
        <div class="row">
            <label>Make:</label><br /> <select
                id="country-list2" name="country-list2" 
                class="demoInputBox"
                onChange="getState();" multiple size=4>
                <option value="">Select Make</option>
<?php
foreach ($countryResult2 as $country2) {
    ?>
<option value="<?php echo $country2["make"]; ?>"><?php echo $country2["make"]; ?></option>
<?php
}
?>
</select>
        </div>
        <div class="row">
            <label>Model:</label><br /> <select name="state-list2"
                id="state-list2" class="demoInputBox" multiple size=5>
                <option value="">Select Model</option>
            </select>
        </div>
    </div>
</body>
</html>