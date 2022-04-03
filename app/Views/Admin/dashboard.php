<?php

$title = "Tableau de bord de l'Administrateur";
$description = "Voici le tableau de bord de l'administrateur pour qu'il puisse ajouter, modifier ou supprimer des articles; autoriser les commentaires qui respectent les règles de bienséance, etc...";


?>
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

<header id="dashboard-admin-header">

    <nav class="side-nav">
        <div class="wrapper">
            <div class="nav-bloc-black">
                <h2>Admin</h2>
            </div>
            <div class="nav-bloc n-1">
                <i class="fa-solid fa-file"></i>
                <div class="sub-nav">
                    <h3>Articles</h3>
                    <ul>
                        <li><a href="">Nouveaux Articles</a></li>
                        <li><a href="">Anciens Articles</a></li>

                    </ul>
                </div>
            </div>
            <div class="nav-bloc n-2">
                <i class="fa-solid fa-comment"></i>
                <div class="sub-nav">
                    <h3>Commentaire</h3>
                    <ul>
                        <li><a href="">Commentaire reçu</a></li>
                        <li><a href="">Commentaire à "valider</a></li>

                    </ul>
                </div>
            </div>
            <div class="nav-bloc n-3">
                <i class="fa-solid fa-envelope"></i>
                <div class="sub-nav">
                    <h3>E-mail</h3>
                    <ul>
                        <li><a href="">Nombre e-mail</a></li>
                        <li><a href="">E-mail à lire</a></li>

                    </ul>
                </div>
            </div>
            <div class="nav-bloc n-4">
                <a href="index.php?action=deconnexion"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </nav>

</header>

<main id="main-dashboard-admin">
    <h2>Bienvenue <?= $_SESSION['pseudo'] ?>!</h2>
</main>