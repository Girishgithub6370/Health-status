<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>Make Appoinment</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/default/style.css" rel="stylesheet">
		<link href="assets/css/default/blocks.css" rcel="stylesheet">


		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

	</head>
	<body>
		<!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="patient.php"><img alt="Brand" src="Dermatology.jpg" height="40px"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="patient.php">Home</a></li>
							<!-- <li><a href="profile.php?patientId=1" >Profile</a></li> -->
							<li><a href="patientapplist.php?patientId=1">Appointment</a></li>
						</ul>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="profile.php?patientId=1"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="patientapplist.php?patientId=1"><i class="glyphicon glyphicon-file"></i> Appointment</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
    
            <div class="container">
			<section style="padding-bottom: 50px; padding-top: 50px;">
				<div class="row">
					<!-- start -->
					<!-- USER PROFILE ROW STARTS-->
					<div class="row">
						<div class="col-md-3 col-sm-3">
							
							<div class="user-wrapper">
								<img src="Dermatology.jpg" class="img-responsive" />
								<div class="description">
									<h4>Hello</h4>
									<h5> <strong> Website Designer </strong></h5>
									<p>
										Pellentesque elementum dapibus convallis.
									</p>
									<hr />
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>
								</div>
							</div>
						</div>
						
						<div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								
								
								<div class="panel panel-default">
									<div class="panel-body">
										
										
										<form class="form" role="form" method="POST" accept-charset="UTF-8">
											<div class="panel panel-default">
												<div class="panel-heading">Patient Information</div>
												<div class="panel-body">
													
													Patient Name: <?php echo "Girish Kumar" ?> <br>
													Patient IC: <?php echo "Girish Kumar" ?><br>
													Contact Number: <?php echo "6370620470" ?><br>
													Email Id: <?php echo "kumargirish6370@gmail.com" ?>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">Appointment Information</div>
												<div class="panel-body">
													Day: <?php echo" Monday" ?><br>
													Date: <?php echo date("Y/m/d") ?><br>
													Time: <?php echo "10:00 AM" ?> - <?php echo "11:00 Am" ?><br>
												</div>
											</div>
											
											<div class="form-group">
												<label for="recipient-name" class="control-label">Symptom:</label>
												<input type="text" class="form-control" name="symptom" required>
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Comment:</label>
												<textarea class="form-control" name="comment" required></textarea>
											</div>
											<div class="form-group">
												<input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
											</div>
										</form>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					<!-- USER PROFILE ROW END-->
					<!-- end -->
					<script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
				
        </body>
        </html>