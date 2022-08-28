<?php
session_start();
include 'conn.php';
session_unset();
header("location: login.php");

?>