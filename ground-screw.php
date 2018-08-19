<?php
include 'includes/dbc.inc.php';
include 'includes/categories.inc.php';
include 'includes/viewcategories.inc.php';
$categories = new ViewCategories();
?>
<!DOCTYPE html>
<html lang="bg">

<head>
<?php
        $page = "ground-screw";
        $page_title = "Винтови Анкери";
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
                        <h1>Винтови Анкери</h1>
                    </div>
                </div>
                <div class="products-row">
                    <?php $categories ->showCategories(); ?>
                </div>
            </div>
        </main>
        <!-- FOOTER-->
        <?php include 'includes/footer.php'; ?>
</body>

</html>