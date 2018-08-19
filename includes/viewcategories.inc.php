<?php
class ViewCategories extends Categories {
    //Функция показваща категориите
    public function showCategories() {
        $datas = $this-> getCategories();
        foreach ($datas as $data) {
            echo '
            <div class="products-col">
                <div class="products-box">
                    <img src="img/products/thumb/'.$data['CategoryImg'].'" alt="'.$data['CategoryTitle'].'">
                </div>
                <div class="products-title">
                    <h4><a href="categorie/'.$data['CategoryType'].'">'.$data['CategoryTitle'].'</a></h4>
                </div>
            </div>
            ';
        }
    }

    //Функция за форматиране на заглавието за линка
    function url_slug($str, $options = array()) {
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


   //Функция за изкарване на заглавието на категорията според url-то
   public function getTitleCategory() {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->category_type = substr($actual_link, strrpos($actual_link, '/') + 1);
    }

    //Функция за промяна на заглавието на категорията
    public function setTitleCategory() {
        $this->getTitleCategory();
        switch ($this->category_type) {
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


    //Функция изкарваща Продуктите от дадена категория
    public function showProducts() {
        $datas = $this-> getProducts();
        foreach ($datas as $data) {
            $seo_title = $data['ProductsTitle'];
            $seo_title = $this->url_slug("$seo_title", array('transliterate' => true)) . "\n\n";
            echo '
            <div class="products-col">
                <div class="products-box">
                    <img src="img/products/thumb/'.$data['ProductsImg'].'" alt="'.$data['ProductsTitle'].'">
                </div>
                <div class="products-title">
                    <h4><a href="product/'.$data['id'].'/'.$seo_title.'">'.$data['ProductsTitle'].'</a></h4>
                </div>
            </div>
            ';
        }
    }

    //Функция изкарваща страницирането
    public function showPagination() {
        $this->getPagination();
        if ($this->total > 1) {
            echo '
            <nav aria-label="Page navigation example">
                <ul class="pagination">
            ';
            if ($this->page > 1) {
                  echo '
                      <li class="page-item">
                        <a class="page-link" href = "categorie/1/'.$this->category_type.'" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a href = "categorie/'.$this->z.'/'.$this->category_type.'" class="page-link">' . $this->z . '</a
                      </li>';
              }
              echo '
              <li class="page-item active">
                <a href="categorie/'.$this->page.'/'.$this->category_type.'" class="page-link">' . $this->page . '</a>
              </li>';
              if ($this->page < $this->total) {
                  echo '
                      <li class="page-item">
                        <a href = "categorie/'.$this->p.'/'.$this->category_type.'" class="page-link">' . $this->p . '</a>
                      </li>
                      <li class="page-item">
                        <a href = "categorie/'.$this->total.'/'.$this->category_type.'" class="page-link" aria-label="Next">
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
    }

}



?>