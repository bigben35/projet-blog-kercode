<?php
$title = "Page ajout d'un article";
$description = "";
ob_start();
?>



<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';