<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="app/Public/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <!-- HEADER  -->
    <header>

        <div class="container">
            <!-- NAV  -->
            <nav class="navbar">
                <!-- <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div> -->
                <div class="blog-title">Islande en Tête</div>
                <!-- MENU BURGER  -->
                <div class="btn-burger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <div class="navbar-links">
                    <ul class="nav-list">
                        <li><a href="index.php?action=home" class="nav-link active">Home</a></li>
                        <li><a href="index.php?action=blog" class="nav-link">Blog</a></li>
                        <li><a href="index.php?action=meteo" class="nav-link">Météo</a></li>
                        <li><a href="index.php?action=contact" class="nav-link">Contact</a></li>
                        <?php
                        if (isset($_SESSION['id'])) :
                        ?>
                            <li><a href="">Mon Compte</a></li>
                            <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
                        <?php
                        else :
                        ?>
                            <li><a href="index.php?action=connexion" class="nav-link">Se connecter</a></li>
                            <li><a href="index.php?action=createUser" class="nav-link">Créer un compte</a></li>

                        <?php
                        endif;
                        ?>

                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- CONTENU DE LA PAGE  -->
    <main>
        <div class="container">
            <?= $content ?>
        </div>
    </main>

    <!-- FOOTER  -->
    <footer class="container">
        <div id="reseaux">
            <ul class="icons">
                <li><a href="#" title="facebook"><i class="fa-brands fa-facebook-square"></i></a></li>
                <li><a href="#" title="twitter"><i class="fa-brands fa-twitter-square"></i></a></li>
                <li><a href="#" title="instagram"><i class="fa-brands fa-instagram-square"></i></a></li>
                <li><a href="#" title="snapchat"><i class="fa-brands fa-snapchat-square"></i></a></li>
            </ul>
        </div>
        <p>Copyright &copy; <?= date("Y"); ?> - Islande en Tête - <a href="mentionsLegales">Mentions Légales</a> .</p>
    </footer>

    <script src="app/Public/front/js/script.js" defer></script>
    <script src="app/Public/front/js/meteo.js" defer></script>
</body>

</html>