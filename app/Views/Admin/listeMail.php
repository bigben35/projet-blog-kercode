<?php

$title = "Page listant les mails du Blog 'Islande en tête'";
$description = "Page listant les mails du Blog 'Islande en tête'";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste mail:</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th class="display-creation">Date envoi</th>
                    <th class="display-creation">Nom</th>
                    <th class="display-creation">Prénom</th>
                    <th>E-mail</th>
                    <th class="display-creation">Téléphone</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allMails as $allMail) :?>
                <tr>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allMail['created_at']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allMail['lastname']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allMail['firstname']) ?></p>
                    </td>
                    <td>
                        <p><?= htmlspecialchars($allMail['mail']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($allMail['phone']) ?></p>
                    </td>
                    <span class="display-action">
                        <td><a title="montrer mail" href="montrerMail&id=<?= $allMail['id'] ?>"><i
                                    class="fa-solid fa-eye" title="Voir"></i></a>
                            <a title="supprimer mail" href="supprimerMail&id=<?= $allMail['id'] ?>"><i
                                    class="fa-solid fa-trash-can" title="supprimer"></i></a>

                        </td>
                    </span>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 