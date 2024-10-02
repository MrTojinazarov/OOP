<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h1>Add Student</h1>
                <a href="index.php" type="button" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form action="addStudents.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">Ism, Familiya</label>
                        <input type="text" name="fio" class="form-control" id="Input1" placeholder="fio">
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">Telefon number</label>
                        <input type="number" name="phone" class="form-control" id="Input2" placeholder="Phone number">
                    </div>
                    <div class="mb-3">
                        <label for="Textarea1" class="form-label">Manzil</label>
                        <textarea class="form-control" name="manzil" id="Textarea1" rows="3" placeholder="Text"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Input3" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="Input3">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="ok" class="btn btn-outline-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>