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
        <form action="StoreUser" method="POST">
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
        <div>
                <input type="checkbox" id="autorisation" required>
                <label for="autorisation">&nbsp; En m'inscrivant, j'accepte les conditions d'utilisation et la politique de confidentialité du site Islande en Tête</label>
            </div>
        

            <button class="btn-form" name="submit" type="submit">Créer un compte</button>
    </form>
    <span>Vous avez déjà un compte? </span><a href="connexion">Login</a>
</div>
</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';