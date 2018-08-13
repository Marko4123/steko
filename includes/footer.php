<footer>
            <div id="yellow-arena">
                <div class="container">
                    <div class="yellow-arena-row">
                        <div class="yellow-arena-col yellow-arena-light">
                            <h3>ИМАТЕ ЛИ ИДЕЙ В ГЛАВАТА СИ?</h3>
                            <h2>Създайте следващия си проект с нас</h2>
                        </div>
                        <div class="yellow-arena-col yellow-arena-dark">
                            <a href="contacts">Връзка с нас</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="blue-arena">
                <div class="container">
                    <div class="blue-arena-box-wrap">
                        <div class="blue-arena-box blue-arena-box-col-1">
                            <img src="img/logo.png" alt="Steko" class="img-fluid">
                            <p>
                                Основната дейност на дружеството е свързана с организиране и обслужване на строително-инвестиционни проекти от етапа на предпроектните
                                проучвания до въвеждане на обектите в експлоатация, предоставяйки на клиентите си пакет от
                                услуги от квалифицирани и опитни специалисти.
                            </p>
                            <ul class="social">
                                <li>
                                    <a href="" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="blue-arena-box blue-arena-box-col-2">
                            <h5>Връзки</h5>
                            <ul>
                                <li>
                                    <a href="index.php">Начало</a>
                                </li>
                                <li>
                                    <a href="about">За нас</a>
                                </li>
                                <li>
                                    <a href="">Steko</a>
                                </li>
                                <li>
                                    <a href="">Партньори</a>
                                </li>
                                <li>
                                    <a href="news">Новини</a>
                                </li>
                                <li>
                                    <a href="contacts">Контакти</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blue-arena-box blue-arena-box-col-2">
                            <h5>Връзка с нас</h5>
                            <div>
                                <span class="fas fa-map-marker"></span>
                                <ul>
                                    <li>ул" Черковна" 84, ет2</li>
                                    <li>София, България ПК 1505</li>
                                </ul>
                            </div>
                            <div>
                                <span class="fas fa-mobile-alt"></span>
                                <ul>
                                    <li> +359896783173</li>
                                    <li>+359896783173</li>
                                </ul>
                            </div>
                            <div>

                                <span class="far fa-envelope-open"></span>
                                <a href="mailto:info@steko.bg">info@steko.bg</a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div id="copyright-arena">
                <div class="copyright-arena-container container">
                    <div class="rights">
                        <p>
                            &COPY; 2018 ALL RIGHTS RESERVED
                        </p>
                    </div>
                    <div class="created-by">
                        <p>
                            Created by
                            <a href="" target="_blank">reklamatavi.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#top" class="top-btn" id="myBtn"></a>
    </div>
    <!-- end wrapper-->
    <!-- JAVASCRIPTS -->
    <script>
        var cb = function () {
            var l = document.createElement('link'); l.rel = 'stylesheet';
            l.href = '../css/responsive.min.css';
            var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
        };
        var raf = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf) raf(cb);
        else window.addEventListener('load', cb);
    </script>
    <script>
        var cb2 = function () {
            var l2 = document.createElement('link'); l2.rel = 'stylesheet';
            l2.href = '../css/fontawesome.min.css';
            var h2 = document.getElementsByTagName('head')[0]; h2.parentNode.insertBefore(l2, h2);
        };
        var raf2 = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf2) raf(cb2);
        else window.addEventListener('load', cb2);
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            //Check to see if the window is top if not then display button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) {
                    $(".top-btn").fadeIn();
                } else {
                    $(".top-btn").fadeOut();
                }
            });

            //Click event to scroll to top
            $(".top-btn").click(function () {
                $("html, body").animate({ scrollTop: 0 }, 800);
                return false;
            });
        });
    </script>