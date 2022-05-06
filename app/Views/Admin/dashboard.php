<?php
$title = "Tableau de bord de l'Administrateur";
$description = "Voici le tableau de bord de l'administrateur pour qu'il puisse ajouter, modifier ou supprimer des articles; autoriser les commentaires qui respectent les règles de bienséance, etc...";
ob_start();
?>


<h1>Bonjour <?= $_SESSION['pseudo'] ?>!</h1>

<section class="section-dashboard-admin container-admin">
    <a title="liste des membres" href="listeMembre" class="bloc-section-admin">
        <i class="fa-solid fa-users"></i>
        <div class="bloc-info-admin">
            <h2>Utilisateurs</h2>
            <p class="count"><?php $user = $nbrUser->fetch() ?><?= $user[0] ?></p>
        </div>
    </a>
    <a title="liste articles" href="listeArticle" class="bloc-section-admin">
        <i class="fa-solid fa-file"></i>
        <div class="bloc-info-admin">
            <h2>Articles</h2>
            <p class="count"><?php $article = $nbrArticle->fetch() ?><?= $article[0] ?></p>
        </div>
    </a>
    <a title="liste commentaire" href="listeCommentaire" class="bloc-section-admin">
        <i class="fa-solid fa-comment"></i>
        <div class="bloc-info-admin">
            <h2>Commentaires</h2>
            <p class="count"><?php $comment = $nbrComment->fetch() ?><?= $comment[0] ?></p>
        </div>
    </a>
    <a title="liste mail" href="listeMail" class="bloc-section-admin">
        <i class="fa-solid fa-envelope"></i>
        <div class="bloc-info-admin">
            <h2>E-mail</h2>
            <p class="count"><?php $mail = $nbrMail->fetch() ?><?= $mail[0] ?></p>
        </div>
    </a>

    <a title="deconnexion" href="deconnexion" class="bloc-section-admin"><i
            class="fa-solid fa-arrow-right-from-bracket"></i>
        <h2>Se déconnecter</h2>
    </a>

</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';