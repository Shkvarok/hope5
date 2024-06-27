<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін-панель</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="icon" href="img/penguin.png" type="image/x-icon">

    <style>
        .top {
            font-size: 28px;
            background-color: #e6e6e6;
            text-align: center;
            padding: 8px 0;
            margin-bottom: 20px;
            box-shadow: 0 -20px 15px -10px rgba(155, 155, 155, 0.3) inset,
                0 20px 15px -10px rgba(155, 155, 155, 0.3) inset,
                0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Вставити продукти
                    </h3>
                </div>

                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Назва продукту</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_title" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Категорія товару</label>
                            <div class="col-md-6">
                                <select class="form-control" name="p_cat_id">
                                    <option>Виберіть категорію товару</option>
                                    <?php
                                    $get_p_category = "SELECT * FROM product_categories";
                                    $run_p_category = mysqli_query($con, $get_p_category);

                                    while ($p_cat_row = mysqli_fetch_array($run_p_category)) {
                                        $p_cat_id = $p_cat_row['p_cat_id'];
                                        $p_cat_title = $p_cat_row['p_cat_title'];
                                        echo "<option value='$p_cat_id'>$p_cat_title</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Категорія</label>
                            <div class="col-md-6">
                                <select class="form-control" name="cat_id">
                                    <option>Вибрати категорію</option>
                                    <?php
                                    $get_category = "SELECT * FROM category";
                                    $run_category = mysqli_query($con, $get_category);

                                    while ($cat_row = mysqli_fetch_array($run_category)) {
                                        $cat_id = $cat_row['cat_id'];
                                        $cat_title = $cat_row['cat_title'];
                                        echo "<option value='$cat_id'>$cat_title</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Зображення продукту # 1</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img1" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Зображення продукту # 2</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img2" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Ціна продукту</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_price" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Ключові слова продукту</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_keywords" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Опис продукту</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="product_desc" cols="19" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; justify-content: center">
                            <div class="col-md-3">
                                <input name="submit" type="submit" class="btn btn-primary form-control" value="Insert Product">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>

</body>

</html>
<?php
function uploadImage($file, $targetDir, $maxFileSize = 5000000, $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'])
{
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Перевірка на справжність зображення
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Файл не є зображенням.<br>";
        $uploadOk = 0;
    }

    // Перевірка розміру файлу
    if ($file["size"] > $maxFileSize) {
        echo "Вибачте, ваш файл занадто великий.<br>";
        $uploadOk = 0;
    }

    // Дозволені формати файлів
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Вибачте, дозволені тільки JPG, JPEG, PNG та GIF файли.<br>";
        $uploadOk = 0;
    }

    // Перевірка $uploadOk для помилок
    if ($uploadOk == 0) {
        echo "Вибачте, ваш файл не було завантажено.<br>";
        return false;
    } else {
        // Якщо все ок, намагайтеся завантажити файл
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return basename($file["name"]);
        } else {
            echo "Вибачте, сталася помилка при завантаженні вашого файлу.<br>";
            return false;
        }
    }
}

if (isset($_POST['submit'])) {
    $p_cat_id = $_POST['p_cat_id'];
    $cat_id = $_POST['cat_id'];
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);

    $targetDir = "img/products/";

    // Створення директорії, якщо вона не існує
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Завантаження файлів
    $product_img1 = uploadImage($_FILES['product_img1'], $targetDir);
    $product_img2 = uploadImage($_FILES['product_img2'], $targetDir);

    // Вставка продукту, якщо обидва зображення завантажені успішно
    if ($product_img1 && $product_img2) {
        $insert_product = "INSERT INTO products (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_price, product_keywords, product_desc) VALUES ('$p_cat_id', '$cat_id', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_price', '$product_keywords', '$product_desc')";

        $run_insert_product = mysqli_query($con, $insert_product);

        if ($run_insert_product) {
            echo "<script>alert('Product Inserted')</script>";
            echo "<script>window.open('insert-product.php', '_self')</script>";
        } else {
            // Вивід SQL помилки і запиту
            $error = mysqli_error($con);
            echo "<script>alert('Error inserting product into database: $error')</script>";
            echo "<p>Error inserting product into database: $error</p>";
            echo "<p>SQL Query: $insert_product</p>";
        }
    }
}
?>