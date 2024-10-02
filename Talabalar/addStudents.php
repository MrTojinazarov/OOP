<?php

include 'helper.php';

if(isset($_POST['ok'])){
    if(!empty($_POST['fio']) && !empty($_POST['phone']) && !empty($_POST['manzil']) && !empty($_FILES['photo'])){

    $student->fio = $_POST['fio'];
    $student->phone = $_POST['phone'];
    $student->manzil = $_POST['manzil'];
    $photo = $_FILES['photo'];

    $data = explode('.', $_FILES['photo']['name']);
    $filepath =date('Y-m-d_H-i-s_').'.'. $data[1];
    move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $filepath);

    $student->photo = 'img/'.$filepath;

    $student->insert();

    header("Location: index.php");

    }
}