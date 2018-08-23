<?php
class ViewProducts extends Products {
    // Изкарване на всички категории
    public function showCategories() {
        $datas = $this->getAllCategories();
        foreach ($datas as $data) {
            echo '
            <div class="products-col">
                <div class="products-box">
                    <img src="img/products/thumb/'.$data['CategoryImg'].'" alt="'.$data['CategoryTitle'].'">
                </div>
                <div class="products-title">
                    <h4><a href="products/'.$data['CategoryType'].'">'.$data['CategoryTitle'].'</a></h4>
                </div>
            </div>
            ';
        }
    }
    //Метод за изкарване на страницирането за категориите
    public function showCategoryPagination () {
        $this->categoryPagination();
        if ($this->totalPages > 1) {
            echo '
            <nav aria-label="Page navigation example">
                <ul class="pagination">
            ';
            if ($this->currentPage > 1) {
                  echo '
                      <li class="page-item">
                        <a class="page-link" href = "ground-screw/1" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a href = "ground-screw/'.$this->previousPage.'" class="page-link">' . $this->previousPage . '</a
                      </li>';
              }
              echo '
              <li class="page-item active">
                <a href="ground-screw/'.$this->currentPage.'" class="page-link">' . $this->currentPage . '</a>
              </li>';
              if ($this->currentPage < $this->totalPages) {
                  echo '
                      <li class="page-item">
                        <a href = "ground-screw/'.$this->nextPage.'" class="page-link">' . $this->nextPage . '</a>
                      </li>
                      <li class="page-item">
                        <a href = "ground-screw/'.$this->totalPages.'" class="page-link" aria-label="Next">
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

    //Метод за изкарване на продуктите от категорията
    public function showProducts() {
        $datas = $this->getProducts();
        foreach ($datas as $data) {
            $seoTitle = $data['ProductsTitle'];
            $seoTitle = $this->url_slug("$seoTitle", array('transliterate' => true)) . "\n\n";
            echo '
            <div class="products-col">
                <div class="products-box">
                    <img src="img/products/thumb/'.$data['ProductsImg'].'" alt="'.$data['ProductsTitle'].'">
                </div>
                <div class="products-title">
                    <h4><a href="product/'.$data['id'].'/'.$seoTitle.'">'.$data['ProductsTitle'].'</a></h4>
                </div>
            </div>
            ';
        }
    }
    //Метод за изкарване на страницирането за категориите
    public function showProductsPagination () {
        $this->productsPagination();
        if ($this->totalPages > 1) {
            echo '
            <nav aria-label="Page navigation example">
                <ul class="pagination">
            ';
            if ($this->currentPage > 1) {
                  echo '
                      <li class="page-item">
                        <a class="page-link" href = "products/1/'.$this->currentCategory.'" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a href = "products/'.$this->previousPage.'/'.$this->currentCategory.'" class="page-link">' . $this->previousPage . '</a
                      </li>';
              }
              echo '
              <li class="page-item active">
                <a href="products/'.$this->currentPage.'/'.$this->currentCategory.'" class="page-link">' . $this->currentPage . '</a>
              </li>';
              if ($this->currentPage < $this->totalPages) {
                  echo '
                      <li class="page-item">
                        <a href = "products/'.$this->nextPage.'/'.$this->currentCategory.'" class="page-link">' . $this->nextPage . '</a>
                      </li>
                      <li class="page-item">
                        <a href = "products/'.$this->totalPages.'/'.$this->currentCategory.'" class="page-link" aria-label="Next">
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

    //Метод за показване на информация за избрания продукт
    public function showProductInfo() {
        echo '
        <div class="product-desc-row">
            <div class="product-desc-col product-img">
                <img src="img/products/thumb/'.$this->productImg.'" alt="'.$this->productTitle.'">
            </div>
            <div class="product-desc-col product-desc">
                <ul>
                    <li><b>Материал:</b> '.$this->material.'</li>
                    <li><b>Дължина на винта:</b> '.$this->lenght.'</li>
                    <li><b>Тегло:</b> '.$this->weight.'</li>
                    <li><b>Ø на винта:</b> '.$this->diameter.'</li>
                </ul>
                <ul class="tech-doc">
                    <li><img src="img/pdf.png" alt="Техническа документация"></li>
                    <li><a href="files/'.$this->documentation.'" target="_blank">Техническа информация</a></li>
                </ul>
            </div>
        </div>
        ';
    }

    public function showRandomProducts() {
        $datas = $this->getRandomProducts();
        foreach ($datas as $data) {
            $seoTitle = $data['ProductsTitle'];
            $seoTitle = $this->url_slug("$seoTitle", array('transliterate' => true)) . "\n\n";
            echo '
            <div class="products-col">
                <div class="products-box">
                    <img src="img/products/thumb/'.$data['ProductsImg'].'" alt="'.$data['ProductsTitle'].'">
                </div>
                <div class="products-title">
                    <h4><a href="product/'.$data['id'].'/'.$seoTitle.'">'.$data['ProductsTitle'].'</a></h4>
                </div>
            </div>
            ';
        }
    }
}

