<?php
class Categories extends Dbc {

    //Функция за изкарване на категориите
    protected function getCategories() {
        $sql = "SELECT * FROM `ProductsCategory` ORDER BY id ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result ->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Функция за изкарване на продуктите от дадена категория (определен брой на дадена страница)
    protected function getProducts() {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $category_type = substr($actual_link, strrpos($actual_link, '/') + 1);
        preg_match("/categorie\/(.*?)\//", $actual_link, $id);//Взимане на стойността преди последната наклонена чера
        $this->page = intval($id[1]);
        if(!$this->page) //Ako няма стойност приравняваме страницата на 1
          {
            $this->page="1";
         }
         $this->pp = "1";
        $start = ($this->page * $this->pp) - $this->pp;
        $sql = "SELECT * FROM `Products` WHERE CategoryType = '$category_type' ORDER BY id ASC LIMIT $start, $this->pp";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result ->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Функция за изчисляване на броя страници в страницирането
    protected function getPagination() {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $category_type = substr($actual_link, strrpos($actual_link, '/') + 1);
        $sql = "SELECT * FROM `Products` WHERE CategoryType = '$category_type'";
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