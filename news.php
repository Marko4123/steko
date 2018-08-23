<?php 
include 'includes/dbc.inc.php';
include 'includes/news.inc.php';
include 'includes/viewnews.inc.php';
$page = "news";
$news = new ViewNews($page);
?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        
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
                    <?php $news->showAllNews();?>
                    </div>
                <?php $news -> showPagination();?>
                </div>
            </div>
        </main>
        <!-- FOOTER-->
        <?php include 'includes/footer.php'; ?>
</body>

</html>