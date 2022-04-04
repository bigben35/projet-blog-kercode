<?php
$title = "Page de Création d'un compte";
$description = "";
ob_start();
?>

<section class="bloc-create-user">
    <div class="form-container">

        <h1>Créer votre Compte</h1>
        <img src="app/Public/images/iconLogin.webp" alt="icône de l'utilisateur">
        
        <div class="main-bloc-form">
        <form action="index.php?action=StoreUser" method="POST">
            <div class="bloc-form">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Votre Pseudo" required>
            </div>    
            <div class="bloc-form">
                <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" placeholder="Votre e-mail" required>
        </div>
        <div class="bloc-form">
            <label for="password">Mot de passe</label>
            <input type="text" id="password" name="password" required>
        </div>

        <p>En m'inscrivant, j'accepte les conditions d'utilisation et la politique de confidentialité du site Islande en Tête</p>

            <button class="btn-form" name="submit" type="submit">Créer un compte</button>
    </form>
    <span>Vous avez déjà un compte? </span><a href="index.php?action=connexionUser">Login</a>
</div>
</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';