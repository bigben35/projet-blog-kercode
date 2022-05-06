<?php
$title = "Mail envoyé !";
$description = "page de confirmation d'envoi de mail";
ob_start();
?>

<section id="section-confirm-mail">
    <div class="confirmSendMail">
        <h1>Votre mail a été envoyé avec succès ! 👏</h1>
    </div>
    <a title="accueil" href="home">Retourner à la page d'accueil</a>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';