<?php
$title = "Page de Connexion";
$description = "";
ob_start();
?>

<section class="bloc-create-user">
<div class="form-container">
    <h1>Login</h1>
    <img src="app/Public/images/iconLogin.webp" alt="icône de l'utilisateur">
    
<div class="main-bloc-form">
    <form action="index.php?action=connectUser" method="POST">
        
        <div class="bloc-form">
            <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" placeholder="Votre e-mail" required>
        </div>
        <div class="bloc-form">
            <label for="password">Mot de passe</label>
            <input type="text" id="password" name="password" required>

            <button class="btn-form" name="submit" type="submit">Se connecter</button>
        </div>
    </form>
    <a href="home">Retour à l'accueil</a>
</div>
</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';