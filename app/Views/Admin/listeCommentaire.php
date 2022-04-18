<?php

$title = "Page listant les commentaires du Blog 'Islande en tête'";
$description = "Page listant les commentaires du Blog 'Islande en tête'";
ob_start();
?>
<h1>liste des commentaires :</h1>

<table border=1 frame=void rules=rows>
    <thead>
        <tr>
            <th>Posté le</th>
            <th>Pseudo</th>
            <th>Article en question</th>
            <th>Commentaire</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($allComments as $allComment) :?>
    <tr>
        <td><p><?= htmlspecialchars($allComment['created_at']) ?></p></td>
        <td><p><?= htmlspecialchars($allComment['pseudo']) ?></p></td>
        <td><p><?= htmlspecialchars($allComment['title']) ?></p></td>
        <td><p><?= htmlspecialchars($allComment['commentaire']) ?></p></td>
        
        <td><a href="montrerComment&id=<?= $allComment['id'] ?>" class="btn-action-admin">Voir</a></td>
        <td>
            <a href="supprimerComment&id=<?= $allComment['id'] ?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 