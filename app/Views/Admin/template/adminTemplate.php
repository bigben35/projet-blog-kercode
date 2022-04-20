<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="app/Public/style.css">
    <title><?= $title ?></title>
</head>

<body>

    <!-- HEADER  -->
    <header id="dashboard-admin-header">

        <nav class="side-nav">
            <div class="wrapper">
                <div class="nav-bloc-black">
                    <a href="dashboard" class="title-admin" >Admin</a>
                </div>
                <div class="nav-bloc n-1">
                    <i class="fa-solid fa-users"></i>
                    <div class="sub-nav">
                        <h3>Membres</h3>
                        <ul>
                            <li><a href="listeMembre">Membres inscrits</a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-2">
                    <i class="fa-solid fa-file"></i>
                    <div class="sub-nav">
                        <h3>Articles</h3>
                        <ul>
                            <li><a href="ajouterArticle">Créer un article</a></li>
                            <li><a href="listeArticle">Liste des articles</a></li>

                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-3">
                    <i class="fa-solid fa-comment"></i>
                    <div class="sub-nav">
                        <h3>Commentaire</h3>
                        <ul>
                            <li><a href="listeCommentaire">Commentaire reçu</a></li>
                            <li><a href="">Commentaire à "valider</a></li>

                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-4">
                    <i class="fa-solid fa-envelope"></i>
                    <div class="sub-nav">
                        <h3>E-mail</h3>
                        <ul>
                            <li><a href="listeMail">E-mail reçu</a></li>
                            <li><a href="">E-mail à lire</a></li>

                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-5">
                    <a href="deconnexion"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            </div>
        </nav>

    </header>

    <!-- CONTENU DE LA PAGE  -->
    <main id="main-dashboard-admin">
        <div class="container">
            <?= $content ?>
        </div>
    </main>

</body>

</html>