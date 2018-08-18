<?php
class Article extends Dbc {
    public $title;
    public $desc;
    public $content;
    public $img;
    public $day;
    public $month;
    public $year;
    public $url;

    //Взимане на информация за мета таговете
    protected function getMetaArticle() {
        $this->url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->article_id = intval(substr($this->url, strrpos($this->url, '/') + 1));
        $sql = "SELECT * FROM `NewsHeader` WHERE id = '$this->article_id' ORDER BY id DESC LIMIT 1";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        $this->title =$row['NewsTitle'];
        $this->desc = $row['NewsDesc'];
        $this->day = $row['NewsDay'];
        $this->month = $row['NewsMonth'];
        $this->year = $row['NewsYear'];
    }

    //Взимане на последните 3 новини 
    protected function getLastNews() {
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

    //Взимане на цялостната новина
    protected function getArticle() {
        $sql =  "SELECT * FROM `NewsContent` WHERE ContentId = '$this->article_id' LIMIT 1";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        $this->content = $row['Content'];
        $this->img = $row['NewsImgBig'];

    }

}



?>