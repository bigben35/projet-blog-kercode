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
        <img src="<?= $presentation['url_image']; ?>" alt="<?= $presentation['alt_image']; ?>">
        <p class="content-presentation"><?= $presentation['content']; ?></p>
    </div>
</section>

<section id="last-articles">
    <h2>Derniers articles postés</h2>
    <div class="article-container">
        <?php foreach ($lastarticles as $lastarticle){
            ?>
            <article class="article-card">
            <figure class="article-image">
                <img src="<?= $lastarticle['url_image']; ?>" alt="<?= $lastarticle['alt_image']; ?>">
            </figure>
            <div class="content-article">
                <p class="date-article">Posté le <time
                        datetime="<?= $lastarticle['created_at']; ?>"><?= $lastarticle['created_at']; ?></time></p>
                <h3 class="article-title"><?= $lastarticle['title']; ?></h3>
                <p class="accroche"><?= $lastarticle['accroche']; ?></p>
            </div>
            <a class="btn-form" href="article&id=<?= $lastarticle['id']; ?>">Voir l'Article</a>
        </article>
            <?php }; ?>
    </div>
    <a class="btn-form" href="blog">Voir tous les articles</a>
</section>







<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';