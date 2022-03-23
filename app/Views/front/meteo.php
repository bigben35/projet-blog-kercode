<?php
$title = "Météo Islande";
$description = "";
ob_start();
?>

<h1>Météo</h1>


<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';