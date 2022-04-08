<?php

$title = "Page listant les articles du Blog 'Islande en tête'";
$description = "Page listant les articles du Blog 'Islande en tête'";
ob_start();
?>

<h1>Liste de mes articles :</h1>
<table border=1 frame=void rules=rows>
    <tr>
        <th>Titre</th>
        <th>Image</th>
        <th>Date de création</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php for($i=0; $i < count($articles); $i++) :?>
    <tr>
        <td><a href="indexAdmin.php?action=afficheArticle&id=<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getTitle(); ?></a></td>
        <td><img src="<?= $articles[$i]->getUrlImage(); ?>" alt="<?= $articles[$i]->getAltImage(); ?>"></td>
        <td><?= $articles[$i]->getDateCreation(); ?></td>
        <td><a href="" class="btn-action-admin">Modifier</a></td>
        <td>
            <!-- <form action="indexAdmin.php?action=listeArticle" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer l\'article\ ?');"> -->
            <!-- <button class="btn-action-admin" type="submit">Supprimer</button>
        </form> -->
        <a href="indexAdmin.php?action=supprimerArticle&id=<?= $articles[$i]->getId(); ?>">Supprimer</a>
        </td>
    </tr>
    <?php endfor; ?>
    
</table>
<a href="indexAdmin.php?action=ajouterArticle" class="btn-action-admin">Ajouter</a>


<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 