<?php 
$title = "Page de modification article";
ob_start(); 
?>

<section class="section-article-admin">
    <h1>Modifier un Article :</h1>
    <form method="POST" action="validerModifArticle" enctype="multipart/form-data">
        <div class="bloc-form">
            <label for="title">Titre : </label>
            <input type="text" id="title" name="title" value="<?= $article->getTitle(); ?>">
        </div>
        <div class="bloc-form">
            <label for="accroche">Accroche : </label>
            <input type="text" name="accroche" id="accroche" value="<?= $article->getAccroche(); ?>">
        </div>
        <div class="bloc-form">
            <label for="content">Contenu : </label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <h3>Image actuelle : </h3>
        <img src="<?= $article->getUrlImage(); ?>" class="img-modif-article">
        <div class="bloc-form">
            <label for="url_image">Changer l'image : </label>
            <input type="file" id="url_image" name="url_image">
        </div>
        <div class="bloc-form">
            <label for="alt_image">Descriptif de l'image : </label>
            <input type="text" id="alt_image" name="alt_image" value="<?= $article->getAltImage(); ?>">
        </div>
        <input type="hidden" name="identifiant" value="<?= $article->getId(); ?>">

        <button type="submit" class="btn-form">Valider</button>
    </form>
</section>

<?php
$content = ob_get_clean();
require "template/adminTemplate.php";
?>