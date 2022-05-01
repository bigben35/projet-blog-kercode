<?php
$title = "Page ajout d'un article";
$description = "Page ajout d'un article";
ob_start();
?>


<section class="section-article-admin">
    <h1>Ajouter un Article :</h1>
<form action="validerAjoutArticle" method="POST" enctype="multipart/form-data">
        
        <div class="bloc-form">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="bloc-form">
            <label for="accroche">Accroche :</label>
            <input type="text" id="accroche" name="accroche"required>
        </div>
        <div class="bloc-form">
            <label for="content">Contenu :</label>
           <textarea name="content" id="content" cols="30" rows="10" required></textarea> 
        </div>
        <div class="bloc-form">
            <label for="url_image">Image :</label>
            <input type="file" id="url_image" name="url_image" required>
        </div>
        <div class="bloc-form">
            <label for="alt_image">Descriptif de l'image :</label>
            <input type="text" id="alt_image" name="alt_image" required>
        </div>
       

        <button class="btn-form" name="submit" type="submit">Valider</button>
    </form>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';