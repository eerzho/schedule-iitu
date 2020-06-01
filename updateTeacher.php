<!DOCTYPE html>
<html lang="en">
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
    $query = "SELECT * FROM teacher WHERE id = '$_GET[updateTeacher]'";
    if ($result = $connection->query($query)) {
        while ($row = $result->fetch_assoc()) {
            ?>
    <title><?php echo('Update -' . $row['name'] . ' teacher');?> </title>
            <form method = "post">
                <?php
                echo('Surname : ' . '<input type = "text" name = "newSurName" value = "'.$row['surName'].'"><br><br>');
                echo('Name : ' . '<input type = "text" name = "newName" value = "'.$row['name'].'"><br><br>');
                echo('Middle name : ' . '<input type = "text" name = "newMiddleName" value = "'.$row['middleName'].'"><br><br>');
            $queryy = "SELECT * FROM chair WHERE id = '$row[chairId]'";
            if ($results = $connection->query($queryy)) {
                while ($rows = $results->fetch_assoc()) {
                    echo($rows['shortName'] . ' : ' );
                }
            }
            ?>
            <select name = "newChairId"> 
                <?php
                    echo('<option selected disabled value = "'.$row['chairId'].'">New chair</option>');
                    $queryy = "SELECT * FROM chair";
                    if ($results = $connection->query($queryy)) {
                        while ($rows = $results->fetch_assoc()) {
                            echo('<option value = "'.$rows['id'].'"> '.$rows['shortName'].' </option>');
                        }
                    }
                ?>
            </select>
                <button>
                    Update
                </button>
            </form>
        <?php
            }
        }
    if (isset($_POST['newSurName']) || isset($_POST['newName']) || isset($_POST['newMiddleName']) || isset($_POS['newChairId'])) {
        $query ="UPDATE teacher SET surName = '$_POST[newSurName]', name = '$_POST[newName]', middleName = '$_POST[newMiddleName]', chairId = '$_POST[newChairId]' WHERE id = '$_GET[updateTeacher]'";
        $result = mysqli_query($connection, $query);
        header('Location: addTeacher');
    }
    ?>
</html>