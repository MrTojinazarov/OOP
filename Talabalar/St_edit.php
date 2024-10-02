<?php
include 'helper.php';

if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $student = $student->getStudentById($id);

    if ($student) {
        $fio = $student['fio'];
        $phone = $student['phone'];
        $manzil = $student['manzil'];
        $photo = $student['photo'];
    } else {
        echo "Student not found";
        exit;
    }
} else {
    echo "ID not provided";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h1>Edit Student</h1>
                <a href="index.php" type="button" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form action="updateStudent.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="old_photo" value="<?php echo $photo; ?>">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">Ism, Familiya</label>
                        <input type="text" name="fio" class="form-control" id="Input1" placeholder="fio" value="<?php echo $fio; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">Telefon number</label>
                        <input type="number" name="phone" class="form-control" id="Input2" placeholder="Phone number" value="<?php echo $phone; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Textarea1" class="form-label">Manzil</label>
                        <textarea class="form-control" name="manzil" id="Textarea1" rows="3" placeholder="Text"><?php echo $manzil; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Input3" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="Input3">
                        <img src="<?php echo $photo; ?>" alt="Current Photo" width="100">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="ok" class="btn btn-outline-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
