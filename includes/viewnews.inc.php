<?php
class ViewNews extends News {
    //Изкарване на всички новини на страница
    public function showNewsPerPage() {
        $datas = $this->getNewsPerPage();
        foreach ($datas as $data) {
            echo '
            <div class="news-col entry-date-author">
                <span class="entry-date">'.$data['NewsDay'].'</span>
                <span class="entry-month">'.mb_substr($data['NewsMonth'],0,3).'</span>
                <span class="entry-avatar">
                    <img src="img/admin.png" alt="Аватар">
                </span>
                <span class="entry-author">admin</span>
            </div>
            <div class="news-col entry-news">
                <div class="entry-news-thumb">
                    <a href="article/'.$data['id'].'">
                        <img src="img/news/thumb/'.$data['NewsImgThumb'].'" alt="'.$data['NewsTitle'].'">
                    </a>
                    <a href="article/'.$data['id'].'">
                        <div class="entry-read-icon">
                            <i class="fas fa-glasses"></i>
                        </div>
                    </a>
                </div>
                <div class="entry-news-title">
                    <h3>
                        <a href="article/'.$data['id'].'">'.$data['NewsTitle'].'</a>
                    </h3>
                </div>
                <div class="entry-news-text">
                    <p>'.$data['NewsDesc'].'</p>
                </div>
            </div>';
        }
    }

    //Изкарване на страницирането
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
                        <a class="page-link" href = "news/1#anchor" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a href = "news/'.$this->z.'#anchor" class="page-link">' . $this->z . '</a
                      </li>';
              }
              echo '
              <li class="page-item active">
                <a href="news/'.$this->page.'#anchor" class="page-link">' . $this->page . '</a>
              </li>';
              if ($this->page < $this->total) {
                  echo '
                      <li class="page-item">
                        <a href = "news/'.$this->p.'#anchor" class="page-link">' . $this->p . '</a>
                      </li>
                      <li class="page-item">
                        <a href = "news/'.$this->total.'#anchor" class="page-link" aria-label="Next">
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