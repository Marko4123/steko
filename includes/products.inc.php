<?php
class Products extends Dbc {
    //Свойства за данните от url-то
    private $url;
    protected $currentCategory;
    private $productId;

    //Свойства за страницирането
    protected $currentPage;
    protected $nextPage;
    protected $previousPage;
    protected $totalPages;
    protected $perPageCat = 4;
    protected $perPageProducts =1;
    

    //Свойства на новината
    protected $productTitle;
    protected $productImg;
    protected $productCategory;
    protected $material;
    protected $lenght;
    protected $weight;
    protected $diameter;
    protected $documentation;
    protected $description;

    public function __construct($page) {
        $this->url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //Взимане на текущата страница от страницата с категории
        if ($page == 'ground-screw') {
            $this->currentPage = intval(substr($this->url, strrpos($this->url, '/') + 1));
            if ($this->currentPage == 0 || $this->currentPage == NULL || $this->currentPage < 0) {
                $this->currentPage = 1;
            }
        }
        if ($page == "categories") {
            //Взимане на текущата страница от страницата с конкретните продукти
            preg_match("/products\/(.*?)\//", $this->url, $id);
            $this->currentPage = intval($id[1]);
              if(!$this->currentPage) //ако не е взета page да върне 1-ца
                {
                  $this->currentPage="1";
                }
                //Взимане на текущата категория от линка
                $this->currentCategory = substr($this->url, strrpos($this->url, '/') + 1);
        }
        if ($page == "product-desc") {
            //Взимане на id-то на конкретната страница
            preg_match("/product\/(.*?)\//", $this->url, $id);
            $this->productId = intval($id[1]);
            //Цялата информация за текущия продукт
            $this->getProductInfo ();
        }
    }

    //Метод за връщане на url-адреса
    public function getUrl() {
        return $this->url;
    }
    

    /* ----------------- Методи за страницата с категориите ----------------  */

   
    //Метод за изкарване на категориите
    protected function getAllCategories() {
        $start = ($this->currentPage * $this->perPageCat) - $this->perPageCat;
        $sql = "SELECT * FROM `ProductsCategory` ORDER BY id ASC LIMIT $start, $this->perPageCat";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Метод за взимане от БД на всички добавени категории
    protected function getMaxRowsCat() {
        $sql = "SELECT * FROM `ProductsCategory` ORDER BY id ASC";
        $result = $this->connect()->query($sql);
        $this->max = $result->num_rows;
    }

    //Изчиславане на броя страниците за страницирането на категориите
    protected function categoryPagination() {
        $this->getMaxRowsCat();
        $this->totalPages = ceil($this->max/$this->perPageCat);
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

    /* ----------------- Методи за страницата с продуктите от дадена категория ----------------  */

    //Задаване на заглавието на страницата спрямо категорията
    public function setProductsPageTitle() {
        switch ($this->currentCategory) {
            case 'm-series':
            $title_page = 'Винтови Анкери M-серия';
            break;
            case 'g-series':
            $title_page = 'Винтови Анкери G-серия';
            break;
            case 'f-series':
            $title_page = 'Винтови Анкери F-серия';
            break;
            case 'u-series':
            $title_page = 'Винтови Анкери U-серия';
            break;
            case 'e-series':
            $title_page = 'Винтови Анкери E-серия';
            break;
            case 'k-series':
            $title_page = 'Винтови Анкери K-серия';
            break;
            case 'x-series':
            $title_page = 'Винтови Анкери X-серия';
            break;
          }
          return $title_page;
    }

    //Метод за изкарване на продуктите от дадена категория
    protected function getProducts() {
        $start = ($this->currentPage * $this->perPageProducts) - $this->perPageProducts;
        $sql = "SELECT id,ProductsTitle, ProductsImg, CategoryType FROM `Products` WHERE CategoryType = '$this->currentCategory' ORDER BY id DESC LIMIT $start, $this->perPageProducts";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Метод за взимане на всички добавени продукти от дадена категория
    protected function getMaxRowsProducts() {
        $sql = "SELECT id,ProductsTitle, ProductsImg, CategoryType FROM `Products` WHERE CategoryType = '$this->currentCategory' ORDER BY id DESC";
        $result = $this->connect()->query($sql);
        $this->max = $result->num_rows;
    }
    //Метод за задаване на страницирането за продуктите от дадена категория
    protected function productsPagination() {
        $this->getMaxRowsProducts();
        $this->totalPages = ceil($this->max/$this->perPageProducts);
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

      /* ----------------- Методи за страницата с информация за продукта ----------------  */

    //Метод за взимане на информация за дадения продукт
    public function getProductInfo () {
        $sql =  "SELECT * FROM `Products` WHERE id = '$this->productId' LIMIT 1";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        $this->productTitle = $row['ProductsTitle'];
        $this->productImg = $row['ProductsImg'];
        $this->productCategory = $row['CategoryType'];
        $this->material = $row['material'];
        $this->lenght = $row['lenght'];
        $this->weight = $row['weight'];
        $this->diameter = $row['diameter'];
        $this->documentation = $row['documentation'];
        $this->description = $row['discription'];
    }

    //Взимане на 4 случайни продукта според категорията
    protected function getRandomProducts() {
        $sql = "SELECT id,ProductsTitle, ProductsImg, CategoryType FROM `Products` WHERE CategoryType = '$this->productCategory' ORDER BY RAND() LIMIT 4";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        }


    //Метод за за връщане на заглавието на продукта
    public function getProductTitle() {
        return $this->productTitle;
    }

    //Метдо за връщане на снимката на продукта
    public function getProductImg() {
        return $this->productImg;
    }

    
    
}