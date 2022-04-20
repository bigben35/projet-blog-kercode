<?php

$title = "Page montrant un membre inscrit sur le Blog 'Islande en tête'";
$description = "Page montrant un membre inscrit sur le Blog 'Islande en tête'";
ob_start();
?>

<section>
    <table class="membre-table" border=1 frame=void rules=rows>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Mail</th>
                <th>Créé le</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><p><?= $oneUser['pseudo'] ?></p></td>
            <td><p><?= $oneUser['mail'] ?></p></td>
            <td><p><?= $oneUser['created_at'] ?></p></td>
            </tr>
        </tbody>
    </table>
    
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';