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
            <div id="connect">
                <div class="admin-connect">
                    <i class="fa-solid fa-circle-user"></i>
                </div>
                <div class="icon-connect"></div>
            </div>
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
                        <li><a href="/">Home</a></li>
                        <li><a href="index.php?action=blog">Blog</a></li>
                        <li><a href="index.php?action=temoignage">Témoignages</a></li>
                        <li><a href="index.php?action=meteo">Météo</a></li>
                        <li><a href="index.php?action=contact">Contact</a></li>
                        <!-- <li><a href="#">Shop</a></li> -->
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- CONTENU DE LA PAGE  -->
    <main>
        <?= $content ?>
    </main>

    <!-- FOOTER  -->
    <footer class="container">
        <p>Copyright &copy; 2022 -Kercode- Tous droits réservés.</p>
    </footer>

    <script src="app/Public/front/script.js" defer></script>
</body>

</html>