<?php
$title = "Accueil";
$description = "";
ob_start();
?>

<!-- SLIDER  -->

<!-- <section id="mainSlider">
     <h1>Prêt à Voyager ?</h1> -->
    
    <!-- <div class="suivant">
        <i class="fa-solid fa-circle-chevron-right"></i>
    </div>
    <div class="precedent">
            <i class="fa-solid fa-circle-chevron-left"></i>
    </div> -->
<!-- </section> -->

<section id="presentation">
    <div class="bloc-presentation">
        <h1>Bienvenue sur Islande en Tête</h1>
        <img src="<?= $presentation['url_image']; ?>"
         alt="<?= $presentation['alt_image']; ?>">
        <p class="content-presentation"><?= $presentation['content']; ?></p>
    </div>
</section>

<section id="last-articles">
    <h2>Derniers articles postés</h2>
    <article>
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
    <a href="blog">Voir tous les articles</a>
</section>







<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';
