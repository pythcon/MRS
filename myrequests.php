<?php
    session_start();
    include ('functions.php');
    gatekeeper();

    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NJIT MRS | My Requests</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="/fonts/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/NJITMRS.jpg);">
					<span class="login100-form-title-1">
                        &nbsp;
					</span>
				</div>

                <nav class="navbar navbar-expand-md navbar-dark navbarColor">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="newrequest.php">New Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="myrequests.php">My Requests</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>

				<form class="request-form validate-form" action="#">
                    <div class="container-fluid">
                        <div>
                            <h3>My Requests:</h3>
                            <p>A list of your requests.</p>
                            <br>
                            <div class="mx-auto">
                                <!--Table Printout-->
                                <?php
                                    echo "<table class='table'>";
                                    echo "<tr><td>RID</td><td>Status</td><td>Location</td><td>Description</td><td>Date</td><td>Complete Date</td></tr>";
                                    $requestList = listRequests($user);
                                    echo $requestList;
                                    echo "</table>";
                                ?>
                            </div>
                            <br>
                            
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>