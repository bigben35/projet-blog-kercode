<?php
$title = "Page ajout d'un article";
$description = "";
ob_start();
?>
<?php
echo '<pre>';
// var_dump($_FILES);
var_dump($_POST);
echo '</pre>';
?>


<section>
    <h1>Ajouter un Article :</h1>
<form action="indexAdmin.php?action=validerAjoutArticle" method="POST" enctype="multipart/form-data">
        
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
            <label for="name_Cat">Catégorie :</label>
            <select name="name_Cat" id="name_Cat">
                 <?php
                 foreach ($categories as $category):
                    ?>

                <option value="<?=$category['id']; ?>"><?=$category['name_Cat'];?></option>
                <?php
                endforeach;
                ?>
            </select>
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