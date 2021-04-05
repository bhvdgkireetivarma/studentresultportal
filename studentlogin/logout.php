<?php
session_start();
session_destroy();
header("location:http://localhost/studentresultportal/home.php");
exit();
?>