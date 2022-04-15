<?php
$title = "Tableau de bord de l'Administrateur";
$description = "Voici le tableau de bord de l'administrateur pour qu'il puisse ajouter, modifier ou supprimer des articles; autoriser les commentaires qui respectent les règles de bienséance, etc...";
ob_start();
?>


<h2>Bonjour <?= $_SESSION['pseudo'] ?>!</h2>

<section class="section-dashboard-admin container-admin">
    <a href="listeArticle" class="bloc-section-admin">
        <i class="fa-solid fa-file"></i>
        <div class="bloc-info-admin">
            <h3>Articles</h3>
            <p class="count">32</p>
        </div>
    </a>
    <a href="listeCommentaire" class="bloc-section-admin">
        <i class="fa-solid fa-comment"></i>
        <div class="bloc-info-admin">
            <h3>Commentaires</h3>
            <p class="count">23</p>
        </div>
</a>
    <a href="listeMail" class="bloc-section-admin">
        <i class="fa-solid fa-envelope"></i>
        <div class="bloc-info-admin">
            <h3>E-mail</h3>
            <p class="count"><?php $mail = $nbrMail->fetch() ?><?= $mail[0] ?></p>
        </div>
</a>
    <div class="bloc-section-admin">
        <a href="deconnexion"><i class="fa-solid fa-arrow-right-from-bracket"></i>
            <h3>Se déconnecter</h3>
        </a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';