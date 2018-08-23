<?php
include 'includes/dbc.inc.php';
include 'includes/products.inc.php';
include 'includes/viewproducts.inc.php';
$page = "categories";
$products = new ViewProducts($page);
?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        
        $page_title = $products ->setProductsPageTitle();
        $page_description = "Строително-консултантска къща БОЕЛ ЕООД, извършва организиране и обслужване на строително-инвестиционни проекти. БОЕЛ ЕООД е и официален представител на SТЕКО за България. STEKO е нов начин на строителство. STEKO гарантира швейцарско качество.";
        ?>
        <?php include 'includes/header.php';?>
        <!-- NAVIGATION -->
        <?php include 'includes/navigation.php'; ?>
        <!-- MAIN -->
        <main id="main">
            <div class="container">
                <div class="main-title">
                    <div class="main-title-content">
                        <h1><?php echo $products ->setProductsPageTitle(); ?></h1>
                    </div>
                </div>
                <div class="products-row">
                    <?php $products->showProducts(); ?>
                </div>
                <?php $products ->showProductsPagination(); ?>
            </div>
        </main>
        <!-- FOOTER-->
        <?php include 'includes/footer.php'; ?>
</body>

</html>