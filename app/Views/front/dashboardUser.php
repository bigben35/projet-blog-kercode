<?php
$title = "Tableau de bord utilisateur";
$description = "";
ob_start();
?>


<h1>Dashboard User</h1>

<div class="container commentaires">
        <div>
            <div class="col-xs-12">
                <h1>Bienvenue <?= $_SESSION['pseudo'] ?>!</h1>
            </div>
        </div>
        <div>
            <div class="col-xs-12">
                <p>Adresse e-mail : <?= $_SESSION['mail'] ?></p>
            </div>
        </div>
        <div>
            <div class="col-xs-12">
                <h1>Vos commentaires :</h1>
            </div>
        </div>
        <div>
            <?php  foreach($commentaires as $commentaire): ?>
            <div class="col-xs-12">
                <p class="date">Posté par <?= $_SESSION['pseudo'] ?> le <time datetime="<?=$commentaire['created_at'] ?>"></time> :</p>
                <p><?= $commentaire['commentaire'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>


<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';