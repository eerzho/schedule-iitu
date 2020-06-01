<!doctype html>
<html lang="en">
<head>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "schedule");
    if ($connection == false) {
        echo("NOT FOUND 404");
        echo mysqli_connect_error();
        exit();
    }
    ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Schedule</title>
</head>
<body>
    <form method = "post">
            <select class="input100" type="text" name="showGroup"> 
                <option selected disabled value = "NULL">Select group</option>
                <?php
                $queryy = "SELECT * FROM groups";
                if ($result = $connection->query($queryy)) {
                    while ($row = $result->fetch_assoc()) {
                        echo('<option value = "'.$row['id'].'"> '.$row['name'].' </option>');
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
    <?php 
    if (isset($_POST['showGroup'])) {
    $queryy = "SELECT * FROM groups WHERE id = '$_POST[showGroup]'";
    if ($result = $connection->query($queryy)) {
    while ($row = $result->fetch_assoc()) {
    ?>
  <header class="cd-main-header text-center flex flex-column flex-center">

    <h1 class="text-xl"><?php echo($row['name']);?></h1>
  </header>

  <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        <li><span>08:00</span></li>
        <li><span>09:00</span></li>
        <li><span>10:00</span></li>
        <li><span>11:00</span></li>
        <li><span>12:10</span></li>
        <li><span>13:10</span></li>
        <li><span>14:10</span></li>
      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class="cd-schedule__events">
      <ul>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Monday</span></div>
          <ul>
            <?php
            $query = "SELECT * FROM schedule WHERE day = 'Monday'";
            if ($results = $connection->query($query)) {
                while ($roww = $results->fetch_assoc()) {
            
            ?>
            <li class="cd-schedule__event">
                <?php echo('<a data-start="'.$roww['timeStart'].'" data-end="'.$roww['timeEnd'].'" data-content="event-abs-circuit" data-event="event-1">');?>
                <em class="cd-schedule__name"><?php echo($roww['subjectName']);?></em>
              <?php echo('</a>');?>
            </li>
            <?php }} ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Tuesday</span></div>
  
          <ul>
            <?php
            $query = "SELECT * FROM schedule WHERE day = 'Tuesday'";
            if ($results = $connection->query($query)) {
                while ($roww = $results->fetch_assoc()) {
            
            ?>
            <li class="cd-schedule__event">
                <?php echo('<a data-start="'.$roww['timeStart'].'" data-end="'.$roww['timeEnd'].'" data-content="event-abs-circuit" data-event="event-1">');?>
                <em class="cd-schedule__name"><?php echo($roww['subjectName']);?></em>
              <?php echo('</a>');?>
            </li>
            <?php }} ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Wednesday</span></div>
  
          <ul>
            <?php
            $query = "SELECT * FROM schedule WHERE day = 'Wednesday'";
            if ($results = $connection->query($query)) {
                while ($roww = $results->fetch_assoc()) {
            
            ?>
            <li class="cd-schedule__event">
                <?php echo('<a data-start="'.$roww['timeStart'].'" data-end="'.$roww['timeEnd'].'" data-content="event-abs-circuit" data-event="event-1">');?>
                <em class="cd-schedule__name"><?php echo($roww['subjectName']);?></em>
              <?php echo('</a>');?>
            </li>
            <?php }} ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Thursday</span></div>
  
          <ul>
            <?php
            $query = "SELECT * FROM schedule WHERE day = 'Thursday'";
            if ($results = $connection->query($query)) {
                while ($roww = $results->fetch_assoc()) {
            
            ?>
            <li class="cd-schedule__event">
                <?php echo('<a data-start="'.$roww['timeStart'].'" data-end="'.$roww['timeEnd'].'" data-content="event-abs-circuit" data-event="event-1">');?>
                <em class="cd-schedule__name"><?php echo($roww['subjectName']);?></em>
              <?php echo('</a>');?>
            </li>
            <?php }} ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Friday</span></div>
  
          <ul>
            <?php
            $query = "SELECT * FROM schedule WHERE day = 'Friday'";
            if ($results = $connection->query($query)) {
                while ($roww = $results->fetch_assoc()) {
            
            ?>
            <li class="cd-schedule__event">
                <?php echo('<a data-start="'.$roww['timeStart'].'" data-end="'.$roww['timeEnd'].'" data-content="event-abs-circuit" data-event="event-1">');?>
                <em class="cd-schedule__name"><?php echo($roww['subjectName']);?></em>
              <?php echo('</a>');?>
            </li>
            <?php }} ?>
          </ul>
        </li>
      </ul>
    </div>
  
    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div> <!-- .cd-schedule -->

  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/main.js"></script>
    <?php }}}?>
</body>
</html>