<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>

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

       
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text" style="background-color: rgba(0,0,0,0.5);">
                            <h1><strong>Malaria</strong> Prediction System</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our service</h3>
                            		<p>Enter your Full name and email to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-fullname">Full Name</label>
			                        	<input type="text" name="form-fullname" placeholder="fullname..." class="form-fullname form-control" id="form-fullname">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">email</label>
			                        	<input type="text" name="form-email" placeholder="email..." class="form-email form-control" id="form-email">
			                        </div>
                                    <div id="available" style="text-align: center;"></div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
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
        	$(".btn").click(function(e){
                e.preventDefault();
                email = $("#form-email").val();
                fullname = $("#form-fullname").val();
                if (fullname=== "" || email=== "") {
                         $("#available").html("Any of the fields cannot be empty");
                }else{
                     $.post('assets/processors/processor.php',{check_user:1,email:email,fullname:fullname},function (data) {
                       if (data ==='yes') {
                        window.location = 'predict.php';
                       }else{
                         $("#available").html(data);
                       }
                      });
                }
        	});
        </script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>