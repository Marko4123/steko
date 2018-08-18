<?php

class News extends Dbc {

    public $page;
    public $pp;
    public $total;
    public $z;
    public $p;

    //Взимане на новините на страница
 protected function getNewsPerPage() {
     $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     $this->page = intval(substr($url, strrpos($url, '/') + 1));
     if ($this->page == 0 || $this->page == NULL || $this->page < 0) {
        $this->page = 1;
    }
    $this->pp = "2";
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

 //Функция за изчисляване на броя страници в страницирането
    protected function getPagination() {
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
}



?>