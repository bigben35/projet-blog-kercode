<?php 

$title = $article['title'];
ob_start(); 
?>

<section>
<div>
    <div>
        <img src="<?= $article['url_image']; ?>" alt="<?= $article['alt_image']; ?>" >
    </div>
    <div>
        <p>Titre : <?= $article['title']; ?></p>
        <p>Contenu : <?= $article['content']; ?></p>
        <p>Créé le : <?= $article['created_at']; ?></p>
    </div>
</div>
<a href="index.php?action=blog">Retour au blog</a>
</section>


<?php
$content = ob_get_clean();

require "template/template.php";
?>