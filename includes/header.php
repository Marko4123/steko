<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>"
    />
    <?php if ($page == "video") {echo '<link rel="stylesheet" href="../css/lity.min.css">';} ?>
    <link rel="stylesheet" href="http://test.steko.bg/style.min.css">
    <style>
        .dropdown-menu {
            display: none;
        }

        .navbar-nav {
            display: none;
        }
    </style>
    <base href="/" />
</head>

<body>
    <div id="wrapper">
        <!-- HEADER-->
        <header>
            <div id="top-bar">
                <div class="top-bar-container container">
                    <div class="top-bar-left">
                        <p>
                            <i class="far fa-envelope-open">
                            </i>
                            <a href="">info@steko.bg</a>
                        </p>
                    </div>
                    <div class="top-bar-right">
                        <p>
                            <i class="far fa-clock"></i>
                            Понеделник – Петък : 8:00 AM до 19:00 PM
                        </p>
                    </div>
                </div>
            </div>
            <div class="logo-contact-info-container container">
                <div class="logo">
                    <img src="img/logo.png" alt="Steko" class="img-fluid">
                </div>
                <div class="contact-info">
                    <i class="fas fa-thumbtack"></i>
                    <ul>
                        <li>ул. Черковна 84, ет.2</li>
                        <li>София, България, ПК 1505
                        </li>
                    </ul>
                    <i class="fas fa-mobile-alt"></i>
                    <ul>
                        <li>+359896783173</li>
                        <li>+359898484927</li>
                    </ul>
                </div>
            </div>
        </header>