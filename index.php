<?php 
if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']))
{
    header( 'Location: https://www.google.com/chrome/' ) ;
}
?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
$page = "index";
$page_title = "Steko България";
$page_description = "Строително-консултантска къща БОЕЛ ЕООД, извършва организиране и обслужване на строително-инвестиционни проекти. БОЕЛ ЕООД е и официален представител на SТЕКО за България. STEKO е нов начин на строителство. STEKO гарантира швейцарско качество.";
?>
    <?php include 'includes/header.php';?>
        <!-- NAVIGATION -->
        <?php include 'includes/navigation.php'; ?>
        <!-- SLIDER -->
        <div id="slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/slider/steko-slider-1.png" alt="Steko" />
                    <div class="slider-header-wrap">
                        <div class="slider-header ">
                            <h1>Строителни Блокове за Вашите Идеи</h1>
                        </div>
                        <div class="slider-sub-header">
                            <h3>STEKO&#174; е революционна новаторска модулна строителна система от масивна дървесина - нов начин
                                на строителство!</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/slider/steko-slider-2.png" alt="Steko" />
                    <div class="slider-header-wrap">
                        <div class="slider-header">
                            <h1>Високо качество, твърди и точни</h1>
                        </div>
                        <div class="slider-sub-header">
                            <h3>STEKO&#174; гарантира швейцарско качество, здравина и съвършенство всеки път. Той е щателно изпитан
                                и доказан във всеки климат на света.</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/slider/steko-slider-3.png" alt="Steko" />
                    <div class="slider-header-wrap">
                        <div class="slider-header">
                            <h1>Перфектен от планирането до изграждането</h1>
                        </div>
                        <div class="slider-sub-header">
                            <h3>STEKO&#174; улеснява планирането и логистиката, по-лесно и по-бързо строителство, по-малко място
                                за обработка.</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/slider/steko-slider-4.png" alt="Steko" />
                    <div class="slider-header-wrap">
                        <div class="slider-header">
                            <h1>Запазете Енергия - Запазете пари</h1>
                        </div>
                        <div class="slider-sub-header">
                            <h3>STEKO&#174; създава енергийно ефективни сгради, осигуряващи домовете да останат хладни през лятото
                                и топли през зимата с минимално потребление на енергия.</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/slider/steko-slider-5.png" alt="Steko" />
                    <div class="slider-header-wrap">
                        <div class="slider-header">
                            <h1>Здравословен Живот</h1>
                        </div>
                        <div class="slider-sub-header">
                            <h3>STEKO&#174; е сертифицирана от най-високия швейцарски орган за зелени сгради (MINERGIE®) и осигурява
                                здравословно ниво на живот.</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/slider/steko-slider-6.png" alt="Steko" />
                    <div class="slider-header-wrap">
                        <div class="slider-header">
                            <h1>Устойчивост - зелена сграда</h1>
                        </div>
                        <div class="slider-sub-header">
                            <h3>STEKO&#174; използва устойчиви материали, които не оказват влияние върху околната среда.</h3>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#slider" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#slider" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <!-- MAIN -->
        <main id="main">
            <div class="short-presentation-bg">
                <div class="container">
                    <div class="short-presentation">
                        <h1>Строително-консултанска къща
                            <span class="color-yellow">боел еоод</span>
                        </h1>
                        <p>е създадена през 2008г., като основната дейност на дружеството е свързана с организиране и обслужване
                            на строително-инвестиционни проекти от етапа на предпроектните проучвания до въвеждане на обектите
                            в експлоатация, предоставяйки на клиентите си пакет от услуги от квалифицирани и опитни специалисти.</p>
                        <p>Предлаганите консултантски услуги обхващат част или всички изброени етапи:</p>
                        <div class="short-presentation-row">
                            <div class="short-presentation-box">
                                <a href="">
                                    <div class="rotary-btn">
                                        <img src="img/research.png" alt="Research">
                                    </div>
                                </a>
                                <h3>Предварителни проучвания</h3>
                                <p>
                                    Консултация при стартиране на инвестиционни намерения – проучване, анализиране и предлагане на разнообразни проектни решения,
                                    търсене на оптимални решения на строителната задача с оглед на рентабилност, устойчивост,
                                    дизайн, пригодност и др.
                                </p>
                            </div>
                            <div class="short-presentation-box">
                                <a href="">
                                    <div class="rotary-btn">
                                        <img src="img/control.png" alt="Control">
                                    </div>
                                </a>
                                <h3>Възлагане и/или контрол на проектирането</h3>
                                <p>
                                    Професионално управление във всички фази на проектиране, като се гарантира на клиента сигурността от постигане на оптимални
                                    проектни решения – технически, технологични и рентабилни.
                                </p>
                            </div>
                            <div class="short-presentation-box">
                                <a href="">
                                    <div class="rotary-btn">
                                        <img src="img/building-documentation.png" alt="Documentation">
                                    </div>
                                </a>
                                <h3>Изготвяне на проектно-сметна документация</h3>
                                <p>
                                    Изготвяне на Количествени и Количествено-стойностни сметки, на база на съществуващи проекти по всички части.
                                </p>
                            </div>
                            <div class="short-presentation-box">
                                <a href="">
                                    <div class="rotary-btn">
                                        <img src="img/builder.png" alt="Builder">
                                    </div>
                                </a>
                                <h3>Избор на изпълнител на строителството</h3>
                                <p>
                                    Изготвяне на тръжна процедура за избор на изпълнител на проекта.
                                </p>
                            </div>
                            <div class="short-presentation-box">
                                <a href="">
                                    <div class="rotary-btn">
                                        <img src="img/plan.png" alt="Plan">
                                    </div>
                                </a>
                                <h3>Планиране на строителството</h3>
                                <p>
                                    Изготвяне на концепция за работа по даден обект, съгласно строителната технология.
                                </p>
                            </div>
                            <div class="short-presentation-box">
                                <a href="">
                                    <div class="rotary-btn">
                                        <img src="img/investor.png" alt="Investor">
                                    </div>
                                </a>
                                <h3>Инвеститорски контрол при строителство</h3>
                                <p>
                                    Контрол на изпълняваните строителните процеси, тяхната последователност и пригодност.
                                </p>
                            </div>
                        </div>
                        <a href="" class="main-btn">Прочети повече...
                            <span class="fas fa-paper-plane" aria-hidden="true"> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div id="image-links-wrap">
                <div class="container">
                    <div class="main-title">
                        <div class="main-title-content">
                            <h1>Steko</h1>
                        </div>
                    </div>
                    <div class="image-links-box-wrap">
                        <div class="image-links-box">
                            <figure>
                                <img src="img/what-is-steko-thumb.jpg" alt="Какво е Steko">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">Какво е Steko?</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/architectural-freedom-thumb.jpg" alt="Architectural Freedom">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">Architectural freedom</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/cost-efficient-construction-thumb.png" alt="Precise, Time and Cost Efficient Construction">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">PRECISE, TIME AND COST EFFICIENT CONSTRUCTION</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/high-quality-thumb.jpg" alt="High Quality, Solid and Durable">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">HIGH QUALITY, SOLID AND DURABLE</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/perfect-from-plan-to-build-thumb.jpg" alt="Perfect From Plan to Build">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">PERFECT FROM PLAN TO BUILD</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/save-energy-save-money-thumb.jpg" alt="Save Energy – Save Money">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">SAVE ENERGY – SAVE MONEY</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/why-wood-thumb.jpg" alt="Защо дърво">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">ЗАЩО ДЪРВО</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="image-links-box">
                            <figure>
                                <img src="img/green-building-thumb.jpg" alt="Sustainability – Green Building">
                                <div class="image-links-overlay">
                                    <div class="image-links-title">
                                        <h3>
                                            <a href="">SUSTAINABILITY – GREEN BUILDING</a>
                                        </h3>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- FOOTER-->
       <?php include 'includes/footer.php'; ?>
</body>

</html>