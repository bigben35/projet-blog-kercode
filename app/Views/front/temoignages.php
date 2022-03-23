<?php
$title = "Témoignages";
$description = "";
ob_start();
?>

<h1>Témoignages</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';