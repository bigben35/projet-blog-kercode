<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="icon" type="image/jpg" href="app/Public/images/macareux-favicon.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="app/Public/style/style.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <!-- HEADER  -->
    <header>

        <div class="container">
            <!-- NAV  -->
            <nav class="navbar">

                <a href="home" class="blog-title" title="home">Islande en Tête</a>
                <!-- MENU BURGER  -->
                <a href="static_menu" id="btn-burger" title="menu-burger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>
                <div class="navbar-links">
                    <ul class="nav-list">
                        <li><a href="home" class="nav-link active" title="home">Home</a></li>
                        <li><a href="blog" class="nav-link" title="blog">Blog</a></li>
                        <li><a href="meteo" class="nav-link" title="meteo">Météo</a></li>
                        <li><a href="contact" class="nav-link" title="contact">Contact</a></li>
                        <?php
                        if (isset($_SESSION['role']) && ($_SESSION['role'] == "1")) :
                        ?>
                        <li><a href="dashboard" title="dashboard">Mon Compte</a></li>
                        <li><a href="deconnexion" title="deconnexion">Déconnexion</a></li>
                        <?php

                        elseif (isset($_SESSION['role']) && ($_SESSION['role'] == "0")) :
                            ?>
                        <li><a href="dashboardUser" title="dashboard utilisateur">Mon Compte</a></li>
                        <li><a href="deconnexion" title="deconnexion">Déconnexion</a></li>
                        <?php
                            
                        else :
                        ?>
                        <li><a href="connexion" class="nav-link" title="connexion">Se connecter</a></li>
                        <li><a href="createUser" class="nav-link" title="creer compte">Créer un compte</a></li>

                        <?php
                        endif;
                        ?>

                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- CONTENU DE LA PAGE  -->
    <main id="main-dashboard-user">
        <div class="container">
            <?= $content ?>
        </div>
    </main>

    <!-- FOOTER  -->
    <footer>
        <div class="container">
            <div class="btn-arrow">
                <i class="fas fa-arrow-up"></i>
            </div>

            <div id="reseaux">
                <ul class="icons">
                    <li><a href="#" title="facebook"><i class="fa-brands fa-facebook-square"></i></a>
                    </li>
                    <li><a href="#" title="twitter"><i class="fa-brands fa-twitter-square"></i></a></li>
                    <li><a href="#" title="instagram"><i class="fa-brands fa-instagram-square"></i></a></li>
                    <li><a href="#" title="snapchat"><i class="fa-brands fa-snapchat-square"></i></a></li>
                </ul>
            </div>
            <p class="copyright">Copyright &copy; <?= date("Y"); ?> - Islande en Tête - <a href="mentionsLegales"
                    title="mentions légales" target="_blank">Mentions Légales</a></p>
        </div>
    </footer>

    <script src="app/Public/front/js/script.min.js" defer></script>

</body>

</html>