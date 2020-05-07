<?php
    $connection = mysqli_connect("localhost", "root", "", "schedule");
if ($connection == false) {
    echo("NOT FOUND 404");
    echo mysqli_connect_error();
    exit();
}

if(isset($_POST['userName']) && isset($_POST['password'])){
   $query = "SELECT * FROM admin";
if ($result = $connection->query($query)) {
    while ($row = $result->fetch_assoc()) {
        if ($row['userName'] == $_POST['userName'] && $row['password'] == $_POST['password']) {
            header('Location: adminPage');
            setcookie("id", $row['id'], time()+36000);
            exit();
        }
    }
    header('Location: login');
}
} 
exit();
?>