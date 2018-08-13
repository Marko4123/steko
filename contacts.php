<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        $page = "contacts";
        $page_title = "Steko България | Контакти";
        $page_description = "Строително-консултантска къща БОЕЛ ЕООД, извършва организиране и обслужване на строително-инвестиционни проекти. БОЕЛ ЕООД е и официален представител на SТЕКО за България. STEKO е нов начин на строителство. STEKO гарантира швейцарско качество.";
        ?>
            <?php include 'includes/header.php';?>
        <!-- NAVIGATION -->
        <?php include 'includes/navigation.php'; ?>
        <!-- MAIN -->
        <main id="main">
            <div id="map">
                <iframe src="https://snazzymaps.com/embed/80262"></iframe>
            </div>
            <div id="contacts-boxes">
                <div class="container">
                    <div class="main-title">
                        <div class="main-title-content">
                            <h1>Информация за контакти</h1>
                        </div>
                    </div>
                    <div class="contacts-boxes-wrap">
                        <div class="contacts-box">
                            <div class="contacts-box-outer">
                                <h6>Адрес</h6>
                                <ul>
                                    <li>ул" Черковна" 84, ет2</li>
                                    <li>София, България ПК 1505</li>
                                </ul>
                                <span class="icon">
                                    <i class="fas fa-thumbtack"></i>
                                </span>
                            </div>
                        </div>
                        <div class="contacts-box">
                            <div class="contacts-box-outer">
                                <h6>Телефони</h6>
                                <ul>
                                    <li>+359896783173</li>
                                    <li>+359898484927</li>
                                </ul>
                                <span class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </span>
                            </div>
                        </div>
                        <div class="contacts-box">
                            <div class="contacts-box-outer">
                                <h6>EMAIL</h6>
                                <ul>
                                    <li>info@steko.bg</li>
                                    <li>ebojilova@steko.bg</li>
                                </ul>
                                <span class="icon">
                                    <i class="far fa-envelope-open"></i>
                                </span>
                            </div>
                        </div>
                        <div class="contacts-box">
                            <div class="contacts-box-outer">
                                <h6>Работно време</h6>
                                <ul>
                                    <li>Пон. – Пет. 8:00 до 19:00</li>
                                    <li>Събота и Неделя- почива</li>
                                </ul>
                                <span class="icon">
                                    <i class="far fa-clock"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contact-form-arena">
                <div class="container">
                    <div class="main-title">
                        <div class="main-title-content">
                            <h1>Контактна форма</h1>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form method="POST" action="contacts" id="form-contact">
                            <div class="inputs-holder">
                                <div class="input-box">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="usr" name="username" placeholder="ВАШЕТО ИМЕ">
                                    </div>
                                </div>
                                <div class="input-box">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="ВАШИЯТ EMAIL">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" placeholder="СЪОБЩЕНИЕ"></textarea>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LenAmUUAAAAALwFTYSiC_0iJuNmOBu82CK8rxhv"></div>
                            <button type="submit" name="send" id="send" class="main-btn">Изпрати
                                <span class="fas fa-paper-plane" aria-hidden="true"> </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- FOOTER -->
        <?php include 'includes/footer.php'; ?>
    <script src="https://www.google.com/recaptcha/api.js?hl=bg"></script>
</body>

</html>