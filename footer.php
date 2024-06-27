<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row" style="padding-bottom: 40px;">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="index.php"> <img src="img/logo.png" alt="" class="penguin-logo img-fluid"></span>
                        </a>
                    </div>
                    <ul>
                        <li>+380 3213352126</li>
                        <li>Penguin_fashion.@gmail.com</li>
                        <li>Січових стрільців 12, Київ, Україна</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Інформація</h5>
                    <ul>
                        <li><a href="index.php">Про нас</a></li>
                        <li><a href="contact.php">Зв'язвтися</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget" style="display: <?php if ($active == 'Register' || $active == 'Login') {
                                                                echo 'none';
                                                            };  ?>;">
                    <h5>Акаунт</h5>
                    <ul>
                        <?php if (!($_SESSION['customer_email'] == 'unset')) {
                            echo "<li><a href='account.php?orders'>Мій акаунт</a></li>";
                        } ?>
                        <li><a href="
                        <?php if (!($_SESSION['customer_email'] == 'unset')) {
                            echo "shopping-cart.php";
                        } else {
                            echo "login.php";
                        }
                        ?>">Корзина</a></li>

                        <li><a href="
                        <?php if (!($_SESSION['customer_email'] == 'unset')) {
                            echo "check-out.php";
                        } else {
                            echo "login.php";
                        }
                        ?>
                        ">Оформити замовлення</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Підтримати зв'язок</h5>
                    <p>Отримуйте останні спеціальні пропозиції електронною поштою.</p>
                    <form action="index.php" class="subscribe-form">
                        <input type="text" placeholder="Введіть вашу пошту">
                        <button type="button">Підписуйся</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha512-8vfyGnaOX2EeMypNMptU+MwwK206Jk1I/tMQV4NkhOz+W8glENoMhGyU6n/6VgQUhQcJH8NqQgHhMtZjJJBv3A==" crossorigin="anonymous"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/main.js"></script>