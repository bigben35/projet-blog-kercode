<?php
$title = "Tableau de bord utilisateur";
$description = "Tableau de bord utilisateur";

ob_start();
?>


<div class="commentaires">
    <h1>Bienvenue <?= $_SESSION['pseudo'] ?> !</h1>
    <p class="user-mail">Adresse e-mail : <?= $_SESSION['mail'] ?></p>
    <h2>Vos commentaires :</h2>
    <div>
        <?php  foreach($commentaires as $commentaire): ?>
        <div>
            <p class="date-com">Posté par <?= $_SESSION['pseudo'] ?> le <time
                    datetime="<?=$commentaire['created_at'] ?>"><?= $commentaire['created_at']; ?></time> :</p>
            <p class="comment-user"><?= $commentaire['commentaire'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';