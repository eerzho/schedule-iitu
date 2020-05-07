<?php
    $connection = false;
    $connection = mysqli_connect("localhost", "root", "", "group34");
if ($connection == false) {
    echo("pidr");
    echo mysqli_connect_error();
    exit();
}
$query = "SELECT * FROM t_students";

if ($result = $connection->query($query)) {
    while ($row = $result->fetch_assoc()) {
        echo ("id: " . $row["id"] . " " . $row["name"] . " " .$row["sure_name"]. "<br>");
    }
}
if (isset($_COOKIE['id'])) 
    echo "admin id: " . $_COOKIE["id"] . "<br>";
?>
