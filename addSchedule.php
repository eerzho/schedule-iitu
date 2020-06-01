<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    if (!isset($_COOKIE['id'])) {
        header('Location: login');
    }
    $connection = mysqli_connect("localhost", "root", "", "schedule");
    if ($connection == false) {
        echo("NOT FOUND 404");
        echo mysqli_connect_error();
        exit();
    }
    if (isset($_POST['course'])) {
        if($_POST['course'] == 1) {
            header('Location: scheduleCourse1');
        }
        if($_POST['course'] == 2) {
            header('Location: scheduleCourse2');
        }
        if($_POST['course'] == 3) {
            header('Location: scheduleCourse3');
        }
        if($_POST['course'] == 4) {
            header('Location: scheduleCourse4');
        }
    }
    ?>
	<title>Schedule - Add Schedule</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="loginPageStatic/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginPageStatic/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginPageStatic/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginPageStatic/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginPageStatic/css/main.css">
<!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-51">
                        Course
					</span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Course is required">
						<select class="input100" type="text" name="course" placeholder="Course name">
                            <option selected disabled value = "NULL">Select course</option>
                            <option value = "1">1</option>
                            <option value = "2">2</option>
                            <option value = "3">3</option>
                            <option value = "4">4</option>
                        </select>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Select Course
						</button>
					</div>
                    <div class="container-login100-form-btn m-t-17">
                        <a class="login100-form-btn" href = "adminPage">Back</a>
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="loginPageStatic/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="loginPageStatic/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="loginPageStatic/vendor/bootstrap/js/popper.js"></script>
	<script src="loginPageStatic/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="loginPageStatic/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="loginPageStatic/vendor/daterangepicker/moment.min.js"></script>
	<script src="loginPageStatic/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="loginPageStatic/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="loginPageStatic/js/main.js"></script>

</body>
</html>