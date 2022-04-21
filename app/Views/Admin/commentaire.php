<?php

$title = "Page montrant un commentaire reçu du Blog 'Islande en tête'";
$description = "Page montrant un commentaire reçu du Blog 'Islande en tête'";
ob_start();
?>



<section class="section-article-admin">
<h1>Commentaire :</h1>
<div class="centrer-tableau">
    <table class="page-list-admin">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th class="display-creation">Créé le</th>
                <th class="display-creation">Titre</th>
                <th>Commentaire</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><p><?= $oneoneCommentUser['pseudo'] ?></p></td>
            <td class="display-creation"><p><?= $oneComment['created_at'] ?></p></td>
            <td class="display-creation"><p><?= $oneComment['title'] ?></p></td>
            <td><p><?= $oneComment['commentaire'] ?></p></td>
            </tr>
        </tbody>
    </table>
</div>
</section>




<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';