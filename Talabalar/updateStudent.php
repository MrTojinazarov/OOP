<?php
include 'database.php';
include 'Students.php';

$db = new Database();
$student = new Students($db->connection());

if (isset($_POST['ok'])) {
    if (!empty($_POST['fio']) && !empty($_POST['phone']) && !empty($_POST['manzil']) && !empty($_POST['id']) && isset($_POST['old_photo'])) {
        
        $id = $_POST['id'];
        $student->id = htmlspecialchars(strip_tags($id));
        $student->fio = htmlspecialchars(strip_tags($_POST['fio']));
        $student->phone = htmlspecialchars(strip_tags($_POST['phone']));
        $student->manzil = htmlspecialchars(strip_tags($_POST['manzil']));

        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo'];
            $data = explode('.', $photo['name']);
            $filepath = date('Y-m-d_H-i-s_') . '.' . end($data);

            if (move_uploaded_file($photo['tmp_name'], 'img/' . $filepath)) {
                $student->photo = 'img/' . $filepath; 
            } else {
                echo "Rasmni yuklashda xato.";
                exit; 
            }
        } else {
            $student->photo = htmlspecialchars(strip_tags($_POST['old_photo']));
        }

        if ($student->update()) {
            header("Location: index.php"); 
            exit; 
        } else {
            echo "Yangilanishda xato.";
        }
    } else {
        echo "Barcha maydonlarni to'ldiring.";
    }
}
?>
