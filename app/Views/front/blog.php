<?php
$title = "Blog-Les Articles";
$description = "";
ob_start();
?>

<section id="bloc-articles">
    <h1>Les Articles</h1>
    <article>
        
        <?php foreach ($articles as $article){
            ?>
            <div class="bloc-article">
                <img src="<?= $article['url_image']; ?>" alt="<?= $article['alt_image']; ?>">
            </div>
            <div class="content-article">
                <p class="date">Posté le <time datetime="<?= $article['created_at']; ?>"><?= $article['created_at']; ?></time></p>
                <h3><?= $article['title']; ?></h3>
                <p class="accroche"><?= $article['accroche']; ?></p>
            </div>
            <a href="index.php?action=article">Voir l'Article</a>
        <?php }; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';