<?php
$title = "Météo Islande";
$description = "";
ob_start();
?>

<section class="form-container">
    
    <div class="bloc-app-meteo">
        <h2 class="titre-meteo">Météo du jour en Islande</h2>
        
        <div class="bloc-logo-info">
            <div class="bloc-logo">
                <img alt="logo météo islande nuageux" class="logo-meteo">
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
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-jour">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
        </div>
    </div>

</section>

    <?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';
