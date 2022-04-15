<?php

$title = "Page listant les commentaires du Blog 'Islande en tête'";
$description = "Page listant les commentaires du Blog 'Islande en tête'";
ob_start();
?>
<h1>liste commentaire</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 