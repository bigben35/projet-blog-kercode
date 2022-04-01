<?php 

    $title = "Tableau de bord";
    $description = "";
    ob_start();

 ?>

<h1>Dashboard</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'app/Views/front/template/template.php';