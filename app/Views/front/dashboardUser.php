<?php
$title = "Tableau de bord utilisateur";
$description = "";
ob_start();
?>


<h1>Dashboard User</h1>


<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';