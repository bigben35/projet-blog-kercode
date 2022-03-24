<?php
$title = "Météo Islande";
$description = "";
ob_start();
?>

<h1>Météo</h1>

<div class="container">
    <div class="bloc-app-meteo">
        <h2 class="titre-meteo">Météo Islande</h2>

        <div class="bloc-logo-info">
            <div class="bloc-logo">
                <img src="app/Public/ressources/jour/04d.svg" alt="logo météo islande nuageux" class="logo-meteo">
            </div>

            <div class="bloc-info">
                <p class="temps"></p>
                <p class="temperature"></p>
                <p class="localisation"></p>
            </div>
        </div>

        <div class="jour-bloc-prevision">
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temps"></p>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';
