<?php
include 'database.php';
include 'Students.php';

$db = new Database();
$student = new Students($db->connection());
?>