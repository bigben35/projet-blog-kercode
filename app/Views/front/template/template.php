<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="app/Public/style.css">
    <title>Projet-Blog</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="blog-title">Islande en Tête</div>
            <div class="btn-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <div class="navbar-links">
                <ul class="nav-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Témoignages</a></li>
                    <li><a href="#">Météo</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </div>
        </nav>


    </header>

    <?= $content; ?>

    <footer>
        <p>Copyright &copy; 2022 -Kercode- Tous droits réservés.</p>
    </footer>

    <script src="app/Public/front/script.js"></script>
</body>

</html>