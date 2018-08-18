<?php
class ViewArticle extends Article {
    //Функция изкарваща заглавието на новината
    public function showArticleTitle() {
        $this->getMetaArticle();
        $title = $this->title;
        return $title;
    }
    //Функция изкарваща описанието на новината
    public function showArticleDesc() {
        $desc = $this->desc;
        return $desc;
    }

    //Функция за връщане на урл-то на новината
    public function showArticleUrl() {
        $url = $this->url;
        return $url;
    }
    //Функция за връщане на основното изображение на новината
    public function showArticleImg() {
        $this->getArticle();
        $img = "http://test.steko.bg/img/news/".$this->img;
        return $img;
    }

    
    //Функция изкарваща последните новини
    public function showLastNews() {
        $datas = $this->getLastNews();
        foreach($datas as $data) {
            echo '
            <div class="sidebar-img">
            <a href="article/'.$data['id'].'">
                <img src="img/news/thumb/'.$data['NewsImgThumb'].'" alt="'.$data['NewsTitle'].'">
            </a>
        </div>
        <div class="sidebar-news-title">
            <h6>
                <a href="article/'.$data['id'].'">'.$data['NewsTitle'].'</a>
            </h6>
        </div>
        <div class="sidebar-news-date">
            <p>
                <i class="far fa-clock"></i> '.$data['NewsDay']. " ". mb_substr($data['NewsMonth'],0,3)." " .$data['NewsYear'].'</p>
        </div>';
           }
    }

    //Изкарване на цялостната новина
    public function showArticle() {
        echo '
        <div class="news-big-image">
            <img src="img/news/'.$this->img.'" alt="Новина">
            <div class="news-meta-content">
                <h1>'.$this->title.'</h1>
                <ul>
                    <li>
                        <img src="img/admin.png" alt="admin">
                    </li>
                    <li>Публикувана от admin</li>
                    <li>От '.$this->day." ".mb_substr($this->month,0,3). " ".$this->year.'</li>
                </ul>
            </div>
        </div>
        <div class="all-news article">
            '.$this->content.'
        </div>
        ';
    }
}
?>