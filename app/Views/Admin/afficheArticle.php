<?php 

$title = $article->getTitle();
ob_start(); 
?>

<section class="section-article-admin">
<h1>affiche article en fonction de son id</h1>
<div>
    <div>
        <img src="<?= $article->getUrlImage(); ?>" alt="<?= $article->getAltImage(); ?>" >
    </div>
    <div>
        <p>Titre : <?= $article->getTitle(); ?></p>
        <p>Catégorie : <?= $article->getCategory(); ?></p>
        <p>Accroche : <?= $article->getAccroche(); ?></p>
        <p>Contenu : <?= $article->getContenu(); ?></p>
        <p>Créé le : <?= $article->getDateCreation(); ?></p>
    </div>
</div>
<a href="listeArticle">Retour à la liste des articles</a>
</section>


<?php
$content = ob_get_clean();

require "template/adminTemplate.php";
?>