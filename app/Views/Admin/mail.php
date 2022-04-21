<?php

$title = "Page montrant un mail reçu du Blog 'Islande en tête'";
$description = "Page montrant un mail reçu du Blog 'Islande en tête'";
ob_start();
?>

<section class="section-article-admin">
<h1>E-mail :</h1>
<div class="centrer-tableau">
    <table class="page-list-admin">
        <thead>
            <tr>
                <th class="display-creation">Créé le</th>
                <th class="display-creation">Nom Prénom</th>
                <th>Mail</th>
                <th class="display-creation">Téléphone</th>
                <th class="display-creation">Objet</th>
                <th>Message</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
            <td class="display-creation"><p><?= $oneMail['created_at'] ?></p></td>
            <td class="display-creation"><p><?= $oneMail['lastname'] ?> <?= $oneMail['firstname'] ?></p></td>
            <td><p><?= $oneMail['mail'] ?></p></td>
            <td class="display-creation"><p><?= $oneMail['phone'] ?></p></td>
            <td class="display-creation"><p><?= $oneMail['objet'] ?></p></td>
            <td><p class="max-content"><?= $oneMail['msg'] ?></p></td>
            </tr>
        </tbody>
    </table>
</div>
</section>


<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 