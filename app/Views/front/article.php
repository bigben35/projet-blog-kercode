<?php 

$title = $article['title'];
ob_start(); 
?>


<section class="article">
<article class="single-article">
    <h1>Titre : <?= $article['title']; ?></h1>
    <div>
        <img src="<?= $article['url_image']; ?>" alt="<?= $article['alt_image']; ?>" >
    </div>
    <div class="paragraphe-article">
        <p><strong>Contenu : </strong><?= $article['content']; ?></p>
        <p><strong>Créé le : </strong><?= $article['created_at']; ?></p>
    </div>
</article>
<a href="blog" class="btn-form">Retour au blog</a>
</section>
<section class="commentaire">
    <div>
        <h1>Commentaires (<?= $nb_commentaires ?>)</h1>
    </div>

    <?php
        foreach($commentaires as $commentaire) : ?>
        <div>
            <p><strong> Posté par <?= $commentaire['pseudo'] ?> le <time datetime="<? $commentaire['created_at']; ?>"><?= $commentaire['created_at']; ?></time> :</strong></p>
            
            <p class="p-commentaire"><?= $commentaire['commentaire'] ?></p>
        </div>
    <?php endforeach;

    if(isset($_SESSION['id'])):
        ?>

            <div">
                <form method="POST" action="">
                    <?php if(isset($erreur)):
                        if($erreur):
                         ?>
                    
                        
                            <div class="message erreur"><?= $erreur ?></div>
                        
                    

                    <?php 
                else:
                 ?>
                    
                            <div class="message confirmation">Votre commentaire a bien été posté !</div>
                       
                    <?php
                    endif;
                endif;
                    ?>
                    <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
                    <input type="submit" value="Commenter">
                </form>
            </div>
        

<?php
endif;
?>
</section>


<?php
$content = ob_get_clean();

require "template/template.php";
?>