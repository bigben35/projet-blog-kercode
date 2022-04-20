<?php

$title = "Page listant les membres du Blog 'Islande en tête'";
$description = "Page listant les membres du Blog 'Islande en tête'";
ob_start();
?>
<h1>liste des membres :</h1>

<table border=1 frame=void rules=rows>
    <thead>
        <tr>
            <th>Pseudo</th>
            
            <th>Créé le</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($allUsers as $allUser) :?>
    <tr>
        <td><p><?= htmlspecialchars($allUser['pseudo']) ?></p></td>
        
        <td><p><?= htmlspecialchars($allUser['created_at']) ?></p></td>
        
        <td><a href="montrerMembre&id=<?= $allUser['id'] ?>" class="btn-action-admin"><i class="fa-solid fa-eye"></i></a></td>
        <td>
            <a href="bannirMembre&id=<?= $allUser['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 