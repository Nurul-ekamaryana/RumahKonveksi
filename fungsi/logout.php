<?php
session_start();
session_destroy();
header('location:../from/login.php');
?>