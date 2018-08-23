<?php
class News extends Dbc {
   
    private $url;
    private $newsId;
    
    //Свойства на страницирането
    protected $perPageNews = 1; // Новини на страница
    protected $currentPage = 1;
    protected $totalPages;
    protected $nextPage;
    protected $previousPage;
    
    //Свойства на новината
    protected $newsTitle;
    protected $newsDay;
    protected $newsMonth;
    protected $newsYear;
    private $newsThumbImg;
    protected $newsContent;
    protected $newsImg;

    public function __construct($page) {
        $this->url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if ($page == 'news') {
            //Взимане на текущата страница на новината
            $this->currentPage = intval(substr($this->url, strrpos($this->url, '/') + 1));
                if ($this->currentPage == 0 || $this->currentPage == NULL || $this->currentPage < 0) {
                    $this->currentPage = 1;
                }
        }
        if ($page == 'article') {
            //Взимане на id-то на избраната новина
             preg_match("/article\/(.*?)\//", $this->url, $id);
             $this->newsId = $id[1];
             $this->getNewsContent();
             $this->setMetaNews();
        }
    }
    
    //Връщане на url-адреса на страницата
    public function getUrl() {
        $this->url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $this->url;
    }

   //Взимане на всички новини
   protected function getAllNews() {
    $start = ($this->currentPage * $this->perPageNews) - $this->perPageNews;
    $sql = "SELECT * FROM `NewsHeader` ORDER BY id DESC LIMIT $start, $this->perPageNews";
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
    protected function Pagination() {
        $sql = "SELECT * FROM `NewsHeader` ORDER BY id DESC";
        $result = $this->connect()->query($sql);
        $max = $result->num_rows;
        $this->totalPages = ceil($max/$this->perPageNews);
        if ($this->currentPage > 1) {
            $this->previousPage = $this->currentPage - 1;
        } else {
            $this->previousPage = 1;
        }
        if ($this->currentPage < $this->totalPages) {
            $this->nextPage = $this->currentPage + 1;
        } else {
            $this->nextPage = $this->totalPages;
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
    public function getNewsContent() {
        $sql =  "SELECT * FROM `NewsContent` WHERE ContentId = '$this->newsId' LIMIT 1";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        $this->newsContent = $row['Content'];
        $this->newsImg = $row['NewsImgBig'];
    }

    //Взимане на стойности от БД на Заглавие, Дата, Месец, Година и Кратко описание на новината
    public function setMetaNews() {
        $sql = "SELECT * FROM `NewsHeader` WHERE id = '$this->newsId' ORDER BY id DESC LIMIT 1";
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
        return $this->newsTitle;
    }
    //Метод за връщане на краткото описание на новината
    public function getNewsShortDesc() {
        return $this->newsShortDesc;
    }
    //Метод за връщане на Thumb изображението на новината
    public function getNewsThumbImg() {
        return $this->newsThumbImg;
    }

     //Метод за форматиране на заглавието за линка
     public function url_slug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
        );
        // Merge options
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin symbols
            '©' => '(c)',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya'
        );
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
}