<?php
$title = "Page de Connexion";
$description = "";
ob_start();
?>

<h1>Login</h1>

<form action="" method="POST">
    <div class="bloc-form">
        <label for="mail">Email</label>
        <input type="email" id="mail" name="mail" placeholder="Votre e-mail" required>
    </div>
    <div class="bloc-form">
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password" required>

        <button name="submit" type="submit">Se connecter</button>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';