<?php

$title = "Page montrant un membre inscrit sur le Blog 'Islande en tête'";
$description = "Page montrant un membre inscrit sur le Blog 'Islande en tête'";
ob_start();
?>

<section class="section-article-admin">
<h1>Membre :</h1>
<div class="centrer-tableau">
    <table class="page-list-admin">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Mail</th>
                <th class="display-creation">Créé le</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><p><?= $oneUser['pseudo'] ?></p></td>
            <td><p><?= $oneUser['mail'] ?></p></td>
            <td class="display-creation"><p><?= $oneUser['created_at'] ?></p></td>
            </tr>
        </tbody>
    </table>
</div>
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';