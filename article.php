<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $NewsId = intval(substr($actual_link, strrpos($actual_link, '/') + 1));
        $qMeta = mysqli_query($db, "SELECT * FROM `NewsHeader` WHERE id = '$NewsId' LIMIT 1");
        $rowMeta = mysqli_fetch_assoc($qMeta);
        $page_title = $rowMeta['NewsTitle'];
        $page_description = $rowMeta['NewsDesc'];
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
                        <?php
                        //Изкарване на последните 3 новини
                        $LN_q = mysqli_query($db, "SELECT * FROM `NewsHeader` ORDER BY id DESC LIMIT 3 ");
                        while ($LN_row = mysqli_fetch_assoc($LN_q)) {
                            $LN_Title = $LN_row['NewsTitle'];
                            $LN_ImgThumb = $LN_row['NewsImgThumb'];
                            $LN_Desc = $LN_row['NewsDesc'];
                            $LN_Id = $LN_row['id'];
                            
                            echo '
                            <div class="sidebar-img">
                            <a href="article/'.$LN_Id.'">
                                <img src="img/news/thumb/'.$LN_ImgThumb.'" alt="'.$LN_Title.'">
                            </a>
                        </div>
                        <div class="sidebar-news-title">
                            <h6>
                                <a href="article/'.$LN_Id.'">'.$LN_Title.'</a>
                            </h6>
                        </div>
                        <div class="sidebar-news-date">
                            <p>
                                <i class="far fa-clock"></i> 25 Jun 2018</p>
                        </div>';
                        }
                    ?>
                        
                    </div>
                    <div class="full-news news-page-col">
                    <?php
                        //Изкарване на цялостоната новина
                        $FN_q = mysqli_query($db, "SELECT * FROM `NewsContent` WHERE ContentId = '$NewsId' LIMIT 1");
                        $FN_row = mysqli_fetch_assoc($FN_q);
                        $FN_ImgBig = $FN_row['NewsImgBig'];
                        $content = $FN_row['Content'];
                    ?>
                        <div class="news-big-image">
                            <img src="img/news/<?php echo $FN_ImgBig; ?>" alt="Новина">
                            <div class="news-meta-content">
                                <h1><?php echo $page_title; ?></h1>
                                <ul>
                                    <li>
                                        <img src="img/admin.png" alt="admin">
                                    </li>
                                    <li>Публикувана от admin</li>
                                    <li>От 25 JUNE 2018</li>
                                </ul>
                            </div>
                        </div>
                        <div class="all-news article">
                            <?php echo $content; ?>
                        </div>
                        <div class="social-btns"></div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'includes/footer.php'; ?>
</body>

</html>