<?php

$title = "Page listant les commentaires du Blog 'Islande en tête'";
$description = "Page listant les commentaires du Blog 'Islande en tête'";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste des commentaires :</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th class="display-creation">Pseudo</th>
                    <th class="display-creation">Posté le</th>
                    <th class="display-creation">Article en question</th>
                    <th>Commentaire</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allComments as $allComment) :?>
                <tr>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allComment['pseudo']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allComment['created_at']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allComment['title']) ?></p>
                    </td>
                    <td>
                        <p class="max-content"><?= htmlspecialchars($allComment['commentaire']) ?></p>
                    </td>

                    <td><a href="montrerComment&id=<?= $allComment['id'] ?>" class="btn-action-admin">Voir</a></td>
                    <td>
                        <a href="supprimerComment&id=<?= $allComment['id'] ?>">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 