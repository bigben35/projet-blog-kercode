<?php 

$title = $article['title'];
ob_start(); 
?>
<?php
// $nb_commentaires = $recupAllCommentaires();
// $commentaires = getCommentaires();
// if(!empty($_POST)){
//     $erreur = commenter();
// }
?>
<section class="article">
<article>
    <div>
        <img src="<?= $article['url_image']; ?>" alt="<?= $article['alt_image']; ?>" >
    </div>
    <div>
        <p>Titre : <?= $article['title']; ?></p>
        <p>Contenu : <?= $article['content']; ?></p>
        <p>Créé le : <?= $article['created_at']; ?></p>
    </div>
</article>
<a href="index.php?action=blog">Retour au blog</a>
</section>
<section class="commentaire">
    <div>
        <h1>Commentaires (<?= $nb_commentaires ?>)</h1>
    </div>

    <?php
        foreach($commentaires as $commentaire) : ?>
        <div>
            <p>Posté par <?= $commentaire['pseudo'] ?> le <time datetime="<? $commentaire['created_at']; ?>"><?= $commentaire['created_at']; ?></time> :</p>
            
            <p><?= $commentaire['commentaire'] ?></p>
        </div>
    <?php endforeach;
    if(isset($_SESSION['user'])):
        ?>


<?php
endif;
?>
</section>


<?php
$content = ob_get_clean();

require "template/template.php";
?>