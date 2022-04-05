<?php
$title = "Page listant les articles du Blog 'Islande en tête'";
$description = "Page listant les articles du Blog 'Islande en tête'";
ob_start();
?>

<h1>Liste de mes articles :</h1>
<table>
    <tr>
        <th>Titre</th>
        <th>Image</th>
        <th>Accroche</th>
        <th>Date de création</th>
        <th colspan="2">Actions</th>
    </tr>
    <tr>
        <td>Titre</td>
        <td><img src="Public/images/img3.png" alt="img"></td>
        <td>Accrochehkjghjgkjhkjgghkjhkdfjhkhfkjhdfkjhfd</td>
        <td>20/01/2022</td>
        <td><a href="" class="btn-action-admin">Modifier</a></td>
        <td><a href="" class="btn-action-admin">Supprimer</a></td>
    </tr>
    <tr>
        <td>Titre</td>
        <td><img src="Public/images/img3.png" alt="img"></td>
        <td>Accrochehkjghjgkjhkjgghkjhkdfjhkhfkjhdfkjhfd</td>
        <td>28/01/2052</td>
        <td><a href="" class="btn-action-admin">Modifier</a></td>
        <td><a href="" class="btn-action-admin">Supprimer</a></td>
    </tr>
</table>
<a href="" class="btn-action-admin">Ajouter</a>


<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';