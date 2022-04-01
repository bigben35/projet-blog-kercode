<?php
$title = "Mail envoyé !";
$description = "";
ob_start();
?>

<div class="confirmSendMail">
    <h1>Votre mail a été envoyé avec succès ! 👏</h1>
</div>
<a href="index.php?action=home">Retourner à la page d'accueil</a>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';