<?php

$title = "Page listant les membres du Blog 'Islande en tête'";
$description = "Page listant les membres du Blog 'Islande en tête'";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste des membres :</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th>Pseudo</th>

                    <th class="display-creation">Créé le</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allUsers as $allUser) :?>
                <tr>
                    <td>
                        <p><?= htmlspecialchars($allUser['pseudo']) ?></p>
                    </td>

                    <td class="display-creation">
                        <p><?= htmlspecialchars($allUser['created_at']) ?></p>
                    </td>

                    <td class="action-list-admin"><a href="montrerMembre&id=<?= $allUser['id'] ?>"
                            class="btn-action-admin">Voir</a>

                        <a href="bannirMembre&id=<?= $allUser['id'] ?>" class="btn-action-admin-red">Bannir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 