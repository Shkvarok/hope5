<?php

$db = mysqli_connect('localhost', 'root', '', 'threaderz_store');


function getRealIpUser()
{

    switch (true) {

        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}


function addCart()
{

    global $db;

    if (isset($_GET['add_cart'])) {
        $ip_add = getRealIpUser();

        $c_id = $_SESSION['customer_email'];
        $p_id = $_GET['add_cart'];
        $qty = $_POST['product_qty'];
        $size = $_POST['size'];

        $check_product = "select * from cart where c_id = '$c_id' AND products_id = '$p_id'";
        $run_check = mysqli_query($db, $check_product);


        if (mysqli_num_rows($run_check) > 0) {

            echo "<script>alert('Product already added.')</script>";
            echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
        } else {

            $query = "Insert into cart (products_id, ip_add,qty,size,date,c_id) values('$p_id','$ip_add','$qty','$size',NOW(),'$c_id')";
            $run_query = mysqli_query($db, $query);


            echo "<script>alert('Product added to Cart. Keep Shopping.')</script>";
            echo "<script>window.open('product.php?product_id=$p_id','_self')</script>";
        }
    }
}

function getWProduct()
{
    global $db;

    $get_products = "select * from products where cat_id=2 order by RAND() LIMIT 3";
    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $products_id = $row_products['products_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_img1 = $row_products['product_img1'];

        echo "
<div class='col'>
    <div class='card h-100 penguin-card-border shadow rounded'>
        <img src='img/products/$product_img1' class='card-img-top penguin-card-img w-75' alt='{$product_title}'>
        <div class='card-body'>
            <h5 class='card-title'>{$product_title}</h5>
            <p class='card-text'>Description for {$product_title}</p>
            <ul class='quick-view-list'>
                <li class='quick-view-item'>
                    <a href='product.php?product_id=$products_id' class='btn btn-lg btn-primary rounded-pill'>Докладніше</a>
                </li>
            </ul>
        </div>
        <div class='card-footer d-flex justify-content-between align-items-center penguin-card-footer'>
            <div>
                <h3 class='price-text-style'>₴{$product_price}</h3>
            </div>
        </div>
    </div>
</div>";
    }
}
function getMProduct()
{
    global $db;

    $get_products = "select * from products where cat_id=1 order by RAND() LIMIT 3";
    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $products_id = $row_products['products_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_img1 = $row_products['product_img1'];

        echo "
<div class='col'>
    <div class='card h-100 penguin-card-border shadow rounded'>
        <img src='img/products/$product_img1' class='card-img-top penguin-card-img w-75' alt='{$product_title}'>
        <div class='card-body'>
            <h5 class='card-title'>{$product_title}</h5>
            <p class='card-text'>Description for {$product_title}</p>
            <ul class='quick-view-list'>
                <li class='quick-view-item'>
                    <a href='product.php?product_id=$products_id' class='btn btn-lg btn-primary rounded-pill'>Докладніше</a>
                </li>
            </ul>
        </div>
        <div class='card-footer d-flex justify-content-between align-items-center penguin-card-footer'>
            <div>
                <h3 class='price-text-style'>₴{$product_price}</h3>
            </div>
        </div>
    </div>
</div>";
    }
}


// Отримати продукти Catergories

function getProdCat()
{
    global $db;

    $get_p_cats = "select * from product_categories";
    $run_p_cats = mysqli_query($db, $get_p_cats);



    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];

        echo "

<li><a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>

";
    }
}

// Retrieve Catergories

function getCat()
{

    global $db;

    $get_cats = "select * from category";
    $run_cats = mysqli_query($db, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {

        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];


        echo "

<li class='hovclass'><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>

";
    }
}

function getPcatProd()
{
    global $db;

    if (isset($_GET['p_cat_id'])) {

        $p_cat_id = $_GET['p_cat_id'];

        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $get_products = "select * from products where p_cat_id='$p_cat_id'";
        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);

        if ($count == 0) {

            echo "
<div class='card' style='font-weight:bold; color:#a4bc4c'>
    <div class='card-body'>No Products Available</div>
</div>

";
        } else {


            while ($row_products = mysqli_fetch_array($run_products)) {

                $products_id = $row_products['products_id'];
                $product_title = $row_products['product_title'];
                $product_price = $row_products['product_price'];
                $product_img1 = $row_products['product_img1'];

                echo "
<div class='col'>
    <div class='card h-100 penguin-card-border shadow rounded'>
        <img src='img/products/$product_img1' class='card-img-top penguin-card-img w-75' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Description for $product_title</p>
            <ul class='quick-view-list'>
                <li class='quick-view-item'>
                    <a href='product.php?product_id=$products_id' class='btn btn-lg btn-primary rounded-pill'>Докладніше</a>
                </li>
            </ul>
        </div>
        <div class='card-footer d-flex justify-content-between align-items-center penguin-card-footer'>
            <div>
                <h3 class='price-text-style'>₴$product_price</h3>
            </div>
        </div>
    </div>
</div>
";
            }
        }
    }
}


function getcatProd()
{
    global $db;

    if (isset($_GET['cat_id'])) {

        $cat_id = $_GET['cat_id'];

        $get_cat = "select * from category where cat_id='$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $p_cat_title = $row_cat['cat_title'];
        $p_cat_desc = $row_cat['cat_desc'];

        $get_products = "select * from products where cat_id='$cat_id'";
        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);

        if ($count == 0) {

            echo "
<div class='card' style='font-weight:bold; color:#a4bc4c'>
    <div class='card-body'>No Products Available</div>
</div>

";
        } else {



            while ($row_products = mysqli_fetch_array($run_products)) {

                $products_id = $row_products['products_id'];
                $product_title = $row_products['product_title'];
                $product_price = $row_products['product_price'];
                $product_img1 = $row_products['product_img1'];

                echo "

<div class='col'>
    <div class='card h-100 penguin-card-border shadow rounded'>
        <img src='img/products/$product_img1' class='card-img-top penguin-card-img w-75' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Description for $product_title</p>
            <ul class='quick-view-list'>
                <li class='quick-view-item'>
                    <a href='product.php?product_id=$products_id' class='btn btn-lg btn-primary rounded-pill'>Докладніше</a>
                </li>
            </ul>
        </div>
        <div class='card-footer d-flex justify-content-between align-items-center penguin-card-footer'>
            <div>
                <h3 class='price-text-style'>₴$product_price</h3>
            </div>
        </div>
    </div>
</div>

";
            }
        }
    }
}

function getProd()
{
    global $db;

    if (isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        $get_product_id = "select * from products where products_id='$product_id'";
        $run_product_id = mysqli_query($db, $get_product_id);

        $row_products = mysqli_fetch_array($run_product_id);

        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_desc = $row_products['product_desc'];
        $product_img1 = $row_products['product_img1'];
        $product_img2 = $row_products['product_img2'];


        $get_p_cat_name = "select p_cat_title from products as P,product_categories as C where P.p_cat_id=C.p_cat_id and products_id=$product_id";
        $run_get_p_cat_name = mysqli_query($db, $get_p_cat_name);


        $row_p_cat_name = mysqli_fetch_array($run_get_p_cat_name);


        $p_cat_name = $row_p_cat_name['p_cat_title'];


        echo "

<div class='col-lg-6' style='margin:0 auto'>
    <div class='product-pic-zoom  col-md-8' style='max-height:400px;margin: 0 0 30px 0'>
        <img class='product-big-img' src='img/products/$product_img1' alt='$product_title'>
        <div class='zoom-icon'>
            <i class='fa fa-search-plus'></i>
        </div>
    </div>
    <div class='product-thumbs'>
        <div class='product-thumbs-track ps-slider owl-carousel'>
            <div class='pt active' data-imgbigurl='img/products/$product_img1'><img src='img/products/$product_img1' alt='$product_title'></div>
            <div class='pt' data-imgbigurl='img/products/$product_img2'><img src='img/products/$product_img2' alt='$product_title'></div>
        </div>
    </div>
</div>
<div class='col-lg-6'>
    <div class='product-details'>
        <div class='pd-title'>
            <h3>$product_title</h3>
        </div>

        <div class='pd-desc'>
            <p>$product_desc</p>
            <h4>грн $product_price</h4>
        </div>

        <ul class='pd-tags'>
            <li><span>CATEGORY</span>: $p_cat_name</li>
        </ul>

        ";
    }
}


function relatedProducts()
{
    global $db;

    if (isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];


        $get_p_cat_id = "select C.p_cat_id,C.p_cat_title from products as P,product_categories as C where P.p_cat_id=C.p_cat_id and products_id=$product_id";
        $run_get_p_cat_id = mysqli_query($db, $get_p_cat_id);

        $row_p_cat_id = mysqli_fetch_array($run_get_p_cat_id);

        $pcat_id = $row_p_cat_id['p_cat_id'];

        $get_r_products = "select * from products where p_cat_id=$pcat_id LIMIT 1,4";
        $run_get_r_products = mysqli_query($db, $get_r_products);


        while ($row_get_r_products = mysqli_fetch_array($run_get_r_products)) {



            $p_id = $row_get_r_products['products_id'];
            $p_name = $row_get_r_products['product_title'];
            $p_img1 = $row_get_r_products['product_img1'];
            $p_price = $row_get_r_products['product_price'];


            if ($p_id != $product_id) {
                echo "


        <div class='col-lg-3 col-sm-6'>
            <div class='product-item'>
                <div class='pi-pic' style='max-height:300px'>
                    <img src='img/products/$p_img1' alt='$p_name'>
                    <ul>
                        <li class='quick-view'><a href='product.php?product_id=$p_id' style='background:#a4bc4c;color:white'>View Details</a></li>
                    </ul>
                </div>
                <div class='pi-text'>
                    <a href='#'>
                        <h5>$p_name</h5>
                    </a>
                    <div class='product-price'>
                        грн $p_price
                    </div>
                </div>
            </div>
        </div>

        ";
            }
        }
    }
}

//рхує кількість продуктів в корзині
function items()
{

    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];

    $get_items = "select * from cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;
}

function total_price()
{

    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];


    $total = 0;

    $get_items = "select * from cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);


    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];

        $get_price = "select * from products where products_id = '$p_id'";
        $run_price = mysqli_query($db, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_price = $row_price['product_price'] * $pro_qty;
            $total += $sub_price;
        }
    }
    echo  $total . "грн ";
}

$countrows = 0;

function cart_items()
{

    global $db;

    $c_id = $_SESSION['customer_email'];

    $get_items = "select * from cart where c_id = '$c_id' ORDER BY date DESC";
    $run_itemss = mysqli_query($db, $get_items);

    $countrows = mysqli_num_rows($run_itemss);

    if ($countrows == 0) {
        echo "

        <div class='card col-md-3 col-10' style='margin:0 auto; border-radius:25px 5px;box-shadow: inset -12px -8px 40px #e5e5e5;'>
            <div class='card-body'>
                <h5 style='text-align:center;font-weight:500'> No items in Cart </h5>
            </div>
        </div>

        ";
    } else {

        echo "

        <thead style='font-size: larger;'>
            <tr>
                <th>Image</th>
                <th class='p-name'>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>

        ";


        while ($row_items = mysqli_fetch_array($run_itemss)) {
            $p_id = $row_items['products_id'];
            $pro_qty = $row_items['qty'];

            $get_item = "select * from products where products_id = '$p_id'";
            $run_item = mysqli_query($db, $get_item);

            while ($row_item = mysqli_fetch_array($run_item)) {

                $pro_id = $row_item['products_id'];
                $pro_name = $row_item['product_title'];
                $pro_price = $row_item['product_price'];
                $pro_img1 = $row_item['product_img1'];

                $pro_total_p = $pro_price * $pro_qty;
            }

            echo "

        <tr style='border-bottom: 0.5px solid #ebebeb'>
            <td class='cart-pic first-row'><img src='img/products/$pro_img1' alt='$pro_name' style='max-height:100px'></td>
            <td class='cart-title first-row'>
                <h5><a href='product.php?product_id=$pro_id' style='color:black;font-weight:bold'>$pro_name</h5>
            </td>
            <td class='p-price first-row'>грн $pro_price</td>
            <td class='qua-col first-row'>
                <div class='quantity'>
                    <div class='pro-qty'>
                        <input id='qqty' type='text' value='$pro_qty'>
                    </div>
                </div>
            </td>
            <td class='total-price first-row'>грн $pro_total_p</td>
            <td class='close-td first-row'><a href='shopping-cart.php?del=$pro_id'><i class='ti-close' style='color:black'></i></a></td>
        </tr>
        ";
        }
    }
}

function cart_icon_prod()
{

    global $db;

    $c_id = $_SESSION['customer_email'];
    $ip_add = getRealIpUser();


    $get_items = "select * from cart where c_id = '$c_id' ORDER BY date DESC LIMIT 0,2";
    $run_items = mysqli_query($db, $get_items);


    if (mysqli_num_rows($run_items) == 0) {
        echo "
        <p style='text-align:center; font-weight:500;color:#00003f'><strong>Корзина порожня</strong></p>
        ";
    } else {

        while ($row_items = mysqli_fetch_array($run_items)) {
            $p_id = $row_items['products_id'];
            $pro_qty = $row_items['qty'];

            $get_item = "select * from products where products_id = '$p_id' ORDER BY date DESC";
            $run_item = mysqli_query($db, $get_item);

            while ($row_item = mysqli_fetch_array($run_item)) {

                $pro_name = $row_item['product_title'];
                $pro_price = $row_item['product_price'];
                $pro_img1 = $row_item['product_img1'];

                $pro_total_p = $pro_price * $pro_qty;
            }

            echo "
            
<tr>
    <td class='si-pic'>
        <img src='img/products/<?php echo $pro_img1; ?>' alt='<?php echo $pro_name; ?>' style='max-height:70px'>
    </td>
    <td class='si-text'>
        <div class='product-selected'>
            <p>грн <?php echo $pro_price; ?> x <?php echo $pro_qty; ?></p>
            <h6><?php echo $pro_name; ?></h6>
        </div>
    </td>
    <td class='si-close'>
        <a href='shopping-cart.php?delcart=<?php echo $p_id; ?>'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z'/>
            </svg>
        </a>
    </td>
</tr>

        ";
        }
    }
}


function checkoutProds()
{

    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];



    $get_items = "select * from cart where c_id = '$c_id' ORDER BY date DESC";
    $run_items = mysqli_query($db, $get_items);


    if (mysqli_num_rows($run_items) == 0) {
        echo "


        <li class='fw-normal' style='text-align:center;font-weight:bold;font-size:larger;color:#a4bc4c'>Немає продуктів у корзині</li>



        ";
    } else {

        while ($row_items = mysqli_fetch_array($run_items)) {
            $p_id = $row_items['products_id'];
            $pro_qty = $row_items['qty'];

            $get_item = "select * from products where products_id = '$p_id' ORDER BY date DESC";
            $run_item = mysqli_query($db, $get_item);

            while ($row_item = mysqli_fetch_array($run_item)) {

                $pro_name = $row_item['product_title'];
                $pro_price = $row_item['product_price'];

                $pro_total_p = $pro_price * $pro_qty;
            }

            echo "
        <li class='fw-normal'>$pro_name x $pro_qty <span>$pro_total_p</span></li>

        ";
        }
    }
}
