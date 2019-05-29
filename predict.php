<?php include "assets/processors/processor.php" ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Predict</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg" style="padding-top: 10px;">
                <div class="container" >
                    <div class="row">
                        <h2 class="center" style="background-color: rgba(0,0,0,0.5);color:white">Hello <?php echo $_SESSION['fullname']; ?>, Welcome to our Malaria Prediction system</h2>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 form-box">
                        	<div class="form-top" style="border:5px solid #eee;">
                        		<div class="form-top-left">
                        			<h3>Supply Your Details</h3>
                            		<p>Fill In The Details Below And Click On Predict</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-ambulance"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                
			                    <form role="form" action="" method="post" class="login-form" id="predictthis">
                                    <div class="form-group">
                                      <select class="custom-select form-control" required name="chosen_humidity">
                                          <option value="">Humidity</option>
                                          <?php 
                                            $sql = mysqli_query($connect,"SELECT * FROM humidity");
                                            $row = mysqli_fetch_array($sql); 
                                              $hum_high = $row['hum_high'];
                                              $hum_prob = $row['hum_prob'];
                                              $hum_low = $row['hum_low'];?>
                                              <option value="<?php echo($hum_high); ?>"><?php echo "High"; ?></option>                       
                                              <option value="<?php echo($hum_low); ?>"><?php echo "Low"; ?></option>                       
                                            <?php
                                          ?>
                                        </select>
                                        <input type="hidden" name="hum_value" value="<?php echo($hum_prob); ?>">

                                </div>
			                        <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <select class="custom-select form-control" required name="chosen_age">
                                          <option value="">Age</option>
                                          <?php 
                                            $sql = mysqli_query($connect,"SELECT * FROM age");
                                            $row = mysqli_fetch_array($sql); 
                                              $young = $row['young_value'];
                                              $age_value = $row['age_value'];
                                              $old = $row['old_value'];?>
                                              <option value="<?php echo($young); ?>"><?php echo "Young"; ?></option>                       
                                              <option value="<?php echo($old); ?>"><?php echo "Old"; ?></option>                       
                                            <?php
                                          ?>
                                        </select>
                                        <input type="hidden" name="age_value" value="<?php echo($age_value); ?>">

                                    </div>
                                    <div class="form-group col-md-6">
                                      <select class="custom-select form-control" required name="chosen_blood_group">
                                          <option value="">Blood Group</option>
                                          <?php 
                                            $sql = mysqli_query($connect,"SELECT * FROM blood_group");
                                            $row = mysqli_fetch_array($sql); 
                                              $a_a = $row['a_a'];
                                              $bg_value = $row['bg_value'];
                                              $a_s = $row['a_s'];
                                              $s_s = $row['s_s'];?>
                                              <option value="<?php echo($a_a); ?>"><?php echo "AA"; ?></option>                       
                                              <option value="<?php echo($a_s); ?>"><?php echo "AS"; ?></option>
                                              <option value="<?php echo($s_s); ?>"><?php echo "SS"; ?></option>                       
                                            <?php
                                          ?>
                                        </select>
                                        <input type="hidden" name="bg_value" value="<?php echo($bg_value); ?>">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <select class="custom-select form-control" required name="chosen_mosquito_type">
                                          <option value="">Highest type of Mosquito</option>
                                          <?php 
                                            $sql = mysqli_query($connect,"SELECT * FROM mosquito_type");
                                            $row = mysqli_fetch_array($sql);
                                              $female = $row['female'];
                                               $mosq_value = $row['mosq_value'];
                                              $unknown = $row['unknown'];
                                              $male = $row['male'];?>
                                              <option value="<?php echo($female); ?>"><?php echo "Female"; ?></option>                       
                                              <option value="<?php echo($male); ?>"><?php echo "Male"; ?></option>
                                              <option value="<?php echo($unknown); ?>"><?php echo "Unknown"; ?></option>                       
                                            <?php
                                          ?>
                                        </select>
                                        <input type="hidden" name="mosq_value" value="<?php echo($mosq_value); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <select class="custom-select form-control" required name="chosen_temperature">
                                          <option value="">Temperature</option>
                                          <?php 
                                            $sql = mysqli_query($connect,"SELECT * FROM temperature");
                                            $row = mysqli_fetch_array($sql);
                                              $temp_high = $row['temp_high'];
                                              $temp_normal = $row['temp_normal'];
                                              $temp_value = $row['temp_value'];
                                              $temp_low = $row['temp_low'];?>
                                              <option value="<?php echo($temp_high); ?>"><?php echo "High"; ?></option>                       
                                              <option value="<?php echo($temp_normal); ?>"><?php echo "Normal"; ?></option>
                                              <option value="<?php echo($temp_low); ?>"><?php echo "Low"; ?></option>                       
                                            <?php
                                          ?>
                                        </select>
                                        <input type="hidden" name="temp_value" value="<?php echo($temp_value); ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <select class="custom-select form-control" required name="chosen_gender">
                                          <option value="">Gender</option>
                                          <?php 
                                            $sql = mysqli_query($connect,"SELECT * FROM gender");
                                            $row = mysqli_fetch_array($sql); 
                                              $female = $row['female'];
                                               $gen_value = $row['gen_value'];
                                              $male = $row['male'];?>
                                              <option value="<?php echo($female); ?>"><?php echo "Female"; ?></option>                       
                                              <option value="<?php echo($male); ?>"><?php echo "Male"; ?></option>                       
                                            <?php
                                          ?>
                                        </select>
                                        <input type="hidden" name="gen_value" value="<?php echo($gen_value); ?>">
                                        <input type="hidden" name="predictor" value="1">
                                </div>
                                    
			                        <button type="submit" class="btn predict">Predict It!</button>
                              <div class="social-login-buttons">
                            <a class="btn btn-link-2" href="index.php" style="background-color: #4aaf51">Back
                            </a>
                          </div>
			                    </form>
                                <div id="error" style="text-align: center;"></div>
                          
		                    </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <script type="text/javascript">
          $(".predict").click(function(e){
                e.preventDefault();
                form = document.getElementById('predictthis');
                var ajax = new XMLHttpRequest();
                ajax.open("POST", "assets/processors/processor.php", true);
                ajax.onload = function(e) {
                  if (ajax.responseText=="ok")  {
                    redirectme();
                  }else{
                    $("#error").html(ajax.responseText);
                  }
                  
                };
                ajax.send(new FormData(form));
                // alert("wo wa");
          });
        </script>

    </body>

</html>