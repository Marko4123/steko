<?php 
include 'includes/dbc.inc.php';
include 'includes/news.inc.php';
include 'includes/viewnews.inc.php';
$news = new ViewNews();
?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        
        $page_title = $news->getNewsTitle();
        $page_description = $news->getNewsShortDesc();
        $page_url = $news->getUrl();
        $page_img ='http://test.steko.bg/img/news/thumb/'.$news->getNewsThumbImg();
        $page = "article";
        ?>
            <?php include 'includes/header.php';?>
        <!-- NAVIGATION -->
        <?php include 'includes/navigation.php'; ?>
        <!-- MAIN -->
        <main id="main">
            <div class="container">
                <div class="news-page-row">
                    <div class="news-sidebar news-page-col">
                        <div class="sidebar-title">
                            <h3>Последни новини</h3>
                        </div>
                        <?php $news->showLastThreeNews();?>
                    </div>
                    <div class="full-news news-page-col">
                        <?php $news->showNews(); ?>
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'includes/footer.php'; ?>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b3b4de4b5f9e5d"></script>

</body>

</html>