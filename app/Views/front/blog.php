<?php
$title = "Page Blog";
$description = "";
ob_start();
?>

<h1>Blog</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';