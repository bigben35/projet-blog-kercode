<?php 

// $titre = $article->getTitle();
ob_start(); 
?>

<h1>affiche article en fonction de son id</h1>
<div>
    <div>
        <img src="<?= $article->getUrlImage(); ?>" alt="<?= $article->getAltImage(); ?>" >
    </div>
    <div>
        <p>Titre : <?= $article->getTitle(); ?></p>
        <p>Accroche : <?= $article->getAccroche(); ?></p>
        <p>Contenu : <?= $article->getContenu(); ?></p>
        <p>Créé le : <?= $article->getDateCreation(); ?></p>
    </div>
</div>



<?php
$content = ob_get_clean();

require "template/adminTemplate.php";
?>