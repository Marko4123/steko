<?php require 'config.php'; ?>
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
                    <?php
                        
                        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        $page = intval(substr($actual_link, strrpos($actual_link, '/') + 1));
                        if ($page == 0 || $page == NULL || $page < 0) {
                            $page = 1;
                        }
                         $pp = "2";
                         $start = ($page * $pp) - $pp;
                         $q = mysqli_query($db, "SELECT * FROM `NewsHeader` ORDER BY id DESC");
                         $max   = mysqli_num_rows($q);
                         $total = ceil($max / $pp);
                         if ($page > 1) {
                            $z = $page - 1;
                        } else {
                            $z = 1;
                        }
                        if ($page < $total) {
                            $p = $page + 1;
                        } else {
                            $p = $total;
                        }
                        $q = mysqli_query($db, "SELECT * FROM `NewsHeader` ORDER BY id DESC LIMIT $start , $pp");
                        while ($row = mysqli_fetch_assoc($q)) {
                            $NewsId = $row['id'];
                            $NewsTitle = $row['NewsTitle'];
                            $NewsDesc = $row['NewsDesc'];
                            $NewsImgThumb = $row['NewsImgThumb'];

                            echo '<div class="news-col entry-date-author">
                            <span class="entry-date">25</span>
                            <span class="entry-month">jun</span>
                            <span class="entry-avatar">
                                <img src="img/admin.png" alt="Аватар">
                            </span>
                            <span class="entry-author">admin</span>
                        </div>
                        <div class="news-col entry-news">
                            <div class="entry-news-thumb">
                                <a href="article/'.$NewsId.'">
                                    <img src="img/news/thumb/'.$NewsImgThumb.'" alt="'.$NewsTitle.'">
                                </a>
                                <a href="article/'.$NewsId.'">
                                    <div class="entry-read-icon">
                                        <i class="fas fa-glasses"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="entry-news-title">
                                <h3>
                                    <a href="article/'.$NewsId.'">'.$NewsTitle.'</a>
                                </h3>
                            </div>
                            <div class="entry-news-text">
                                <p>'.$NewsDesc.'</p>
                            </div>
                        </div>';

                        }
                        
                    ?>
                        
                        
                    </div>

                <?php 
                //Страници
                if ($total > 1) {
                    echo '
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                    ';
                    if ($page > 1) {
                          echo '
                              <li class="page-item">
                                <a class="page-link" href = "news/1#anchor" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                              </li>
                              <li class="page-item">
                                <a href = "news/'.$z.'#anchor" class="page-link">' . $z . '</a
                              </li>';
                      }
                      echo '
                      <li class="page-item active">
                        <a href="news/'.$page.'#anchor" class="page-link">' . $page . '</a>
                      </li>';
                      if ($page < $total) {
                          echo '
                              <li class="page-item">
                                <a href = "news/'.$p.'#anchor" class="page-link">' . $p . '</a>
                              </li>
                              <li class="page-item">
                                <a href = "news/'.$total.'#anchor" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                              </li>';
                      }
                      echo'
                        </ul>
                        </nav>
                      ';
                  }

                ?>
                </div>
            </div>
        </main>
        <!-- FOOTER-->
        <?php include 'includes/footer.php'; ?>
</body>

</html>