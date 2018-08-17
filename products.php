<?php
$catID = trim(htmlspecialchars($_GET['catID']));
$sort = htmlspecialchars($_GET['sort']);
//Взимане на категорията
function categoryName() {
  global $catID;
  global $text;

	if ($catID == 3) {
		$cat ="Пиробатерии";
    $text = "<p>
     Пиробатерия, най-лесният начин да си направите любителска, сватбена заря или заря за рожден ден. Пиробатерията се нарича още - заря в кутия и може да произведе много на брой, разнообразни светлини и звукови ефекти, които подбрани правилно не се различават от една професионална заря. Нашите артисти, ще ви препоръчат винаги най-хубавите пиробатерии на пазара. Доверете се на опита и естетическия им вкус. Попитайте ги на 0895 62 79 92.
    </p>";
	}
	if ($catID == 13) {
		$cat ="Балони с хелий";
    $text = "<p>
    Най-добрият символ за всеки празник. Цветни пъстри свежи... Те създават невероятна атмосфера. Предлагаме и удължен живот на летеж, чрез третиране със специален гел.
    </p>";
	}

	if ($catID == 16) {
		$cat ="Балони с печат";
    $text = "<p>
    Освен голямото разнообразие от готови, непечатани балони, фирмата предлага и услуга - печат на балони в наш личен цех. Също така предлагаме и печат върху тениски. За повече информация се обадете на 0895 62 79 92
    </p>";
	}

	if ($catID == 21) {
		$cat ="Балони фолио-ЦИФРИ";
    $text = "<p>
    Златни, сребърни и цветни фолиеви балони с форма на цифра. Могат да се надуват и с хелий. Издържат повече от латексовите балони. Идеална декорация за рожден ден парти. Имаме огромен асортимен от фолиеви балони с различни форми.
    </p>";
	}

  echo $cat;
}
//Функция за изкарване на метода за сортиране
function sortMethod () {
  global $sort;
	if (empty($sort)) {
		$name = "Най-новите";
		echo $name;
	}
	if ($sort == "cheapest") {
		$name = "Първо най-евтините";
		echo $name;
	}
	if ($sort == "expensive") {
		$name = "Първо най-скъпите";
		echo $name;
	}
}
//Функция за сортиране
function sortProducts() {
    global $db;
  	global $catID;
  	global $sort;
    //Най-новите
    if (empty($sort)) {
      $page = (int) $_GET['page'];
  		if ($page == 0 || $page == NULL || $page < 0) {
  			$page = 1;
  		}
  		$pp = 8;
  		$start = ($page * $pp) - $pp;
  		$result = mysqli_query($db, "SELECT id,img,title,price FROM `products` WHERE catID='$catID' AND status=2 ORDER BY id DESC");
  		$broi = mysqli_num_rows($result);
      if ($broi == 0) {
        echo '
        <div id="empty">
          <p>
            Няма добавени продукти за дадедната категория.
          </p>
        </div>';
      }
      else {
        echo
        '
        <div class="row">';
        $total = ceil($broi / $pp);
        if ($page > 1) {
    			$z = $page - 1;
    		} else {
    			$z = 1;
    		}
    		if ($page < $total) {
    			$p = $page + 1;
    		} else {
    			$p = $total;
    		}
        $result = mysqli_query($db, "SELECT id,img,title,price FROM `products` WHERE catID='$catID' AND status=2 ORDER BY id DESC LIMIT $start , $pp");
  		  while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
  			$img = $row['img'];
  			$price = $row['price'];
  			$title = $row['title'];
        echo
        '
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="product_box">
            <div class="product_img_wrap">
              <a href="http://pyromaniabg.com/product-info.php?id='.$id.'"><img src="img/media/'.$img.'" alt="'.$title.'"   /></a>
            </div>
            <div class="product_title">
              <p>
                '.$title.'
              </p>
            </div>
            <div class="product_price">
              <p>
                '.number_format($price, 2, '.', '').'лв.
              </p>
            </div>
            <div class="product_btns">
              <a class="btn_link red-btn" href="shopping_cart.php?id='.$id.'&quantity=1&shopping=true">
                <i class="fa fa-shopping-cart"></i>
              </a>
              <a class="btn_link" href="http://pyromaniabg.com/product-info.php?id='.$id.'"><i class="fa fa-eye"></i></a>
            </div>
          </div>
        </div>
        ';
      }
      echo '</div><!-- end row -->';
      if ($total > 1) {
        echo '
        <div class="small_header_caption">
          <div id="pagination">
           <ul class="pagination pagination-sm">
        ';
        if ($page > 1) {
              echo '
                  <li><a href = "?page=1&catID='.$catID.'#anchor">‹‹</a></li>
                  <li><a href = "?page='.$z.'&catID='.$catID.'#anchor">' . $z . '</a></li>';
          }
          echo '<li class="active"><a href="?page='.$page.'&catID='.$catID.'#anchor">' . $page . '</a></li>';
          if ($page < $total) {
              echo '
                  <li><a href = "?page='.$p.'&catID='.$catID.'#anchor">' . $p . '</a></li>
                  <li><a href = "?page='.$total.'&catID='.$catID.'#anchor">››</a></li>';
          }
          echo'
            </ul>
          </div><!-- end pagination -->
       </div>';
      }
    }
  }
  //Най-евтините
    if ($sort == "cheapest") {
      $page = (int) $_GET['page'];
      if ($page == 0 || $page == NULL || $page < 0) {
        $page = 1;
      }
      $pp = 8;
      $start = ($page * $pp) - $pp;
      $result = mysqli_query($db, "SELECT id,img,title,price FROM `products` WHERE catID='$catID' AND status=2 ORDER BY price ASC");
      $broi = mysqli_num_rows($result);
      if ($broi == 0) {
        echo '
        <div id="empty">
          <p>
            Няма добавени продукти за дадедната категория.
          </p>
        </div>';
      }
      else {
        echo
        '
        <div class="row">';
        $total = ceil($broi / $pp);
        if ($page > 1) {
          $z = $page - 1;
        } else {
          $z = 1;
        }
        if ($page < $total) {
          $p = $page + 1;
        } else {
          $p = $total;
        }
        $result = mysqli_query($db, "SELECT id,img,title,price FROM `products` WHERE catID='$catID' AND status=2 ORDER BY price ASC LIMIT $start , $pp");
        while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $img = $row['img'];
        $price = $row['price'];
        $title = $row['title'];
        echo
        '
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="product_box">
            <div class="product_img_wrap">
              <a href="http://pyromaniabg.com/product-info.php?id='.$id.'"><img src="img/media/'.$img.'" alt="'.$title.'"   /></a>
            </div>
            <div class="product_title">
              <p>
                '.$title.'
              </p>
            </div>
            <div class="product_price">
              <p>
                '.number_format($price, 2, '.', '').'лв.
              </p>
            </div>
            <div class="product_btns">
              <a class="btn_link red-btn" href="shopping_cart.php?id='.$id.'&quantity=1&shopping=true">
                <i class="fa fa-shopping-cart"></i>
              </a>
              <a class="btn_link" href="http://pyromaniabg.com/product-info.php?id='.$id.'"><i class="fa fa-eye"></i></a>
            </div>
          </div>
        </div>
        ';
      }
      echo '</div><!-- end row -->';
      if ($total > 1) {
        echo '
        <div class="small_header_caption">
          <div id="pagination">
           <ul class="pagination pagination-sm">
        ';
        if ($page > 1) {
              echo '
                  <li><a href = "?page=1&catID='.$catID.'&sort='.$sort.'#anchor">‹‹</a></li>
                  <li><a href = "?page='.$z.'&catID='.$catID.'&sort='.$sort.'#anchor">' . $z . '</a></li>';
          }
          echo '<li class="active"><a href="?page='.$page.'&catID='.$catID.'&sort='.$sort.'#anchor">' . $page . '</a></li>';
          if ($page < $total) {
              echo '
                  <li><a href = "?page='.$p.'&catID='.$catID.'&sort='.$sort.'#anchor">' . $p . '</a></li>
                  <li><a href = "?page='.$total.'&catID='.$catID.'&sort='.$sort.'#anchor">››</a></li>';
          }
          echo'
            </ul>
          </div><!-- end pagination -->
       </div>';
      }
    }
  }
  //Най-скъпите
    if ($sort == "expensive") {
      $page = (int) $_GET['page'];
      if ($page == 0 || $page == NULL || $page < 0) {
        $page = 1;
      }
      $pp = 8;
      $start = ($page * $pp) - $pp;
      $result = mysqli_query($db, "SELECT id,img,title,price FROM `products` WHERE catID='$catID' AND status=2 ORDER BY price DESC");
      $broi = mysqli_num_rows($result);
      if ($broi == 0) {
        echo '
        <div id="empty">
          <p>
            Няма добавени продукти за дадедната категория.
          </p>
        </div>';
      }
      else {
        echo
        '
        <div class="row">';
        $total = ceil($broi / $pp);
        if ($page > 1) {
          $z = $page - 1;
        } else {
          $z = 1;
        }
        if ($page < $total) {
          $p = $page + 1;
        } else {
          $p = $total;
        }
        $result = mysqli_query($db, "SELECT id,img,title,price FROM `products` WHERE catID='$catID' AND status=2 ORDER BY price DESC LIMIT $start , $pp");
        while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $img = $row['img'];
        $price = $row['price'];
        $title = $row['title'];
        echo
        '
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="product_box">
            <div class="product_img_wrap">
              <a href="http://pyromaniabg.com/product-info.php?id='.$id.'"><img src="img/media/'.$img.'" alt="'.$title.'"   /></a>
            </div>
            <div class="product_title">
              <p>
                '.$title.'
              </p>
            </div>
            <div class="product_price">
              <p>
                '.number_format($price, 2, '.', '').'лв.
              </p>
            </div>
            <div class="product_btns">
              <a class="btn_link red-btn" href="shopping_cart.php?id='.$id.'&quantity=1&shopping=true">
                <i class="fa fa-shopping-cart"></i>
              </a>
              <a class="btn_link" href="http://pyromaniabg.com/product-info.php?id='.$id.'"><i class="fa fa-eye"></i></a>
            </div>
          </div>
        </div>
        ';
      }
      echo '</div><!-- end row -->';
      if ($total > 1) {
        echo '
        <div class="small_header_caption">
          <div id="pagination">
           <ul class="pagination pagination-sm">
        ';
        if ($page > 1) {
              echo '
                  <li><a href = "?page=1&catID='.$catID.'&sort='.$sort.'#anchor">‹‹</a></li>
                  <li><a href = "?page='.$z.'&catID='.$catID.'&sort='.$sort.'#anchor">' . $z . '</a></li>';
          }
          echo '<li class="active"><a href="?page='.$page.'&catID='.$catID.'&sort='.$sort.'#anchor">' . $page . '</a></li>';
          if ($page < $total) {
              echo '
                  <li><a href = "?page='.$p.'&catID='.$catID.'&sort='.$sort.'#anchor">' . $p . '</a></li>
                  <li><a href = "?page='.$total.'&catID='.$catID.'&sort='.$sort.'#anchor">››</a></li>';
          }
          echo'
            </ul>
          </div><!-- end pagination -->
       </div>';
      }
    }
  }
}
 ?>
