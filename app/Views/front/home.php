<?php
$title = "Accueil";
$description = "";
ob_start();
?>

<!-- SLIDER  -->

<section id="mainSlider">
    <div class="slider">
        <!-- <img src="app/Public/images/aurores-boreales_Islande.webp" alt="Magnifiques Aurores Boréales en Islande" class="imgSlider active" />
        <img src="app/Public/images/cascade_Islande.webp" alt="Magnifiques Cascades au sud de l'Islande" class="imgSlider" />
        <img src="app/Public/images/paysages-Porsmork_Islande.webp" alt="Parc naturel Porsmork en Islande" class="imgSlider" />
        <img src="app/Public/images/route-n°1_Islande.webp" alt="Voici la Route n°1 en Islande. Cette route, qui est la principale du pays, fait le tour de l'île." class="imgSlider" /> -->
        <?php foreach ($slides as $slide){
            ?>
            <img src="<?= $slide['url_image']; ?>" alt="<?= $slide['alt_image']; ?>" class="imgSlider" />
        <?php }; ?>
    </div>
    <!-- <div class="suivant">
        <i class="fa-solid fa-circle-chevron-right"></i>
    </div>
    <div class="precedent">
            <i class="fa-solid fa-circle-chevron-left"></i>
    </div> -->
</section>

<section id="presentation">
    <div class="bloc-presentation">
        <h2>Bienvenue sur Islande en Tête</h2>
        <img src="<?= $presentation['url_image']; ?>"
         alt="<?= $presentation['alt_image']; ?>">
        <p class="content-presentation"><?= $presentation['content']; ?></p>
    </div>
</section>

<section id="last-articles">
    <article>
        <h2>Derniers articles postés</h2>
        <?php foreach ($lastarticles as $lastarticle){
            ?>
            <div class="bloc-article">
                <img src="<?= $lastarticle['url_image']; ?>" alt="<?= $lastarticle['alt_image']; ?>">
            </div>
            <div class="content-article">
                <p class="date">Posté le <time datetime="<?= $lastarticle['created_at']; ?>"><?= $lastarticle['created_at']; ?></time></p>
                <h3><?= $lastarticle['title']; ?></h3>
                <p class="content"><?= $lastarticle['content']; ?></p>
            </div>
        <?php }; ?>
    </article>
    <a class="" href="index.php?action=blog">Voir tous les articles</a>
</section>







<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';
