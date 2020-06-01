<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $showPress = false;
    if (!isset($_COOKIE['id'])) {
        header('Location: login');
    }
    $connection = mysqli_connect("localhost", "root", "", "schedule");
    if ($connection == false) {
        echo("NOT FOUND 404");
        echo mysqli_connect_error();
        exit();
    }
    if (isset($_POST['name']) && isset($_POST['surName']) && isset($_POST['middleName']) && isset($_POST['chairId'])) {
        mysqli_query($connection, "SELECT name FROM teacher WHERE name = '$_POST[name]' AND surName = '$_POST[surName]' AND middleName = '$_POST[middleName]'");
        if (mysqli_affected_rows($connection)< 1) {
            $query ="INSERT INTO teacher VALUES(NULL, '$_POST[name]', '$_POST[surName]', '$_POST[middleName]', '$_POST[chairId]')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $message = true;
            }
            else {
                $message = false;
            }
        }
        else {
            $message = false;
        }
    }
    if (isset($_POST['deleteTeacher'])) {
        $query ="DELETE FROM teacher WHERE id = '$_POST[deleteTeacher]'";
        $result = mysqli_query($connection, $query);
    }
    ?>
	<title>Schedule - Add Teacher</title>
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
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-51"> 
                        Add Teacher 
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
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Sure Name is required">
						<input class="input100" type="text" name="surName" placeholder="Teacher surname">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Teacher name">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Middle name is required">
						<input class="input100" type="text" name="middleName" placeholder="Teacher middle name">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Chair is required">
						<select class="input100" type="text" name="chairId"> 
                            <option selected disabled value = "NULL">Select chair</option>
                            <?php
                            $queryy = "SELECT * FROM chair";
                            if ($result = $connection->query($queryy)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo('<option value = "'.$row['id'].'"> '.$row['shortName'].' </option>');
                                }
                            }
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Add
						</button>
					</div>
				</form>
                <div class="container-login100-form-btn m-t-17">
                    <a class="login100-form-btn" href = "adminPage">Back</a>
                </div>
			</div>
		</div>
        <span class="login100-form-title p-b-51"> Teachers list </span>
        <div class="wrap-input100 validate-input m-b-16" data-validate = "Chair is required">
            <form method = "post">
            <select class="input100" type="text" name="showTeacher"> 
                <option selected disabled value = "NULL">Select chair</option>
                <?php
                $queryy = "SELECT * FROM chair";
                if ($result = $connection->query($queryy)) {
                    while ($row = $result->fetch_assoc()) {
                        echo('<option value = "'.$row['id'].'"> '.$row['shortName'].' </option>');
                    }
                }
                ?>
            </select>
            <span class="focus-input100"></span>
            <div class="container-login100-form-btn m-t-17">
                <button class="login100-form-btn">
				    Show
				</button>
            </div>
            </form>
        </div>
	</div>
    <div class="row">
        <div class="col-sm-12">
            <table cellpadding="20" class="table table-stripped">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if (isset($_POST['showTeacher'])) {
                        $queryy = "SELECT * FROM teacher WHERE chairId = '$_POST[showTeacher]'";
                        if ($result = $connection->query($queryy)) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td> <?php echo($row['id']); ?> </td>
                    <td> <?php echo($row['surName']. " " . $row['name'] . " " . $row['middleName']); ?> </td>
                    <td> 
                        <form action = "" method="post">
                            <?php
                                echo('<input type = "hidden" name = "deleteTeacher" value = "'.$row['id'].'">');
                            ?>
                            <button>
                                Delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action = "updateTeacher" method="get">
                            <?php
                                echo('<input type = "hidden" name = "updateTeacher" value = "'.$row['id'].'">');
                            ?>
                            <button>
                                Update
                            </button>
                        </form>
                    </td>
                </tr>
                    <?php }}} ?>
                </tbody>
            </table>
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