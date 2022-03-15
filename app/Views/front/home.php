<?php
$title = "Accueil";
$description = "";
ob_start();
?>

<!-- SLIDER  -->
<div class="container">
    <div class="slider">
        <img src="app/Public/images/aurores-boreales_Islande.webp" alt="Magnifiques Aurores Boréales en Islande" class="imgSlider active" />
        <img src="app/Public/images/cascade_Islande.webp" alt="Magnifiques Cascades au sud de l'Islande" class="imgSlider" />
        <img src="app/Public/images/paysages-Porsmork_Islande.webp" alt="Parc naturel Porsmork en Islande" class="imgSlider" />
        <img src="app/Public/images/route-n°1_Islande.webp" alt="Voici la Route n°1 en Islande. Cette route, qui est la principale du pays, fait le tour de l'île." class="imgSlider" />
    </div>
    <div class="suivant">
        <i class="fa-solid fa-circle-chevron-right"></i>
    </div>
    <div class="precedent">
        <i class="fa-solid fa-circle-chevron-left"></i>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';
