<!-- NAVIGATION -->
<div id="navigation" class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-lg-none" href="#">MENU</a>
                <button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav nav-fill w-100">
                        <li class="nav-item ">
                            <a class="nav-link <?php if($page =="index") {echo 'current';} ?>" href="index.php">Начало</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?php if($page =="about") {echo 'current';} ?>" href="about">За нас</a>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                STEKO&#174;
                            </a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dropdown-header">За Steko&#174;</div>
                                        <ul>
                                            <li>
                                                <a href="steko/what-is-steko">Какво е STEKO&#174;</a>
                                            </li>
                                            <li>
                                                <a href="steko/who-is-steko">Кой е STEKO&#174;</a>
                                            </li>
                                            <li>
                                                <a href="steko/why-wood">Защо дърво</a>
                                            </li>
                                            <li>
                                                <a href="steko/who-should-build-with-steko">Who Should Build with STEKO&#174;</a>
                                            </li>
                                            <li>
                                                <a href="steko/steko-turnkey-homes">STEKO&#174; Turnkey Homes</a>
                                            </li>
                                            <li>
                                                <a href="steko/build-steko-houses">Built STEKO&#174; Houses</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropdown-header">STEKO&#174; Продукти</div>
                                        <ul>
                                            <li>
                                                <a href="steko/walls" <?php if($page =="walls") {echo 'class="current"';} ?>>STEKO&#174; Стени</a>
                                            </li>
                                            <li>
                                                <a href="steko/steko-roof">STEKO&#174; Покрив</a>
                                            </li>
                                            <li>
                                                <a href="steko/installation">STEKO&#174; Монтаж</a>
                                            </li>
                                            <li>
                                                <a href="steko/technical-information">STEKO&#174; Информация</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropdown-header">STEKO&#174; Предимства</div>
                                        <ul>
                                            <li>
                                                <a href="steko/modular-building-system">Modular Building System</a>
                                            </li>
                                            <li>
                                                <a href="steko/time-and-money-savings">Time and money savings</a>
                                            </li>
                                            <li>
                                                <a href="steko/swiss-quality">Swiss Quality</a>
                                            </li>
                                            <li>
                                                <a href="steko/sustainability">Sustainability</a>
                                            </li>
                                            <li>
                                                <a href="steko/going-green">Going Green</a>
                                            </li>
                                            <li>
                                                <a href="steko/energy-efficiency">Energy Efficiency</a>
                                            </li>
                                            <li>
                                                <a href="steko/healthy-living">Healthy Living</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropdown-header">STEKO&#174; Полезно</div>
                                        <ul>
                                            <li>
                                                <a href="steko/questions-and-answers">Questions and Answers</a>
                                            </li>
                                            <li>
                                                <a href="steko/documentation" <?php if($page =="documentation") {echo 'class="current"';} ?>>PDF</a>
                                            </li>
                                            <li>
                                                <a href="steko/video" <?php if($page =="video") {echo 'class="current"';} ?>>Videos</a>
                                            </li>
                                            <li>
                                                <a href="steko/projects" <?php if($page =="projects") {echo 'class="current"';} ?>>Проекти</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Партньори
                            </a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dropdown-header">Винтове за основа</div>

                                        <a href="ground-screw">
                                            <img src="img/grounds-screw.jpg" alt="Grounds Screw" class="img-fluid" />
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?php if($page =="news") {echo 'current';} ?>" href="news">Новини</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?php if($page =="contacts") {echo 'current';} ?>" href="contacts">Контакти</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>