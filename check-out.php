<?php
$active = "Checkout";
include('db.php');
include("functions.php");
include("header.php");
?>


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="shop.php">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form class="checkout-form">
            <div class="row">

                <div class="col-lg-6" <?php if (!($_SESSION['customer_email'] == 'unset')) {
                                            echo "style = 'margin: 0 auto'";
                                        } ?>>
                    <div class="checkout-content">
                        <a href="shop.php" class="content-btn">Продовжити покупки</a>
                    </div>
                    <div class="place-order">
                        <h4>Ваше замовлення</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Продуктів <span>усього</span></li>
                                <?php checkoutProds(); ?>

                                <li class="total-price">Загально <span><?php total_price(); ?></span></li>
                            </ul>
                            <form action="check-out.php" method="post">
                                <div class="order-btn">
                                    <a href="check-out.php?place=1" class="site-btn place-btn">Оформити замовлення</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->


<?php
include('footer.php');
?>

</body>

</html>


<?php

if (isset($_GET['place'])) {

    $c_id = $_SESSION['customer_email'];

    // Перевірка, чи є товари в кошику
    $check_cart = "select * from cart where c_id = '$c_id'";
    $run_check = mysqli_query($db, $check_cart);

    if (mysqli_num_rows($run_check) == 0) {
        echo "<script>alert('Ваш кошик порожній. Неможливо оформити замовлення.')</script>";
        echo "<script>window.open('check-out.php','_self')</script>";
        exit();
    }

    $query = "select * from customer where customer_email = '$c_id'";
    $run_query = mysqli_query($con, $query);
    $get_query = mysqli_fetch_array($run_query);
    $custom_id = $get_query['customer_id'];

    $get_items = "select * from cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);

    $total_q = 0;
    $final_price = 0;

    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];

        $get_item = "select * from products where products_id = '$p_id'";
        $run_item = mysqli_query($db, $get_item);

        while ($row_item = mysqli_fetch_array($run_item)) {
            $pro_price = $row_item['product_price'];
            $total_q += $pro_qty;
            $pro_total_p = $pro_price * $pro_qty;
            $final_price += $pro_total_p;
        }
    }

    $order = "insert into orders (order_qty, order_price, c_id, date) values ('$total_q','$final_price','$custom_id',NOW())";
    $run_order = mysqli_query($con, $order);

    $cart_clear = "delete from cart where c_id = '$c_id'";
    $run_clear = mysqli_query($con, $cart_clear);

    echo "<script>alert('Замовлення оформлено. Дякуємо за покупку!')</script>";
    echo "<script>window.open('account.php?orders','_self')</script>";
}
?>