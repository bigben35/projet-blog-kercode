<?php
$title = "Météo Islande";
$description = "";
ob_start();
?>

<section class="form-container">

    <div class="bloc-app-meteo">
        <h1 class="titre-meteo">Météo du jour en Islande</h1>

        <div class="bloc-logo-info">
            <div class="bloc-logo">
                <img alt="logo météo islande nuageux" class="logo-meteo">
            </div>

            <div class="bloc-info">
                <h2 class="temps"></h2>
                <h2 class="temperature"></h2>
                <h2 class="localisation"></h2>
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