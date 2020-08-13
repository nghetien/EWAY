<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Font-icon-->
    <script src="https://kit.fontawesome.com/0496651f2b.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link href="../src/scss/uploadfile.css" rel="stylesheet">
</head>
<body>
    <?php
        if(isset($_FILES['filename'])){
            $errors = array();
            $fileName = $_FILES['filename']['name'];
            $fileSize = $_FILES['filename']['size'];
            $fileTMP = $_FILES['filename']['tmp_name'];
            $fileType = $_FILES['filename']['type'];
            move_uploaded_file($fileTMP,"../src/img/".$fileName);
            echo $fileName."-------".$fileSize."-------".$fileTMP."-------".$fileType;
        }
    ?>
    <form action="" class="upload" method="POST" enctype="multipart/form-data">
        <div class="upload__form mt-5">
            <div class="upload__input">
                <input type="file" name="filename">
            </div>
            <div class="upload__btn">
                <button href="#" class="btn btn-outline-primary" name="upload">Upload</button>
            </div>
        </div>
    </form>
</body>
</html>