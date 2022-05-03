<?php

$title = "Page listant les articles du Blog 'Islande en tête'";
$description = "Page listant les articles du Blog 'Islande en tête'";
ob_start();
?>

<section class="section-article-admin">
    <h1>Liste de mes articles :</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th class="display-creation">Image</th>
                    <th class="display-creation">Date de création</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <?php for($i=0; $i < count($articles); $i++) :?>
            <tr>
                <td><a href="afficheArticle&id=<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getTitle(); ?></a>
                </td>
                <td class="display-creation"><img src="<?= $articles[$i]->getUrlImage(); ?>"
                        alt="<?= $articles[$i]->getAltImage(); ?>"></td>
                <td class="display-creation"><?= $articles[$i]->getDateCreation(); ?></td>
                <td class="action-list-admin"><a href="modifierArticle&id=<?= $articles[$i]->getId(); ?>"
                        class="btn-action-admin">Modifier</a>

                    <a href="supprimerArticle&id=<?= $articles[$i]->getId(); ?>" class="btn-action-admin-red">Supprimer</a>
                </td>
            </tr>
            <?php endfor; ?>

        </table>
        <a href="ajouterArticle" class="btn-form">Ajouter</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 