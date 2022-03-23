<?php
$title = "Shop";
$description = "";
ob_start();
?>

<h1>Shop</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';