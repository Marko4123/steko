<?php
class News extends Dbc {
   
    private $url;
    public $articleID;
    
    //Свойства на страницирането
    private $pp = 2; // Новини на страница
    public $page = 1;
    public $total;
    public $p;
    public $z;
    
    //Свойства на новината
    public $newsTitle;
    public $newsDay;
    public $newsMonth;
    public $newsYear;
    public $newsThumbImg;
    public $newsContent;
    public $newsImg;
    
    //Взимане на url-адреса на страницата
    public function getUrl() {
        $this->url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $this->url;
    }
    
    //Взимане от url-то на номера на страницата и на id-то на избраната новина news/1
     public function getPageAndId () {
        $this->getUrl();
        $this->page = intval(substr($this->url, strrpos($this->url, '/') + 1));
        if ($this->page == 0 || $this->page == NULL || $this->page < 0) {
            $this->page = 1;
        }
        return $this->page;
    }
    
    //Взимане на определен брой новини на страница
    protected function getNewsPerPage() {
        $this->getPageAndId ();
        $start = ($this->page * $this->pp) - $this->pp;
        $sql = "SELECT * FROM `NewsHeader` ORDER BY id DESC LIMIT $start, $this->pp";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    //Изчисяване на броя страници на страницирането
    protected function setPages() {
        $sql = "SELECT * FROM `NewsHeader` ORDER BY id DESC";
        $result = $this->connect()->query($sql);
        $max = $result->num_rows;
        $this->total = ceil($max/$this->pp);
        if ($this->page > 1) {
            $this->z = $this->page - 1;
        } else {
            $this->z = 1;
        }
        if ($this->page < $this->total) {
            $this->p = $this->page + 1;
        } else {
            $this->p = $this->total;
        }
    }
    
    //Метод за извличане на последните три новини от БД със снимка и заглавие
    protected function getLastThreeNews() {
        $sql = "SELECT * FROM `NewsHeader` ORDER BY id DESC LIMIT 3";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Взимане на данни за конкретната новина описание и снимка
    protected function getNews() {
        $this->getPageAndId();
        $sql =  "SELECT * FROM `NewsContent` WHERE ContentId = '$this->page' LIMIT 1";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        $this->newsContent = $row['Content'];
        $this->newsImg = $row['NewsImgBig'];
    }
    
    //Взимане на стойности от БД на Заглавие, Дата, Месец, Година и Кратко описание на новината
    protected function setMetaTagsNews() {
        $this->getPageAndId();
        $sql = "SELECT * FROM `NewsHeader` WHERE id = '$this->page' ORDER BY id DESC LIMIT 1";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        $this->newsTitle =$row['NewsTitle'];
        $this->newsShortDesc = $row['NewsDesc'];
        $this->newsDay = $row['NewsDay'];
        $this->newsMonth = $row['NewsMonth'];
        $this->newsYear = $row['NewsYear'];
        $this->newsThumbImg = $row['NewsImgThumb'];
    }
    
    //Метод за връщане на заглавието на новината
    public function getNewsTitle() {
        $this->setMetaTagsNews();
        return $this->newsTitle;
    }
    //Метод за връщане на краткото описание на новината
    public function getNewsShortDesc() {
        $this->setMetaTagsNews();
        return $this->newsShortDesc;
    }
    //Метод за връщане на деня на новината
    public function getNewsDay() {
        $this->setMetaTagsNews();
        return $this->newsDay;
    }
    //Метод за връщане на месеца на новината
    public function getNewsMonth() {
        $this->setMetaTagsNews();
        return $this->newsMonth;
    }
    //Метод за връщане на годината на новината
    public function getNewsYear() {
        $this->setMetaTagsNews();
        return $this->newsYear;
    }
    //Метод за връщане на Thumb изображението на новината
    public function getNewsThumbImg() {
        $this->setMetaTagsNews();
        return $this->newsThumbImg;
    }
}