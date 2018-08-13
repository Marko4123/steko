<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        $page = "news";
        $page_title = "Steko България | Новини";
        $page_description = "Строително-консултантска къща БОЕЛ ЕООД, извършва организиране и обслужване на строително-инвестиционни проекти. БОЕЛ ЕООД е и официален представител на SТЕКО за България. STEKO е нов начин на строителство. STEKO гарантира швейцарско качество.";
        ?>
            <?php include 'includes/header.php';?>
        <!-- NAVIGATION -->
        <?php include 'includes/navigation.php'; ?>
        <!-- MAIN -->
        <main id="main">
            <div id="news-arena">
                <div class="container">
                    <div class="main-title">
                        <div class="main-title-content">
                            <h1>Новини</h1>
                        </div>
                    </div>
                    <div class="news-row">
                        <div class="news-col entry-date-author">
                            <span class="entry-date">25</span>
                            <span class="entry-month">jun</span>
                            <span class="entry-avatar">
                                <img src="img/admin.png" alt="Аватар">
                            </span>
                            <span class="entry-author">admin</span>
                        </div>
                        <div class="news-col entry-news">
                            <div class="entry-news-thumb">
                                <a href="article">
                                    <img src="img/news/thumb/Blog-4-430x290.jpg" alt="Новини">
                                </a>
                                <a href="article">
                                    <div class="entry-read-icon">
                                        <i class="fas fa-glasses"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="entry-news-title">
                                <h3>
                                    <a href="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus praesentium laborum
                                        sapiente sint cum repudiandae, vero magnam nemo atque beatae dicta architecto. Cupiditate
                                        dicta placeat nulla amet eaque, quo nesciunt.</a>
                                </h3>
                            </div>
                            <div class="entry-news-text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ab molestias officiis aspernatur
                                    sequi numquam mollitia aliquid, aperiam maiores repudiandae.</p>
                            </div>
                        </div>
                        <div class="news-col entry-date-author">
                            <span class="entry-date">25</span>
                            <span class="entry-month">jun</span>
                            <span class="entry-avatar">
                                <img src="img/admin.png" alt="Аватар">
                            </span>
                            <span class="entry-author">admin</span>
                        </div>
                        <div class="news-col entry-news">
                            <div class="entry-news-thumb">
                                <a href="article">
                                    <img src="img/news/thumb/Blog-2-430x290.jpg" alt="Новини">
                                </a>
                                <a href="article">
                                    <div class="entry-read-icon">
                                        <i class="fas fa-glasses"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="entry-news-title">
                                <h3>
                                    <a href="article">Lorem ipsum dolor sit amet.</a>
                                </h3>
                            </div>
                            <div class="entry-news-text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ab molestias officiis aspernatur
                                    sequi numquam mollitia aliquid, aperiam maiores repudiandae.</p>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
        <!-- FOOTER-->
        <?php include 'includes/footer.php'; ?>
</body>

</html>