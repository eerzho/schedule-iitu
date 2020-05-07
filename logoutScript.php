<?php
setcookie ("id", "", time() - 3600*10);
header('Location: login');
?>