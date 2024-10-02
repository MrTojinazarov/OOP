<?php
include 'helper.php';
if(isset($_GET['student_id'])){

    $student->id = $_GET['student_id'];
    $student->delete();
    header("Location: index.php");
}
?>
