<?php 
include 'includes/dbc.inc.php';
include 'includes/article.inc.php';
include 'includes/viewarticle.inc.php';
$article = new ViewArticle();
?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        
        $page_title = $article->showArticleTitle();
        $page_description = $article->showArticleDesc();
        $page_url = $article->showArticleUrl();
        $page_img = $article->showArticleImg();
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
                        <?php $article->showLastNews();?>
                    </div>
                    <div class="full-news news-page-col">
                        <?php $article->showArticle(); ?>
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'includes/footer.php'; ?>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b3b4de4b5f9e5d"></script>

</body>

</html>