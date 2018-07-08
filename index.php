<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>IBB Product Admin</title>
    
    <!-- Bootstrap core CSS -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- <style>form{width:10%; margin:100px auto;}</style> -->


    <style type = "text/css">
        .btn{
            margin: 10px 9px;
            text-color:black;
            width:90%;
        }
        .btn2{
          margin: 10px 120px;
        }
        #chart-container{
          height:auto;
          width: auto;
          position: absolute;
          top: 140px;
          left: 105%
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="images/logo.png" alt="ibb logo" class="img-responsive logo"></a>
            </div>
            <div class="clearfix"></div>
            
            <!-- sidebar menu -->
                
            <form method="post" id="result_form">
                <?php include 'indexog.php';?>
                <br>
                <?php include 'client.php';?>
                <br>
                <?php include 'location.php';?>
                <br>
        
                <input type="submit" class="btn" id="submitButton"  value="Submit" />
                <br />

                <!-- <input type="submit" value="Submit" id="result_button"> -->
                
                <input type="reset" class="btn" value="Reset Values"/> 

                <style type="text/css">
                    #chart-container {
                        width: 1000px;
                        height: auto;
                    }
                    </style>
                        <center><div id="chart-container">

                        <canvas id="mycanvas" class = "mycanvas"></canvas>
                        </div></center>
                        <input type="submit" class="btn" action = "index.php" value="Refresh - If page lags"/>
                        <input type="submit" class="btn" id= "json" action = "insert.php"  value="Get Data in JSON format"/>
            </form>

            <form method="post" id="result_form2" class = "co" >


                  <div style = "display:none" id="rah">
                    <?php include 'indexog2.php';?>
                    <br>
                    <?php include 'client.php';?>
                    <br>
                    <?php include 'location.php';?>
                    <input type="submit" class="btn" id="submitButton2" value="Compare" />

                  </div>
                

                <style type="text/css">
                    #chart-container {
                        width: 1000px;
                        height: auto;
                    }
                </style>
                        <center><div id="chart-container">
                        <canvas id="mycanvas" class = "mycanvas"></canvas>
                        </div></center>
            </form>
            
           

            <input type="checkbox" class = "btn2" id="myCheck"  onclick="myFunction()">Compare Two Datasets</input>

            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.png" alt="">Super Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
                  </ul>
                </li>
                
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-green">2</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-red">2</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        
        <div class="right_col" role="main">
          <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">Dashboard</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
               
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="text-center">
           Copyright &copy; 2018 All rights reserved. <img src="images/logo.png">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script>
         $("#submitButton").click(function(e) {

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "http://localhost/chartjs/insert.php",
                


            // The location of insert php was changed to fit my computer 


                data: $('#result_form').serialize(),
                success: function(data) {
                    console.log(data);
                    var date_time = [];
                    var c =  [];
                    
                    

                    for(var i in data) {
                        date_time.push(data[i].date_time);
                        c.push(data[i].c);
                        
                    }

                  

                    

                    var chartdata = {
                        labels: date_time,
                        datasets : [
                            {
                                label: "Chart 1", //make this change dynamically 
                                backgroundColor: 'rgba(0, 0, 0, 0)',
                                borderColor: 'rgba(0, 255, 0, 1)',
                                // hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                // hoverBorderColor: 'rgba(200, 200, 0, 0.75)',

                                data: c
                                
                            },
                          
                          

                        ]
                    }

                    
                  
                    $('#mycanvas').remove();
                    $('#chart-container').append('<canvas id="mycanvas"></canvas>');
                    

                    
                    var ctx = $("#mycanvas");


                    
                    if(barGraph == null){
                        
                        var barGraph = new Chart(ctx, {
                          type: "line",
                          data: chartdata,
                          options:{
                          scales: {
                              yAxes: [{
                                  scaleLabel: {
                                      display: true,
                                      labelString: 'Number of Price Checks',
                                      fontSize: 20
                                  },
                                  ticks: {
                                      beginAtZero : true
                                  }
                              }]
                          }
                          } 
                      });

                      $("#submitButton2").click(function(e) {

                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/chartjs/insert2.php",
        
                        // The location of insert php was changed to fit my computer 
                            data: $('#result_form2').serialize(),
                            success: function(data) {
                                console.log(data);
                                var date_time = [];
                                var c =  [];
                                
                                

                                for(var i in data) {
                                    date_time.push(data[i].date_time);
                                    c.push(data[i].c);
                                    
                                }

                                // $.ajax({
                                //   type: "POST",
                                //   url: "http://localhost/chartjs/insert2.php",
                                //   data: $('#result_form2').serialize(),
                                  
                                //   success : function(data){
                                //     for(var j in data){
                                //       date_time.push(data[i].date_time);
                                //       c.push(data[i].c);

                                //     }
                                //   }
                                // });
                                
                                barGraph.data.datasets.push({
                                  label: 'label2',
                                  showLine: true,
                                  fill: false,
                                  borderColor: 'rgba(200, 0, 0, 1)',
                                  data : c
                                });
                                barGraph.update();
                            },
                            
                          });
                        });

                    }
                    // else{
                      
                    //   barGraph.update();
                    // }

                    
                },
                error: function(data) {
                    console.log(data);
                }
              });
            });

        
      function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("rah");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
          text.style.display = "none";
        }
    }

  
    </script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
  </body>
</html>
