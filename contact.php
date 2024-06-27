<?php
$active = "Contact";
include('db.php');
include("functions.php");
include("header.php");
?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Зв'яжіться з нами</h4>
                    <p>Ваші відгуки допоможуть в нашому розвитку</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </div>
                        <div class="ci-text">
                            <span>Адреса:</span>
                            <p>Січових стрільців 12, Київ, Україна</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                            </svg>
                        </div>
                        <div class="ci-text">
                            <span>Телефон:</span>
                            <p>+380 3213352126</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                            </svg>
                        </div>
                        <div class="ci-text">
                            <span>Імейл:</span>
                            <p>Penguin_fashion.@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Залишіть своє повідомлення</h4>
                        <p>Наші співробітники зателефонують пізніше і дадуть відповідь на ваші запитання.</p>
                        <form action="contact.php" class="comment-form" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Ваше ім'я" class="form-control" name="name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Електронна пошта" class="form-control" name="email" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Тема повідомлення" class="form-control" name="subject" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Ваше повідомлення" class="form-control" name="message"></textarea>
                                    <button class="site-btn" name="submit">Надіслати</button>
                                </div>
                            </div>
                        </form>
                        <?php

                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;

                        require 'vendor/autoload.php';

                        if (isset($_POST['submit'])) {
                            $user_name = $_POST['name'];
                            $user_email = $_POST['email'];
                            $user_subject = $_POST['subject'];
                            $user_msg = $_POST['message'];

                            $mail = new PHPMailer(true);

                            try {
                                // Налаштування SMTP
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'angelinamih5@gmail.com'; // Ваша адреса Gmail
                                $mail->Password = 'tbcipfntrvfzxiwu'; // Ваш пароль Gmail або специфічний пароль додатку
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = 587;

                                // Встановлення відправника
                                $mail->setFrom('angelinamih5@gmail.com', 'Penguin Fashion');
                                $mail->addReplyTo($user_email, $user_name); // Для можливості відповіді на лист користувачу
                                $mail->addAddress('angelinamih5@gmail.com'); // Додати одержувача

                                // Зміст листа
                                $mail->isHTML(true);
                                $mail->Subject = $user_subject;
                                $mail->Body    = "<p><strong>Ім'я:</strong> {$user_name}</p>
                          <p><strong>Email:</strong> {$user_email}</p>
                          <p><strong>Повідомлення:</strong><br>{$user_msg}</p>";

                                $mail->send();
                                echo "<script>showMessageAndRedirect('Повідомлення надіслано', 'contact.php');</script>";
                            } catch (Exception $e) {
                                echo "<script>showMessageAndRedirect('Виникла помилка при відправці повідомлення: {$mail->ErrorInfo}', 'contact.php');</script>";
                            }
                        }


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php
include('footer.php');
?>
<script>
    function showMessageAndRedirect(message, url) {
        alert(message);
        window.location.href = url;
    }
</script>
</body>

</html>