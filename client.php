<?php

require_once ("DBController.php");

$db_handle_deux = new DBController;

$query = "SELECT DISTINCT cpmodule FROM ibb_cardetails_tracker";


$result = $db_handle_deux->runQuery($query);

?>

<html>

    <head>
    <style type="text/css">
            .demoInputBox{
                width: 50%;
            }    
        </style> 
    </head>

    <body>
        <div class="row">
                <label>Client:</label><br /> 
                    <select
                    id="client-list" name="client-list" 
                    class="demoInputBox"
                     multiple size=4>

                        <option value="">Select Client</option>
                            <?php
                                foreach ($result as $country) {
                            ?>
                        <option value="<?php echo $country["cpmodule"]; ?>"><?php echo $country["cpmodule"]; ?></option>
                            <?php
                                }
                            ?>
                    </select>
        </div>



    </body> 



</html>