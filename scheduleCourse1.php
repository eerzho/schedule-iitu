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
    if (isset($_POST['subjectName']) && isset($_POST['specialtyId']) && isset($_POST['groupsId']) && isset($_POST['teacherId']) && isset($_POST['timeStart'])&& isset($_POST['timeEnd']) && isset($_POST['day'])) {
        mysqli_query($connection, "SELECT * FROM schedule WHERE time = '$_POST[time]'");
        if (mysqli_affected_rows($connection)< 1) {
            $query ="INSERT INTO schedule VALUES(NULL, '$_POST[timeStart]', '$_POST[timeEnd]', '$_POST[day]', '$_POST[subjectName]', '$_POST[specialtyId]', '$_POST[groupsId]', '$_POST[teacherId]')";
            $result = mysqli_query($connection, $query);
            $message = true;
        }
        else {
            $message = false;
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
                        Add schedule
                        <br>
                        <?php
                        if(isset($message)) {
                            if ($message) {
                                echo('<span style = "color: green">success</span>');
                            }
                            else {
                                echo('<span style = "color: red">error</span>');
                            }
                        }
                        ?>
					</span>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Course is required">
						<select class="input100" type="text" name="subjectName"> 
                            <option selected disabled value = "NULL">Select subject</option>
                            <?php
                            $queryy = "SELECT * FROM subject WHERE course = 1";
                            if ($result = $connection->query($queryy)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo('<option value = "'.$row['name'].'"> '.$row['name'].' </option>');
                                }
                            }
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Specialty is required">
						<select class="input100" type="text" name="specialtyId"> 
                            <option selected disabled value = "NULL">Select specialty</option>
                            <?php
                            $queryy = "SELECT * FROM specialty";
                            if ($result = $connection->query($queryy)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo('<option value = "'.$row['id'].'"> '.$row['name'].' </option>');
                                }
                            }
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Specialty is required">
						<select class="input100" type="text" name="groupsId"> 
                            <option selected disabled value = "NULL">Select groups</option>
                            <?php
                            $queryy = "SELECT * FROM groups WHERE course = 1";
                            if ($result = $connection->query($queryy)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo('<option value = "'.$row['id'].'"> '.$row['name'].' </option>');
                                }
                            }
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Specialty is required">
						<select class="input100" type="text" name="teacherId"> 
                            <option selected disabled value = "NULL">Select teacher</option>
                            <?php
                            $queryy = "SELECT * FROM teacher";
                            if ($result = $connection->query($queryy)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo('<option value = "'.$row['id'].'"> '.$row['name'].' '.$row['surName'].' '.$row['middleName'].'</option>');
                                }
                            }
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Specialty is required">
						<select class="input100" type="text" name="timeStart"> 
                            <option selected disabled value = "NULL">Select time start</option>
                            <option value="8:00">8:00</option>
                            <option value="9:00">9:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:10</option>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Specialty is required">
						<select class="input100" type="text" name="timeEnd"> 
                            <option selected disabled value = "NULL">Select time end</option>
                            <option value="8:00">8:50</option>
                            <option value="9:00">9:50</option>
                            <option value="10:00">10:50</option>
                            <option value="11:00">11:50</option>
                            <option value="12:00">13:00</option>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Specialty is required">
						<select class="input100" type="text" name="day"> 
                            <option selected disabled value = "NULL">Select day</option>
                            <option value="Moday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
						<span class="focus-input100"></span>
					</div>
                

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Add
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