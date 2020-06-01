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
    $query = "SELECT * FROM admin WHERE id = $_COOKIE[id]";
    ?>
	<meta charset="UTF-8">
	<title>Scedule - Admin Page</title>
	<link rel="stylesheet" href="adminPageStatic/style.css">
</head>
	<body>
        <?php
            if ($result = $connection->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <p style=" 
                              position: absolute;
                              top: 25%;
                              left: 50%;
                              transform: translate(-50%, -50%);
                              margin: 0;
                              padding: 0;
                              display: flex; 
                              display: block; 
                              margin: 0 10px; 
                              padding: 5px 10px; 
                              color: #000000; 
                              font-size: 24px; 
                              text-decoration: none; 
                              text-transform: uppercase; 
                              transition: 0.5s; 
                              overflow: hidden">
                        <?php
                        echo('Welcome '. $row['userName']);
                        ?>
                    </p>
                    <?php
                }
            }
        ?>
		<ul>
  		<li><a href="addSchedule">Add Schedule</a></li>
        <li><a href="addSubject">Add Subject</a></li>
        <li><a href="addGroup">Add Group</a></li>
        <li><a href="addSpecialty">Add Specialty</a></li>
        <li><a href="addTeacher">Add Teacher</a></li>
  		<li><a href="addChair">Add Chair</a></li>
        <li><a href="logoutScript">Log out</a></li>
		</ul>
		
	</body>
</html>