<?php
$title = "Blog-Les Articles";
$description = "Page Blog du site Islande en Tête, recensant les articles sur L'Islande";
ob_start();


// On détermine sur quelle page on se trouve
if(isset($_GET['blog']) && !empty($_GET['blog'])){
    $currentPage = (int) strip_tags($_GET['blog']);
}else{
    $currentPage = 1;
}
?>

<section id="search">
    <?php
    include_once "template/search.php";
    ?>
    <?php 
        if (isset($search) && !empty($search) && isset($_GET['isSearching'])) :
    ?>
    <section id="bloc-articles">
        <h1>Recherhce</h1>
        <div class="article-container">
            <?php foreach ($search as $article){
        ?>
            <article class="article-card">
                <figure class="article-image">
                    <img src="<?= $article['url_image']; ?>" alt="<?= $article['alt_image']; ?>">
                </figure>
                <div class="content-article">
                    <p class="date-article">Posté le <time
                            datetime="<?= $article['created_at']; ?>"><?= $article['created_at']; ?></time></p>
                    <h3 class="article-title"><?= $article['title']; ?></h3>
                    <p class="accroche"><?= $article['accroche']; ?></p>
                </div>
                <a class="btn-form" href="article&id=<?= $article['id']; ?>">Voir l'Article</a>
            </article>
            <?php }; ?>

        </div>

    </section>
<?php 
    else :
    ?>
    <section id="bloc-articles">
        <h1>Les Articles</h1>
        <div class="article-container">
            <?php foreach ($articles as $article){
        ?>
            <article class="article-card">
                <figure class="article-image">
                    <img src="<?= $article['url_image']; ?>" alt="<?= $article['alt_image']; ?>">
                </figure>
                <div class="content-article">
                    <p class="date-article">Posté le <time
                            datetime="<?= $article['created_at']; ?>"><?= $article['created_at']; ?></time></p>
                    <h3 class="article-title"><?= $article['title']; ?></h3>
                    <p class="accroche"><?= $article['accroche']; ?></p>
                </div>
                <a class="btn-form" href="article&id=<?= $article['id']; ?>">Voir l'Article</a>
            </article>
            <?php }; ?>
        </div>
    </section>
    <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="blog&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                      <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                      <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="blog&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                      <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                      <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="blog&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
    <?php
        endif
    ?>

    <?php $content = ob_get_clean(); ?>
    <?php require 'template/template.php';