<?php

$title = "Page listant les mails du Blog 'Islande en tête'";
$description = "Page listant les mails du Blog 'Islande en tête'";
ob_start();
?>

<h1>liste mail:</h1>

<table border=1 frame=void rules=rows>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th>Téléphone</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <?php for($i=0; $i < count($articles); $i++) :?>
    <tr>
        <td><a href="afficheArticle&id=<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getTitle(); ?></a></td>
        <td><img src="<?= $articles[$i]->getUrlImage(); ?>" alt="<?= $articles[$i]->getAltImage(); ?>"></td>
        <td><?= $articles[$i]->getDateCreation(); ?></td>
        <td><a href="modifierArticle&id=<?= $articles[$i]->getId(); ?>" class="btn-action-admin">Modifier</a></td>
        <td>
            <a href="supprimerArticle&id=<?= $articles[$i]->getId(); ?>">Supprimer</a>
        </td>
    </tr>
    <?php endfor; ?>

</table>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 