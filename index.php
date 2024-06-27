<?php
$active = "Home";
include("functions.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Css Styles -->
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <link rel='stylesheet' href='css/font-awesome.min.css' type='text/css'>
    <link rel='stylesheet' href='css/themify-icons.css' type='text/css'>
    <link rel='stylesheet' href='css/elegant-icons.css' type='text/css'>
    <link rel='stylesheet' href='css/owl.carousel.min.css' type='text/css'>
    <link rel='stylesheet' href='css/slicknav.min.css' type='text/css'>
    <link rel='stylesheet' href='css/style.css' type='text/css'>


</head>

<body>

    <main>
        <!--Banner section-->
        <section class="head-section">
            <div class="pt-2 pb-5 container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 px-3">
                        <h1 id="text-style">Be the Penguins</h1>
                        <h1 class="text-style2">of Winter</h1>
                        <p>Найліпший одяг у нас</p>
                        <a href="shop.php">
                            <button type="button" class="btn penguin-btn"><i class="fa fa-shopping-cart"></i> BUY NOW</button>
                        </a>

                    </div>
                    <div class="col-md-6 how-img px-5">
                        <img src="img/bannar-profile.png" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Woman Collection Section -->
        <section id="products" class="container mt-5">
            <h1>Woman</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                <?php
                getWProduct();
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="shop.php" class="btn penguin-btn narrow-btn">See More</a>
            </div>
        </section>

        <!-- Men Collection Section -->
        <section class="container mt-5">
            <h1 class="penguin-catagory">Men's</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                <?php
                getMProduct();
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="shop.php" class="btn penguin-btn narrow-btn">See More</a>
            </div>
        </section>

    </main>
    <!--Some information section-->
    <section class="container mt-5 pt-5">
        <div class="pt-2 pb-5 container">
            <div class="row d-flex align-items-center flex-column-reverse flex-lg-row">
                <div class="col-md-6 px-3">
                    <div class="card mb-3 penguin-card-border shadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="icon/image 12.png" class="w-50 penguin-info" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">Знайдіть ідеальний варіант</h5>
                                    <p class="card-text">Усі різні, тому ми пропонуємо стилі для кожної фігури.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 penguin-card-border shadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="icon/image 13.png" class="w-50 penguin-info" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">Безкоштовні обміни</h5>
                                    <p class="card-text">Одна з багатьох причин, чому ви можете робити покупки зі спокоєм.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 penguin-card-border shadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="icon/image 14.png" class="w-50 penguin-info" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">Зв'яжіться з нашим продавцем</h5>
                                    <p class="card-text">Вони тут, щоб допомогти вам. Це буквально те, за що ми їм платимо.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 how-img px-5">
                    <img src="icon/XMLID 1.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    </main>
    <?php
    include("footer.php");
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/script_nav.js"></script>
</body>

</html>