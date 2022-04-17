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
    <tbody>
    <?php foreach ($allMails as $allMail) :?>
    <tr>
        <td><p><?= htmlspecialchars($allMail['lastname']) ?></p></td>
        <td><p><?= htmlspecialchars($allMail['firstname']) ?></p></td>
        <td><p><?= htmlspecialchars($allMail['mail']) ?></p></td>
        <td><p><?= htmlspecialchars($allMail['phone']) ?></p></td>
        
        <td><a href="montrerMail&id=<?= $allMail['id'] ?>" class="btn-action-admin">Voir</a></td>
        <td>
            <a href="supprimerMail&id=<?= $allMail['id'] ?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 