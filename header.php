<?php
require_once('config.php');
include('db.php');
?>


<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="description" content="Inferno Co.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Penguin Fashion</title>

<link rel="icon" href="img/penguin.png" type="image/x-icon">


<!-- Google Fonts Used -->
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<!-- Css Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js" integrity="sha512-Ww1y9OuQ2kehgVWSD/3nhgfrb424O3802QYP/A5gPXoM4+rRjiKrjHdGxQKrMGQykmsJ/86oGdHszfcVgUr4hA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel='stylesheet' href='css/slicknav.min.css' type='text/css'>
<link rel='stylesheet' href='css/style.css' type='text/css'>
<link rel='stylesheet' href='css/styles.css' type='text/css'>

</head>

<body>

    <!-- Header Section-->

    <header class="header-section">
        <!-- Top Bar -->
        <div class="header-top" id="top">
            <div class="container">

                <div class="f-right">
                    <ul class="nav-right">
                        <li class="user-icon">
                            <div class="login-panel">
                                <i class="fa fa-user" style="font-size:25px"></i>
                            </div>
                            <div class="login-hover">
                                <div class="insidelog">

                                    <?php if ($_SESSION['customer_email'] == 'unset') {
                                        echo "<a href='login.php' class='btn logbtn' style='width: 200px; height:40px'>Логін</a>";
                                    } else {
                                        echo "<a href='logout.php' class='btn logbtn' style='width: 200px; height:40px'>Вийти</a>";
                                    } ?>


                                </div>
                                <?php if ($_SESSION['customer_email'] == 'unset') {
                                    echo "<div class='insidelog'>
                                    <span class='small'>or </span><a href='register.php' class='small'>зареєструйтеся зараз</a>
                                </div>";
                                } ?>
                                <?php
                                if (!empty($_SESSION['customer_email']) && $_SESSION['customer_email'] != 'unset') {
                                    // Перевіряємо чи customer_email = 'yo@gmail.com'
                                    if ($_SESSION['customer_email'] == 'yo@gmail.com') {
                                        echo "
            <div class='insidelog' style='border-top: solid 0.2px #e5e5e5;'>
                <a href='insert-product.php' class='btn btn-dark' style='color:white;margin:4px 0'>Створити товар</a>
                <a href='account.php?orders' class='btn btn-dark' style='color:white;margin:4px 0'>Мій акаунт</a>
            </div>";
                                    } else {
                                        echo "
            <div class='insidelog' style='border-top: solid 0.2px #e5e5e5;'>
                <a href='account.php?orders' class='btn btn-dark' style='color:white;margin:4px 0'>Мій акаунт</a>
            </div>";
                                    }
                                }
                                ?>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Middle Bar -->

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <!-- Логотип -->
                    <div class="navbar-brand">
                        <a href="index.php">
                            <span> <img src="img/logo.png" alt="" class="penguin-logo img-fluid"></span>
                        </a>
                    </div>
                    <!-- Форма пошуку -->
                    <div class="col-md-6">
                        <form method="post">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Search our Store" required>
                                <button type="submit" name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg></button>
                            </div>
                        </form>
                    </div>
                    <!-- кошик  -->
                    <div class="col-md-3 text-right" style="visibility:      
                    <?php if ($_SESSION['customer_email'] == 'unset') {
                        echo "hidden";
                    } ?>">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="shopping-cart.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <span><?php items(); ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php cart_icon_prod(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Всього:</span>
                                        <h5><?php total_price(); ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="shopping-cart.php" class="primary-btn view-card">VIEW ALL ITEMS</a>
                                        <a href="check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price"><?php total_price(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Lower Bar -->


        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                        </svg>
                        <span> Всі категорії</span>
                        <ul class="depart-hover">
                            <?php
                            getProdCat();
                            ?>

                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="<?php if ($active == 'Home') echo "active" ?>"><a href="index.php">Home</a></li>
                        <li class="<?php if ($active == 'Shop') echo "active" ?>"><a href="shop.php">Shop</a></li>
                        <li class="<?php if ($active == 'Contact') echo "active" ?>"><a href="contact.php">Contact</a></li>

                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <?php
    // видалити продукт з корзини
    if (isset($_GET['delcart'])) {


        $p_id = $_GET['delcart'];


        $query = "Delete from cart where products_id='$p_id'";

        $run_query = mysqli_query($con, $query);

        echo "<script>window.open('index.php','_self')</script>";
    }

    // пошук товару
    if (isset($_POST['submit'])) {

        $item = $_POST["search"];

        $get_product = "select * from products where product_title LIKE '%$item%' LIMIT 0,1";

        $run_product = mysqli_query($con, $get_product);

        $count = mysqli_num_rows($run_product);

        if ($count > 0) {

            $row_product = mysqli_fetch_array($run_product);

            $products_id = $row_product['products_id'];



            echo "<script>window.open('product.php?product_id=$products_id','_self')</script>";
        } else {

            echo
            "<script>
            alert('Товар не знайдено');
            console.log('Alert was closed');
            </script>";
        }
    }
    ?>